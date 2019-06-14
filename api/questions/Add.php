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

//TODO: validate data!

$query =  'INSERT INTO answers (answer) VALUES ( \'' . $decoded->correct .'\' ) ';
$stmt = $db->prepare($query);
$stmt->execute();
$id_correct = $db->lastInsertId();

$query =  'INSERT INTO answers (answer) VALUES ( \'' . $decoded->incorrect1 .'\' ) ';
$stmt = $db->prepare($query);
$stmt->execute();
$id_incorrect1 = $db->lastInsertId();

$query =  'INSERT INTO answers (answer) VALUES ( \'' . $decoded->incorrect2 .'\' ) ';
$stmt = $db->prepare($query);
$stmt->execute();
$id_incorrect2 = $db->lastInsertId();

$query =  'INSERT INTO answers (answer) VALUES ( \'' . $decoded->incorrect3 .'\' ) ';
$stmt = $db->prepare($query);
$stmt->execute();
$id_incorrect3 = $db->lastInsertId();


$query =  'INSERT INTO questions (correct_answer, incorrect_answer1, incorrect_answer2, incorrect_answer3, category, question) 
			VALUES ( 
			\'' . $id_correct .'\',
			\'' . $id_incorrect1 . '\',
			\'' . $id_incorrect2 . '\',
			\'' . $id_incorrect3 . '\',
			\'' . $decoded->category . '\',
			\'' . $decoded->question . '\') ';
			
$stmt = $db->prepare($query);
$stmt->execute();

echo '{ "id" : "' . $db->lastInsertId() . '" } ';

