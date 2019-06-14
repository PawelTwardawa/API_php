<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once '../../config/Database.php';

$database = new Database();
$db = $database->connect();

$query =  ' SELECT  k.ID
            FROM category k';

$stmt = $db->prepare($query);
$stmt->execute();

$category_id_arr = array();

while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    array_push($category_id_arr, $row["ID"]);
}

$rand_keys = array_rand($category_id_arr, 2);

//echo $category_id_arr[$rand_keys];

$query =  ' SELECT  k.ID, k.Name
            FROM category k
            WHERE k.ID = ' . $category_id_arr[$rand_keys[0]] .
			' OR k.ID = ' . $category_id_arr[$rand_keys[1]];

$stmt = $db->prepare($query);
$stmt->execute();

$question_arr = array();

while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    array_push($question_arr, $row);
}

echo json_encode($question_arr);

