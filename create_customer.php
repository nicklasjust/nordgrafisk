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

	$customer_name = 'Nicklas Just Nielsen';
	$vat_zone = 'EU';
	$customer_address = 'Kappelvænget 12 st. 3';
	$customer_city = 'Aarhus V';
	$customer_postal_code = '8210';
	$customer_country = 'Danmark';
	$customer_mailaddress = 'nicklas_just2@hotmail.com';
	$customer_ean = '1234567891231';
	$customer_cvr = '20514507';
	$customer_phone_number = '28125239';

	$delivery_date = '';
	$delivery_time = '';

	$create_customer = $client->Debtor_Create(array(
		'number' => $next_customer_number,
		'debtorGroupHandle' => array(
			'Number' => 1
			),
		'name' => $customer_name,
		'vatZone' => $vat_zone
		));

	$debtor_handle = $create_customer->Debtor_CreateResult;

	$client->Debtor_SetAddress(array(
		'debtorHandle' => $debtor_handle,
		'value' => $customer_address
		));

	$client->Debtor_SetCity(array(
		'debtorHandle' => $debtor_handle,
		'value' => $customer_city
		));

	$client->Debtor_SetPostalCode(array(
		'debtorHandle' => $debtor_handle,
		'value' => $customer_postal_code
		));

	$client->Debtor_SetCountry(array(
		'debtorHandle' => $debtor_handle,
		'value' => $customer_country
		));

	$client->Debtor_SetEmail(array(
		'debtorHandle' => $debtor_handle,
		'value' => $customer_mailaddress
		));

	$client->Debtor_SetEan(array(
		'debtorHandle' => $debtor_handle,
		'value' => $customer_ean
		));

	$client->Debtor_SetCINumber(array(
		'debtorHandle' => $debtor_handle,
		'value' => $customer_cvr
		));

	$client->Debtor_SetTelephoneAndFaxNumber(array(
		'debtorHandle' => $debtor_handle,
		'value' => $customer_phone_number
		));

	// Her er ordreoprettelsen

	$orderHandle = $client->Order_Create(array(
			'debtorHandle' => array(
				'Number' => $next_customer_number
				)
		))->Order_CreateResult;

	$client->Order_SetDeliveryDate(array(
			'orderHandle' 	=> $orderHandle,
			'value' 		=> '2002-05-30T09:30:10+06:00'
		));

	$client->Order_SetDeliveryAddress(array(
			'orderHandle' 	=> $orderHandle,
			'value' 		=> $customer_address
		));

	$client->Order_SetDeliveryCity(array(
			'orderHandle'	=> $orderHandle,
			'value'			=> $customer_city
		));

	$client->Order_SetDeliveryCountry(array(
			'orderHandle'	=> $orderHandle,
			'value'			=> $customer_country
		));

	$orderLineHandle = $client->OrderLine_Create(array(
			'orderHandle' => $orderHandle
		))->OrderLine_CreateResult;

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







	// Her er arrayet der kommer ud til ajax.

	// $inserted_data = array(
	// 	'name' => $customer_name,
	// 	'vat_zone' => $vat_zone,
	// 	'address' => $customer_address,
	// 	'city' => $customer_city,
	// 	'postalcode' => $customer_postal_code,
	// 	'country' => $customer_country,
	// 	'mailaddress' => $customer_mailaddress,
	// 	'ean' => $customer_ean,
	// 	'phone_number' => $customer_phone_number
	// 	);

	// echo json_encode($inserted_data);





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
