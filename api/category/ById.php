<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once '../../config/Database.php';

if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
    throw new Exception('Request method must be POST!');
}

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if(strcasecmp($contentType, 'application/json') != 0){
    throw new Exception('Content type must be: application/json');
}

$database = new Database();
$db = $database->connect();


$content = trim(file_get_contents("php://input"));

$decoded = json_decode($content);

$query =  ' SELECT  k.ID, k.Name
            FROM category k
            WHERE k.ID = ' . $decoded->id;

$stmt = $db->prepare($query);
$stmt->execute();

$category_arr = array();

while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    array_push($category_arr, $row);
}

echo json_encode($category_arr);

