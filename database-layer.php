<?php

require('database.php');

$db = Database::getInstance('mysql', 'localhost', 'nordgrafisk', 'root', '');

$customerInfo 	= $_POST['customerInfo'];
$orderInfo 		= $_POST['orderInfo'];
$orderlines 	= $_POST['orderlines'];

// echo "<pre>";
// print_r($customerInfo);
// echo "</pre>";

// try{

	$db->beginTransaction();
		
		$db->insert('debtor', 
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

		$deliveryData = new DateTime($orderInfo['deliveryDate'].' '.$orderInfo['deliveryTime']);

		$db->insert('order', 
				array(
					'debtor_id' 		=> 44,
					// 'delivery_address' 	=> 'lol'
					// 'delivery_date' 	=> $deliveryData,
					// 'deliver_address' 	=> (!empty($customerInfo['invoiceAddress']) ? $customerInfo['invoiceAddress'] : $customerInfo['address']),
					// 'delivery_city' 	=> (!empty($customerInfo['invoiceCity']) ? $customerInfo['invoiceCity'] : $customerInfo['city']),
					// 'delivery_zip' 		=> (!empty($customerInfo['invoiceZip']) ? $customerInfo['invoiceZip'] : $customerInfo['zip'])
					)
				);

		$orderId = $db->lastInsertId();
		
	$db->commit();

// }
// catch(Exception $e)
// {
	// $db->rollBack();
	// echo $e->getMessage();
// }