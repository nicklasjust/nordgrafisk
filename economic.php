<?php

	$wsdlUrl = 'https://api.e-conomic.com/secure/api1/EconomicWebservice.asmx?WSDL';

	$client = new SoapClient($wsdlUrl, array("trace" => 1, "exceptions" => 1));    		
	$client->ConnectWithToken(
		array(
			'token' 	=> 'nsfG0GFUMWUr10gt-_9v3wyKrxVpEcXxe2mDFHgHPus1',
			'appToken'  => 'dciTAm_Tp-pPujYOxcNhhB9QJin7ZtB3rd6qGH2-b6Q1'
		)
	);

	$productGroup = $client->ProductGroup_GetAll()->ProductGroup_GetAllResult->ProductGroupHandle;

	echo "<pre>";
	print_r($productGroup);
	echo "</pre>";
?>

<?php
    require_once 'base.php';
    require_once 'database.class.php';

    class Economic {
        // ***** Generelt ******************************************************************************************

        function __construct() {
            $this->db = new Database();
        }

        // ***** Varer ******************************************************************************************
        public function get_varer() {
            $last_dato = $this->db->get_config_val('LastTime','Varer');
            $varer = $this->get_economic('products?pagesize=1000&filter=lastUpdated$gt:' . $last_dato);
            if ($varer->collection) {
                foreach ($varer->collection as $vare) {
                    $v["Nr"] = $vare->productNumber;
                    $v["Titel"] = $vare->name;
                    $v["Pris"] = $vare->salesPrice;
                    switch ($vare->productGroup->productGroupNumber) {
                        case 2:
                        case 4:
                            $v["Moms"] = 0;
                            break;
                        default:
                            $v["Moms"] = 25;
                            break;
                    }
                    $v["Aktiv"] = !$vare->barred;
                    $ret[] = $v;
                }
                $this->db->save_config_val('LastTime','Varer',$this->e_Date(''));
            } else {
                $ret = FALSE;
            }
            return $ret;
        }
    
        // ***** Kunder ******************************************************************************************
        public function get_kunder() {
            $last_dato = $this->db->get_config_val('LastTime','Kunder');
            $kunder = $this->get_economic('customers?pagesize=1000&filter=lastUpdated$gt:' . $last_dato);
            if ($kunder->collection) {
                foreach ($kunder->collection as $kunde) {
                    $v["Nr"] = $kunde->customerNumber;
                    $v["Navn"] = $kunde->name;
                    $v["Adresse"] = (isset($kunde->address) ? $kunde->address : NULL);
                    $v["Postnr"] = (isset($kunde->zip) ? $kunde->zip : NULL);
                    $v["By"] = (isset($kunde->city) ? $kunde->city : NULL);
                    $v["Tlf"] = (isset($kunde->telephoneAndFaxNumber) ? $kunde->telephoneAndFaxNumber : NULL);
                    $v["Email"] = (isset($kunde->email) ? $kunde->email : NULL);
                    $v["Aktiv"] = (isset($kunde->barred) ? ($kunde->barred == 0) : TRUE);
                    $ret[] = $v;
                }
                $this->db->save_config_val('LastTime','Kunder',$this->e_Date(''));
            } else {
                $ret = FALSE;
            }
            return $ret;
        }

        public function create_kunde($job) {
            // Find by Name
            $name = $job['Kunde'] . "\r\nv. " . $job['KontaktNavn'];
            $kunde = $this->get_economic('customers?filter=barred$eq:false$and:name$eq:' . urlencode($name));
            if (count($kunde->collection) > 0) {
                if (!isset($kunde->collection[0]->country)) $kunde->collection[0]->country = 'Danmark';
                return $kunde->collection[0];
            }

            // Find by email
            $email = $job['KontaktEmail'];
            $kunde = $this->get_economic('customers?filter=barred$eq:false$and:email$eq:' . urlencode($email));
            if (count($kunde->collection) > 0) {
                if (!isset($kunde->collection[0]->country)) $kunde->collection[0]->country = 'Danmark';
                return $kunde->collection[0];
            }

            // Create new
            $by = str_replace('  ',' ',$job['KontaktBy']);
            $by = explode(' ',$by);
            $zip = $by[0];
            $city = count($by) > 1 ? $by[1] : '';
            $data = array(
                'name' => $name,
                'address' => $job['KontaktAdr'],
                'zip' => $zip,
                'city' => $city,
                'country' => 'Danmark',
                'email' => $email,
                'telephoneAndFaxNumber' => $job['KontaktTlf'],
                'currency' => 'DKK',
                'vatZone' => array('vatZoneNumber' => 1),               // Indland
                'customerGroup' => array('customerGroupNumber' => 1),   // Diverse
                'paymentTerms' => array('paymentTermsNumber' => 3),     // Netto
                'layout' => array('layoutNumber' => 10)                 // Layout (TP = 10, Wella = 12)
            );
            return $this->post_economic('customers',$data);
        }

        // ***** Fakturaer ******************************************************************************************
        
        public function make_faktura($job) {
            for ($lin = 1; $lin <= 5; $lin++) { 
                $varenr = $job['F' . $lin . 'VareNr'];
                if ($varenr != '') {
                    $vare = $this->get_economic('products?filter=productNumber$eq:' . $varenr)->collection[0];
                    $line = [
                        'product' => ['productNumber' => $varenr],
                        'quantity' => (int)$job['F' . $lin . 'Antal'],
                        'description' => $job['F' . $lin . 'Tekst'],
                        'unit' => ['unitNumber' => $vare->unit->unitNumber],
                        'department' => ['departmentNumber' => $vare->department->departmentNumber],
                        'unitNetPrice' => (float)str_replace(',','.',str_replace('.','',$job['F' . $lin . 'Pris']))
                    ];
                    $lines[] = $line;
                }
            }
            $kunde = $this->create_kunde($job);
            $data = array(
                'date' => substr($job['Dato'],6,4) . '-' . substr($job['Dato'],3,2) . '-' . substr($job['Dato'],0,2),
                'currency' => 'DKK',
                'references' => ['other' => $job['JobNr']],
                'notes' => [
                    'heading' => $job['JobNr'] . ' ' . $job['Arrangement'],
                    'textLine1' => $job['Sted'] . ', d. ' . $job['Dato'] . (($job['FakturaTekst'] != '') ? '\r\n' . $job['FakturaTekst'] : '')
                ],
                'paymentTerms' => ['paymentTermsNumber' => $kunde->paymentTerms->paymentTermsNumber],
                'customer' => ['customerNumber' => $kunde->customerNumber],
                'recipient' => [
                    'name' => $kunde->name,
                    'address' => $kunde->address,
                    'zip' => $kunde->zip,
                    'city' => $kunde->city,
                    'country' => $kunde->country,
                    'vatZone' => ['vatZoneNumber' => 1]
                ],
                'layout' => ['layoutNumber' => $kunde->layout->layoutNumber],
                'lines' => $lines,
            );
            return $this->post_economic('invoices-experimental/drafts',$data);
        }

        // ***** Generelt ******************************************************************************************

        private function post_economic($url,$data){
            $options = array(
                'Content-Type: application/json',
                'Accept: application/json',
                'appId: 8ZYdmSFZu12WcfALID16LEnjH2E_TconFt7x686Oo3c1',
                'accessId: psBKYuJ18xYaaEdza_z4_g3z2QlI8zXs7qm3H1enZHg1'
            );
            //printvar(json_encode($data));

            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "https://restapi.e-conomic.com/" . $url); 
            curl_setopt($ch, CURLOPT_HTTPHEADER, $options);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POST, count($data));
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $output = curl_exec($ch); 

            if(curl_errno($ch)) {
                echo 'error:' . curl_error($ch);
            }
            curl_close($ch);     

            return json_decode($output);
        }

        private function get_economic($url){
            $options = array(
                'contentType: application/json; charset=utf-8',
                'appId: ------------------',
                'accessId: --------------------'
            );
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "https://restapi.e-conomic.com/" . $url); 
            curl_setopt($ch, CURLOPT_HTTPHEADER, $options);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $output = curl_exec($ch); 
            if(curl_errno($ch)) {
                echo 'error:' . curl_error($ch);
            }
            curl_close($ch);     
            return json_decode($output);
        }

        private function e_date($date) {  // UTC
            return left((($date == '') ? gmdate(DATE_ATOM) : gmdate(DATE_ATOM, $date)),19) . 'Z';
        }
    }
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