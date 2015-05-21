<?php
	$wsdlUrl = 'https://api.e-conomic.com/secure/api1/EconomicWebservice.asmx?WSDL';

	$client = new SoapClient($wsdlUrl, array("trace" => 1, "exceptions" => 1));    		
	$client->ConnectWithToken(
		array(
			'token' 	=> 'V17qsgk6uR-6MfrNkTdgRhydwNLTOkCXNcF7R588GMs1',
			'appToken'  => 'dciTAm_Tp-pPujYOxcNhhB9QJin7ZtB3rd6qGH2-b6Q1'
		)
	);

	$next_number = $client->Debtor_GetNextAvailableNumber();
	$next_customer_number = (string)$next_number->Debtor_GetNextAvailableNumberResult;

	$create_customer = $client->Debtor_Create(array(
		'number' => $next_customer_number,
		'debtorGroupHandle' => array(
			'Number' => 1
			),
		'name' => 'Nicklas',
		'vatZone' => 'EU'
		));

	echo "<pre>";
	print_r($create_customer);
	echo "</pre>";

	$debtor_handle = $create_customer->Debtor_CreateResult;

	$client->Debtor_SetAddress(array(
		'debtorHandle' => $debtor_handle,
		'value' => 'Kappelvænget 12 st. 3'
		));

	$client->Debtor_SetCity(array(
		'debtorHandle' => $debtor_handle,
		'value' => 'Aarhus V'
		));

	$client->Debtor_SetPostalCode(array(
		'debtorHandle' => $debtor_handle,
		'value' => '8210'
		));

	$client->Debtor_SetCountry(array(
		'debtorHandle' => $debtor_handle,
		'value' => 'Danmark'
		));

	$client->Debtor_SetEmail(array(
		'debtorHandle' => $debtor_handle,
		'value' => 'nicklas_just2@hotmail.com'
		));

	$client->Debtor_SetEan(array(
		'debtorHandle' => $debtor_handle,
		'value' => '1234567891231'
		));

	// $Delivery_Location = array(
	// 	'Id' => 1
	// 	);

	// $client->DeliveryLocation_SetAddress(array(
	// 	'deliveryLocationHandle' => $Delivery_Location,
	// 	'value' => 'Kappelvænget 12 st. 3'
	// 	));

	// $client->DeliveryLocation_SetPostalCode(array(
	// 	'deliveryLocationHandle' => $Delivery_Location,
	// 	'value' => '8210'
	// 	));


	// $client->DeliveryLocation_SetCity(array(
	// 	'deliveryLocationHandle' => $Delivery_Location,
	// 	'value' => 'Aarhus V'
	// 	));

	// $client->DeliveryLocation_SetCountry(array(
	// 	'deliveryLocationHandle' => $Delivery_Location,
	// 	'value' => 'Danmark'
	// 	));

	// $found_by_number = $client->Debtor_FindByTelephoneAndFaxNumber(array(
	// 	'telephoneAndFaxNumber' => '28125239'
	// 	));

	// $attention = $client->Debtor_GetData(array(
	// 	'entityHandle' => array(
	// 		'Number' => $found_by_number->Debtor_FindByTelephoneAndFaxNumberResult->DebtorHandle->Number)
	// 	));
	// echo "<pre>";
	// print_r($attention);
	// echo "</pre>";

?>
