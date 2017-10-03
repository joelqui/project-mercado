<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$esearch = $_GET['id'];
$esearchresult = array();

$user = $db->query("SELECT region_code, province_code, municipality_code, barangay_code
FROM personnel
WHERE personnel.personnel_id=$esearch");

while ($row = $user->fetch_assoc()){
    $temp=array ("region"=>$row['region_code'],"province"=>$row['province_code'],"municipality"=>$row['municipality_code'],"barangay"=>$row['barangay_code']);
    array_push($esearchresult,$temp);
}

echo json_encode($esearchresult);

?> 
