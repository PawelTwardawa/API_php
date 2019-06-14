<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once '../../config/Database.php';

$database = new Database();
$db = $database->connect();

$query =  ' SELECT  k.ID, k.Name
            FROM category k';

$stmt = $db->prepare($query);
$stmt->execute();

$category_arr = array();

while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    array_push($category_arr, $row);
}

echo json_encode($category_arr);

