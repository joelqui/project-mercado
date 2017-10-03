<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$pID = $_GET['id'];
$lastName = strtoupper($_GET['lname']);
$firstName = strtoupper($_GET['fname']);
$middleName = strtoupper($_GET['mname']);
$suffix = strtoupper($_GET['suffix']);
$region = $_GET['region'];
$province = $_GET['province'];
$municipality = $_GET['municipality'];
$barangay = $_GET['barangay'];


$status = 0;

$sql=sprintf("UPDATE `personnel` SET `last_name`='%s', `first_name` ='%s', `middle_name` ='%s', `suffix` ='%s'
WHERE `personnel`.`personnel_id` = %d",$lastName,$firstName,$middleName,$suffix,$pID);

// $sql=sprintf("UPDATE users SET password='%s' WHERE user_id=%d",$password1,$userid);

if ($db->query($sql) === TRUE) {
    echo 'haha';
    $status++;
} 


$sql="UPDATE `personnel` SET `region_code`=$region,`province_code`=$province,`municipality_code`=$municipality,`barangay_code`=$barangay
WHERE personnel_id=$pID";

// $sql=sprintf("UPDATE users SET password='%s' WHERE user_id=%d",$password1,$userid);

if ($db->query($sql) === TRUE) {
    $status++;
    echo 'hehehe';
} 


$db->close();

echo $status;

?> 
