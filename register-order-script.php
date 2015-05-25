<?php

require('database.php');

$db = Database::getInstance('mysql', 'localhost', 'nordgrafisk', 'root', '');

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

		$db->insert('orders',
				array(
					'debtor_id' 		=> $debtorId,
					'delivery_address' 	=> (!empty($customerInfo['invoiceAddress']) ? $customerInfo['invoiceAddress'] : $customerInfo['address']),
					'delivery_date' 	=> $deliveryDate,
					'delivery_city' 	=> (!empty($customerInfo['invoiceCity']) ? $customerInfo['invoiceCity'] : $customerInfo['city']),
					'delivery_zip' 		=> (!empty($customerInfo['invoiceZip']) ? $customerInfo['invoiceZip'] : $customerInfo['zip'])
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
			$db->insert('orderlines',
					array(
						'order_id' 		=> $orderId,
						'product_no' 	=> array_search($orderline['product'], $products)+1,
						'description' 	=> $orderline['product']
					)
				);

			if(!empty($orderline['file-upload-id']))
			{	
				$orderlineId = $db->lastInsertId();
				
				foreach ($orderline['file-upload-id'] as $fileId)
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
			}
		}
		
	$db->commit();

	echo json_encode(array(
		'success' => true
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