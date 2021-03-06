<?php

	$wsdlUrl = 'https://api.e-conomic.com/secure/api1/EconomicWebservice.asmx?WSDL';

	$client = new SoapClient($wsdlUrl, array("trace" => 1, "exceptions" => 1));    		
	$client->ConnectWithToken(
		array(
			'token' 	=> 'V17qsgk6uR-6MfrNkTdgRhydwNLTOkCXNcF7R588GMs1',
			'appToken'  => 'dciTAm_Tp-pPujYOxcNhhB9QJin7ZtB3rd6qGH2-b6Q1'
		)
	);


	$debtorNumber = '1';

	// $orderHandle = $client->Order_Create(array(
	// 		'debtorHandle' => array(
	// 			'Number' => $debtorNumber
	// 			)
	// 	))->Order_CreateResult;

	// echo "<pre>";
	// print_r($orderHandle);
	// echo "</pre>";

	$orderHandle = array(
			'Id' => 4
		);

	$client->Order_SetDeliveryDate(array(
			'orderHandle' 	=> $orderHandle,
			'value' 		=> '2002-05-30T09:30:10+06:00'
		));

	$client->Order_SetDeliveryAddress(array(
			'orderHandle' 	=> $orderHandle,
			'value' 		=> 'Lolvej 45'
		));

	$client->Order_SetDeliveryCity(array(
			'orderHandle'	=> $orderHandle,
			'value'			=> 'Lolby'
		));

	$client->Order_SetDeliveryCountry(array(
			'orderHandle'	=> $orderHandle,
			'value'			=> 'Lolland'
		));

	$orderLineHandle = $client->OrderLine_Create(array(
			'orderHandle' => $orderHandle
		))->OrderLine_CreateResult;

	// echo "<pre>";
	// print_r($orderLineHandle);
	// echo "</pre>";

	$orderLineHandle = array(
			'Id' => 4,
			'Number' => 2
		);

	$client->OrderLine_SetProduct(array(
			'orderLineHandle' 	=> $orderLineHandle,
			'valueHandle' 		=> array(
				'Number' => '1'
				)
		));

	$client->OrderLine_SetDescription(array(
			'orderLineHandle' 	=> $orderLineHandle,
			'value' 			=> 'Bananas'
		));

?>