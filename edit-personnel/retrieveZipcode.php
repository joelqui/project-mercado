<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$selected = $_GET['select'];
$user = $db->query("SELECT zip_code FROM `municipality` WHERE municipality_code=$selected");
$esearchresult = array();

$htmlContent = "";

while ($row = $user->fetch_assoc()){
    $temp=array ("zipcode"=>$row['zip_code']);
    array_push($esearchresult,$temp);
}

echo json_encode($esearchresult);

?> 



