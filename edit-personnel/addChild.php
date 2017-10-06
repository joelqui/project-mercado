<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$pID = $_GET['id'];
$cname = strtoupper($_GET['cname']);
$bdate = $_GET['bdate'];

$status=0;

$sql = "INSERT INTO dependent (personnel_id, dependent_name, dependent_birthdate)
VALUES ('{$pID}', '{$cname}', '{$bdate}')";

if ($db->query($sql) === TRUE) {
    $status++;
} 

echo $status;

$db->close();
?>


