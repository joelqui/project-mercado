<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$esearch = $_GET['searchTerm'];
$esearchresult = array();

$user = $db->query("SELECT personnel_id,CONCAT(last_name,', ',first_name,' ',middle_name) AS full_name 
FROM personnel 
WHERE last_name LIKE '$esearch%' OR first_name LIKE '$esearch%' OR middle_name LIKE '$esearch%'");

while ($row = $user->fetch_assoc()){
    $temp=array ("id"=>$row['personnel_id'],"text"=>$row['full_name']);
    array_push($esearchresult,$temp);
}

echo json_encode($esearchresult);

?> 
