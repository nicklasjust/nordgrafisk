
<?php
	
	echo "lol";
	exit;
	
	$wsdlUrl = 'https://api.e-conomic.com/secure/api1/EconomicWebservice.asmx?WSDL';

	$client = new SoapClient($wsdlUrl, array("trace" => 1, "exceptions" => 1));    		
	$client->ConnectWithToken(
		array(
			'token' 	=> 'nsfG0GFUMWUr10gt-_9v3wyKrxVpEcXxe2mDFHgHPus1',
			'appToken'  => 'dciTAm_Tp-pPujYOxcNhhB9QJin7ZtB3rd6qGH2-b6Q1'
		)
	);

	$debtorHandle = $client->Debtor_Create(array(
		'number' => '1',
		'debtorGroupHandle' => array(
			'Number' => 1
			),
		'name' => 'Nicklas',
		'vatZone' => 'EU'
		));
	echo '<pre>';
	print_r($debtorHandle);
	echo '</pre>';

?>
