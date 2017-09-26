<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$pID = $_GET['id'];
$lastName = strtoupper($_GET['lname']);
$firstName = strtoupper($_GET['fname']);
$middleName = strtoupper($_GET['mname']);
$suffix = strtoupper($_GET['suffix']);

$status = 0;

$sql=sprintf("UPDATE `personnel` SET `last_name`='%s', `first_name` ='%s', `middle_name` ='%s', `suffix` ='%s' WHERE `personnel`.`personnel_id` = %d",$lastName,$firstName,$middleName,$suffix,$pID);

// $sql=sprintf("UPDATE users SET password='%s' WHERE user_id=%d",$password1,$userid);

if ($db->query($sql) === TRUE) {
    $status=1;
} 

$db->close();

echo $status;

?> 
