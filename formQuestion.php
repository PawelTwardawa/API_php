<?php
$schema = isset($_SERVER["HTTPS"]) ? "https:" : "http:";
$url = "$schema//$_SERVER[HTTP_HOST]/api/questions/Add.php";
    
	//echo $_POST["incorrect2"];
	
$data_string = 	"{ \"question\" : \"" . $_POST["question"] . "\",
					\"correct\" : \"" . $_POST["correct"] . "\",
					\"incorrect1\" : \"" . $_POST["incorrect1"] . "\",
					\"incorrect2\" : \"" . $_POST["incorrect2"] . "\",
					\"incorrect3\" : \"" . $_POST["incorrect3"] . "\",
					\"category\" : " . $_POST["category"] . "}";

$ch = curl_init($url);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string );                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   

$result = curl_exec($ch);

$decoded = json_decode($result);

echo "Poprwanie dodano pytanie do bazy. Jego ID to: " . $decoded->id;
