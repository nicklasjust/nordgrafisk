<?php

	require('database.php');

	$wsdlUrl = 'https://api.e-conomic.com/secure/api1/EconomicWebservice.asmx?WSDL';

	$eco = new SoapClient($wsdlUrl, array("trace" => 1, "exceptions" => 1));    		
	$eco->ConnectWithToken(
		array(
			'token' 	=> 'V17qsgk6uR-6MfrNkTdgRhydwNLTOkCXNcF7R588GMs1',
			'appToken'  => 'dciTAm_Tp-pPujYOxcNhhB9QJin7ZtB3rd6qGH2-b6Q1'
		)
	);

try
{
	$db = Database::getInstance('mysql', $config['db-host'], $config['db-name'], $config['db-user'], $config['db-pass']);

	$orderId = $_POST['orderId'];

	$order = $db->select(
		"SELECT debtor_id,
				delivery_address,
				delivery_date,
				delivery_city,
				delivery_zip,
				orders.eco_reg AS order_eco_reg,
				debtors.id AS debtor_id,
				debtors.name,
				debtors.city,
				debtors.address,
				debtors.zip_code,
				debtors.phone,
				debtors.email,
				debtors.ean,
				debtors.eco_reg AS debtor_eco_reg
		 FROM orders
		 INNER JOIN debtors ON debtors.id = orders.debtor_id
		 WHERE orders.id = :orderId",
		array(
			'orderId' => $orderId
			)
		);

	if(!$order[0]['debtor_eco_reg'])
	{
		/*******************\
		*	 CREATE DEBTOR 	
		\*******************/

		$debtorNumber = $eco->Debtor_GetNextAvailableNumber()->Debtor_GetNextAvailableNumberResult;
		
		$debtorHandle = $eco->Debtor_Create(array(
			'number' => $debtorNumber,
			'debtorGroupHandle' => array(
				'Number' => 1
				),
			'name' => $order[0]['name'],
			'vatZone' => 'EU'
		))->Debtor_CreateResult;

		$eco->Debtor_SetAddress(array(
			'debtorHandle' => $debtorHandle,
			'value' => $order[0]['address']
			));

		$eco->Debtor_SetCity(array(
			'debtorHandle' => $debtorHandle,
			'value' => $order[0]['city']
			));

		$eco->Debtor_SetPostalCode(array(
			'debtorHandle' => $debtorHandle,
			'value' => $order[0]['zip_code']
			));

		$eco->Debtor_SetEmail(array(
			'debtorHandle' => $debtorHandle,
			'value' => $order[0]['email']
			));

		$eco->Debtor_SetEan(array(
			'debtorHandle' => $debtorHandle,
			'value' => $order[0]['ean']
			));

		$eco->Debtor_SetTelephoneAndFaxNumber(array(
			'debtorHandle' => $debtorHandle,
			'value' => $order[0]['phone']
		));

		/********************************\
		*  UPDATE DEBTOR ECO.REG. STATUS
		\********************************/

		$db->update('debtors',
				array(
					'eco_reg' => true
				),
				array(
					array('id', '=', $order[0]['debtor_id'])
				)
			);
	}
	else
	{
		/***************************\
		*	 GET DEBTOR FROM EMAIL 	*
		\***************************/

		$debtorHandle = $eco->Debtor_FindByEmail(array(
			'email' => $order[0]['email']
		))->Debtor_FindByEmailResult->DebtorHandle;	
	}

	/*******************\
	*	 CREATE ORDER 	*
	\*******************/

	if(!$order[0]['order_eco_reg'])
	{
		$orderHandle = $eco->Order_Create(array(
			'debtorHandle' => $debtorHandle
			)
		)->Order_CreateResult;

		// if(strtotime($order[0]['delivery_date']))
		// {
		// 	$eco->Order_SetDeliveryDate(array(
		// 		'orderHandle' 	=> $orderHandle,
		// 		'value' 		=> (new DateTime($order[0]['delivery_date']))->format('Y-m-d H:i:s')
		// 	));
		// }

		$eco->Order_SetDeliveryAddress(array(
				'orderHandle' 	=> $orderHandle,
				'value' 		=> $order[0]['delivery_address']
			));

		$eco->Order_SetDeliveryCity(array(
				'orderHandle'	=> $orderHandle,
				'value'			=> $order[0]['delivery_city']
			));

		/*******************************\
		*  UPDATE ORDER ECO.REG. STATUS
		\*******************************/

		$db->update('orders',
				array(
					'eco_reg' => true
				),
				array(
					array('id', '=', $orderId)
				)
			);

		/*******************\
		*	GET ORDERLIGES
		\*******************/

		$orderlines	= $db->select(
			"SELECT product_no,
					product,
					formatComments,
					usageComments,
					material,
					type,
					size 
			 FROM orderlines
			 WHERE order_id = :orderId",
			 array(
			 	'orderId' => $orderId
			 	));


		/***********************\
		*  REGISTER ORDERLINES
		\***********************/
		
		foreach ($orderlines as $orderline)
		{
			$orderLineHandle = $eco->OrderLine_Create(array(
				'orderHandle' => $orderHandle
			))->OrderLine_CreateResult;

			$eco->OrderLine_SetProduct(array(
				'orderLineHandle' 	=> $orderLineHandle,
				'valueHandle' 		=> array(
					'Number' => $orderline['product_no']
					)
			));

			$size 			= (!empty($orderline['size'])) ? $orderline['size'] : 'Ikke angivet';
			$type 			= (!empty($orderline['type'])) ? $orderline['type'] : 'Ikke angivet';
			$material 		= (!empty($orderline['material'])) ? $orderline['material'] : 'Ikke angivet';
			$formatComments	= (!empty($orderline['formatComments'])) ? $orderline['formatComments'] : 'Ingen kommentarer';
			$usageComments 	= (!empty($orderline['usageComments'])) ? $orderline['usageComments'] : 'Ingen kommentarer';

			$description = array(
					$orderline['product']."\n",
					'	Format '."\n",
					'			Størrelse: '. $size ."\n",
					'			Type: '. $type ."\n",
					'			Kommentar: '. $formatComments ."\n",
					'	Brug '."\n",
					'			Indendørs'."\n",
					'			Materiale: '. $material ."\n",
					'			Kommentar: '. $usageComments
				);

			$eco->OrderLine_SetDescription(array(
				'orderLineHandle' 	=> $orderLineHandle,
				'value' 			=> implode('', $description)
			));
		}
	}
	
	echo json_encode(array(
		'success' 	=> true,
		'action'	=> 'Register order in E-conomic'
		));
}
catch(Exception $e)
{
	echo json_encode(array(
		'success' 	=> false,
		'msg' 		=>  $e->getMessage()
		));
}