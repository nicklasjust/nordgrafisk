<?php
require('database.php');

$db = Database::getInstance('mysql', $config['db-host'], $config['db-name'], $config['db-user'], $config['db-pass']);

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
		'success' => true,
		'action' => 'Change status of order'
		));
}
catch(Exception $e)
{
	echo json_encode(array(
		'success' 	=> false,
		'msg' 		=>  $e->getMessage()
		));
}