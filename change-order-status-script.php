<?php
require('database.php');

$db = Database::getInstance('mysql', 'localhost', 'nordgrafisk', 'root', '');
try{

	$status 	= $_POST['status'];
	$orderId 	= $_POST['orderId'];

	$db->update('orders',
			array(
				'status' => $status
			),
			array(
				array('id', '=', $orderId)
			)
		);

	echo json_encode(array(
		'success' => true
		));
}
catch(Exception $e)
{
	echo json_encode(array(
		'success' 	=> false,
		'msg' 		=>  $e->getMessage()
		));
}