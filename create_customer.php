
<?php
	$wsdlUrl = 'https://api.e-conomic.com/secure/api1/EconomicWebservice.asmx?WSDL';

	$client = new SoapClient($wsdlUrl, array("trace" => 1, "exceptions" => 1));    		
	$client->ConnectWithToken(
		array(
			'token' 	=> 'nsfG0GFUMWUr10gt-_9v3wyKrxVpEcXxe2mDFHgHPus1',
			'appToken'  => 'dciTAm_Tp-pPujYOxcNhhB9QJin7ZtB3rd6qGH2-b6Q1'
		)
	);

	// $debtorHandle = $client->Debtor_Create(array(
	// 	'number' => '100',
	// 	'debtorGroupHandle' => array(
	// 		'Number' => 2
	// 		),
	// 	'name' => 'Nicklas',
	// 	'vatZone' => 'EU'
	// 	));
	// echo '<pre>';
	// print_r($debtorHandle);
	// echo '</pre>';

	// $debtorHandle = array(
	// 		'Number' => 34
	// 	);

	// $client->Debtor_SetAddress(array(
	// 	'debtorHandle' => $debtorHandle,
	// 	'value' => 'Kappelvænget 12 st. 3'
	// 	));

	// $client->Debtor_SetCity(array(
	// 	'debtorHandle' => $debtorHandle,
	// 	'value' => 'Aarhus V'
	// 	));

	// $client->Debtor_SetPostalCode(array(
	// 	'debtorHandle' => $debtorHandle,
	// 	'value' => '8210'
	// 	));

	// $client->Debtor_SetCountry(array(
	// 	'debtorHandle' => $debtorHandle,
	// 	'value' => 'Danmark'
	// 	));

	// $client->Debtor_SetEmail(array(
	// 	'debtorHandle' => $debtorHandle,
	// 	'value' => 'nicklas_just2@hotmail.com'
	// 	));

	// $client->Debtor_SetEan(array(
	// 	'debtorHandle' => $debtorHandle,
	// 	'value' => '1234567891231'
	// 	));

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

	$next_number = $client->Debtor_GetNextAvailableNumber();

	echo "<pre>";
	print_r($next_number);
	echo "</pre>";



?>
