<?php

	$wsdlUrl = 'https://api.e-conomic.com/secure/api1/EconomicWebservice.asmx?WSDL';

	$client = new SoapClient($wsdlUrl, array("trace" => 1, "exceptions" => 1));    		
	$client->ConnectWithToken(
		array(
			'token' 	=> 'nsfG0GFUMWUr10gt-_9v3wyKrxVpEcXxe2mDFHgHPus1',
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
			'Id' => '47'
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

	// $orderLineHandle = $client->OrderLine_Create(array(
	// 		'orderHandle' => $orderHandle
	// 	))->OrderLine_CreateResult;

	// echo "<pre>";
	// print_r($orderLineHandle);
	// echo "</pre>";

	$orderLineHandle = array(
			'Id' => '47',
			'Number' => '1'
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