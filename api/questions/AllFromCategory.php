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

$query =  ' SELECT  q.question, a1.answer as correct, a2.answer as incorrect1, a3.answer as incorrect2, a4.answer as incorrect3, k.Name as category 
                FROM questions q
                LEFT JOIN answers a1 on q.correct_answer = a1.ID
                LEFT JOIN answers a2 on q.incorrect_answer1 = a2.ID
                LEFT JOIN answers a3 on q.incorrect_answer2 = a3.ID
                LEFT JOIN answers a4 on q.incorrect_answer3 = a4.ID
                LEFT JOIN category k on q.category = k.ID
                WHERE k.ID = ' . $decoded->id;

$stmt = $db->prepare($query);
$stmt->execute();

$question_arr = array();

while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    array_push($question_arr, $row);
}

echo json_encode($question_arr);

