<?php
	
	$wsdlUrl = 'https://api.e-conomic.com/secure/api1/EconomicWebservice.asmx?WSDL';

	$client = new SoapClient($wsdlUrl, array("trace" => 1, "exceptions" => 1));
	$client->ConnectWithToken(
		array(
			'token' 	=> 'V17qsgk6uR-6MfrNkTdgRhydwNLTOkCXNcF7R588GMs1',
			'appToken'  => 'dciTAm_Tp-pPujYOxcNhhB9QJin7ZtB3rd6qGH2-b6Q1'
		)
	);