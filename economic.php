<?php

	$wsdlUrl = 'https://api.e-conomic.com/secure/api1/EconomicWebservice.asmx?WSDL';

	$client = new SoapClient($wsdlUrl, array("trace" => 1, "exceptions" => 1));    		
	$client->ConnectWithToken(
		array(
			'token' 	=> $_REQUEST['token'],
			'appToken'  => '9fvq9KzQuegRUXO1SAQ053byEAj7L4OnolyYqC9hXX81'
		)
	);

appId: "z5D_fdywpE3eTjq5R9yUqWabK5BKaq_lxaDp2ksMIA81",
accessId: "9fvq9KzQuegRUXO1SAQ053byEAj7L4OnolyYqC9hXX81",
accept: "application/json"
?>

<!DOCTYPE html>
<html lang="da">
	
	<head>

		<meta charset="utf-8">
		<title>E-conomic test site</title>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

		<script type="text/javascript">

			$(document).ready(function()
			{
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