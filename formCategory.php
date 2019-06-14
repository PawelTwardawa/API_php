<?php
$schema = isset($_SERVER["HTTPS"]) ? "https:" : "http:";
$url = "$schema//$_SERVER[HTTP_HOST]/api/category/Add.php";
    
$data_string = 	" { \"name\" : \"" . $_POST["categoryName"] . "\" }";

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

echo "Poprwanie dodano kategorie do bazy. Jego ID to: " . $decoded->id;
