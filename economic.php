<?php

	$wsdlUrl = 'https://api.e-conomic.com/secure/api1/EconomicWebservice.asmx?WSDL';

	$client = new SoapClient($wsdlUrl, array("trace" => 1, "exceptions" => 1));    		
	$client->ConnectWithToken(
		array(
			'token' 	=> 'nsfG0GFUMWUr10gt-_9v3wyKrxVpEcXxe2mDFHgHPus1',
			'appToken'  => 'dciTAm_Tp-pPujYOxcNhhB9QJin7ZtB3rd6qGH2-b6Q1'
		)
	);

	// $productGroup = $client->ProductGroup_GetAll()->ProductGroup_GetAllResult->ProductGroupHandle;

	// echo "<pre>";
	// print_r($productGroup);
	// echo "</pre>";

	// $productGroupHandles = $client->ProductGroup_GetName(array(
	// 	'productGroupHandle' => array(
	// 						'Number' => 2
	// 						)
	// 	));

	// echo "<pre>";
	// print_r($productGroupHandles);
	// echo "</pre>";

	//exit;

	$debtorGroupHandles = $client->debtorGroup_GetAll()->DebtorGroup_GetAllResult->DebtorGroupHandle;

	$client->Order_Create(array(
			'debtorHandle' => array(
				'Number' => '1'
				)
		));

	// $newDebtorHandle = $client->Debtor_Create(array(

	// 	'number'            => '20',
	// 	'debtorGroupHandle' => $debtorGroupHandles,
	// 	'name'              => 'Leif',
	// 	'vatZone'           => 'EU'))->Debtor_CreateResult;

	// exit;

	$productGroupHandles = $client->productGroup_GetAll()->ProductGroup_GetAllResult->ProductGroupHandle;
	$firstProductGroup = $productGroupHandles[0];

	echo "<pre>";
	print_r($firstProductGroup);
	echo "</pre>";

	// exit;
	$arg = array(
		'number' 	=> '109',
		'productGroupHandle' => array(
							'Number' => $firstProductGroup->Number
							),
		'name' 		=> 'Bananer'
		);

	$createProduct = $client->Product_Create($arg)->Product_CreateResult;

	echo "<pre>";
	print_r($createProduct);
	echo "</pre>";
?>

<!DOCTYPE html>
<html lang="da">
	
	<head>

		<meta charset="utf-8">
		<title>E-conomic test site</title>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

		<script type="text/javascript">

			// $(document).ready(function()
			// {
			// 	$.ajax({
			// 		url: "https://restapi.e-conomic.com/PAYMENT-TERMS",
			// 		dataType: "json",
			// 		headers:{
			// 			appId: "z5D_fdywpE3eTjq5R9yUqWabK5BKaq_lxaDp2ksMIA81",
			// 			accessId: "9fvq9KzQuegRUXO1SAQ053byEAj7L4OnolyYqC9hXX81",
			// 			accept: "application/json"
			// 		},
			// 		contentType: 'application/json',
			// 		data: {
			// 		    "name": "test betalingstype",
			// 			"paymentTermsType": "net"
			// 		},
			// 		type: "POST",
			// 		success: function(data, textStatus, jqXHR)
			// 		{
			// 			console.log(data);
			// 		},
			// 		error: function(jqXHR, textStatus, errorThrown)
			// 		{
			// 			console.log(jqXHR.responseText);
			// 		}
			// 	});
			// });

		</script>

	</head>
	
	<body>
	</body>

</html>