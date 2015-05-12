<?php

// $url = "https://restapi.e-conomic.com/customers";


// $agent = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36';

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_VERBOSE, true);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_USERAGENT, $agent);
// curl_setopt($ch, CURLOPT_URL,$url);
// curl_setopt_array($ch, array(
//	 CURLOPT_HTTPHEADER  	=> array(
//	 	'AppID: z5D_fdywpE3eTjq5R9yUqWabK5BKaq_lxaDp2ksMIA81',
//	 	'AccessID : 9fvq9KzQuegRUXO1SAQ053byEAj7L4OnolyYqC9hXX81',
//	 	'accept: application/json'
//	 ),
//	 CURLOPT_RETURNTRANSFER  => true,
//	 CURLOPT_VERBOSE	 	=> 1
// ));

// $response = curl_exec($ch);

// echo "<pre>";
// print_r(json_decode($response));
// echo "</pre>";

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
				$.ajax({
					url: "https://restapi.e-conomic.com/customers",
					dataType: "json",
					headers:{
						appId: "z5D_fdywpE3eTjq5R9yUqWabK5BKaq_lxaDp2ksMIA81",
						accessId: "9fvq9KzQuegRUXO1SAQ053byEAj7L4OnolyYqC9hXX81",
						accept: "application/json"
					},
					contentType: 'application/json',
					data: {
					    "currency":"DKK",
					    "customerGroup":{
					        "customerGroupNumber":2,
					        "self":"https://restapi.e-conomic.com/customer-groups/2"
					    },
					    "vatZone":{
					        "vatZoneNumber":1,
					        "self":"https://restapi.e-conomic.com/vat-zones/1"
					    },
					    "name":"Leif",
					    "paymentTerms":{
					        "paymentTermsNumber":2,
					        "paymentTermsType":0,
					        "self":"https://restapi.e-conomic.com/payment-terms/2"
					    },
					    "balance":0.00
					},
					type: "POST",
					success: function(data, textStatus, jqXHR)
					{
						console.log(data);
					},
					error: function(jqXHR, textStatus, errorThrown)
					{
						console.log(jqXHR.responseText);
					}
				});
			});



		</script>

	</head>
	
	<body>
	</body>

</html>