<?php

require('database.php');

$db = Database::getInstance('mysql', $config['db-host'], $config['db-name'], $config['db-user'], $config['db-pass']);

$customerInfo 	= $_POST['customerInfo'];
$orderInfo 		= $_POST['orderInfo'];
$orderlines 	= $_POST['orderlines'];

// echo "<pre>";
// print_r($orderlines);
// echo "</pre>";

// exit;

try{

	$db->beginTransaction();
		
		$debtor = $db->select(
			"SELECT id
			 FROM debtors
			 WHERE email = :email",
			array(
				'email' => $customerInfo['email']
				));

		if(empty($debtor))
		{
			$db->insert('debtors', 
					array(
						'name' 		=> $customerInfo['name'],
						'city' 		=> $customerInfo['city'],
						'address' 	=> $customerInfo['address'],
						'zip_code' 	=> $customerInfo['zip'],
						'phone' 	=> $customerInfo['phone'],
						'email' 	=> $customerInfo['email'],
						'ean' 		=> $customerInfo['ean']
						)
					);

			$debtorId = $db->lastInsertId();
		}
		else
		{
			$debtorId = $debtor[0]['id'];
		}

		$deliveryDate = null;

		if(!empty($orderInfo['deliveryDate']))
		{
			$deliveryDate = (new DateTime($orderInfo['deliveryDate'].' '.$orderInfo['deliveryTime']))->format('Y-m-d H:i:s');
		}

		$deliveryAddress 	= (!empty($customerInfo['invoiceAddress']) ? $customerInfo['invoiceAddress'] : $customerInfo['address']);
		$deliveryCity 		= (!empty($customerInfo['invoiceCity']) ? $customerInfo['invoiceCity'] : $customerInfo['city']);
		$deliveryZip 		= (!empty($customerInfo['invoiceZip']) ? $customerInfo['invoiceZip'] : $customerInfo['zip']);

		$db->insert('orders',
				array(
					'debtor_id' 		=> $debtorId,
					'delivery_address' 	=> $deliveryAddress,
					'delivery_date' 	=> $deliveryDate,
					'delivery_city' 	=> $deliveryCity,
					'delivery_zip' 		=> $deliveryZip
				)
			);

		$orderId = $db->lastInsertId();

		$products = array(
			'Poster',
			'Roll-up',
			'Andet'
			);

		foreach ($orderlines as $orderline)
		{
			$product 		= $orderline['product'];						

			$material 		= (isset($orderline['material'])) ? $orderline['material'] : '';

			$formatComments = $orderline['format-comments'];
			$usageComments 	= $orderline['usage-comments'];
			
			$type 			= array_filter($orderline['type']);
			$type 			= ($type == null) ? '' : array_values($type)[0];

			$size 			= array_filter($orderline['size']);

			$sizeW 			= array_filter($orderline['size-w']);
			$sizeH 			= array_filter($orderline['size-h']);

			// echo "<pre>";
			// print_r($size);
			// echo "</pre>";

			// if(array_values($size)[0] == 'Andet')
			// {
			// 	echo "<pre>";
			// 	print_r(array_values($size)[0]);
			// 	echo "</pre>";
			// }
			// exit;

			if(empty($size) || array_values($size)[0] == 'Andet')
			{
				if(!empty($sizeH) && !empty($sizeW))
				{
					$size = array_values($sizeH)[0] . ' X '. array_values($sizeW)[0];
				}
				else
				{
					$size = '';
				}
			}
			else
			{
				$size = array_values($size)[0];
			}

			$db->insert('orderlines',
					array(
						'order_id' 		=> $orderId,
						'product_no' 	=> array_search($orderline['product'], $products)+1,
						'product' 		=> $product,
						'formatComments'=> $formatComments,
						'usageComments' => $usageComments,
						'material' 		=> $material,
						'type' 			=> $type,
						'size' 			=> $size
					)
				);

			if(!empty($orderline['file-upload-id']))
			{	
				$orderlineId = $db->lastInsertId();
				
				if(is_array($orderline['file-upload-id']))
				{
					foreach ($orderline['file-upload-id'] as $fileId)
					{
						attachFile($db, $fileId, $orderlineId);
					}
				}
				else
				{
					attachFile($db, $orderline['file-upload-id'], $orderlineId);
				}
			}
		}
		
	$db->commit();

	echo json_encode(array(
		'success' => true,
		'action' => 'Register order'
		));

}
catch(Exception $e)
{
	$db->rollBack();

	echo json_encode(array(
		'success' 	=> false,
		'msg' 		=>  $e->getMessage()
		));
}

function attachFile($db, $fileId, $orderlineId)
{
	$db->update('files',
			array(
				'attached' 	=> true
			),
			array(
				array('id', '=', $fileId)
			)
		);

		$db->insert('file_orderline_rel',
			array(
				'file_id' 		=> $fileId,
				'orderline_id' 	=> $orderlineId,
			)
		);
}