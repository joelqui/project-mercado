<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$dID = $_GET['dependent_id'];

$status = 0;

$sql = ("DELETE FROM `dependent` WHERE dependent_id = $dID");

if ($db->query($sql) == TRUE && $db->affected_rows != 0) {
    $status++;
} 

echo $status;

$db->close();
?>


