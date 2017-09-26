<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$esearch = $_GET['id'];
$esearchresult = array();

$user = $db->query("SELECT personnel_id,last_name,first_name,middle_name,suffix  
FROM personnel 
WHERE personnel_id=$esearch");

while ($row = $user->fetch_assoc()){
    $temp=array ("id"=>$row['personnel_id'],"lname"=>$row['last_name'],"fname"=>$row['first_name'],"mname"=>$row['middle_name'],"suffix"=>$row['suffix']);
    array_push($esearchresult,$temp);
}

echo json_encode($esearchresult);

?> 
