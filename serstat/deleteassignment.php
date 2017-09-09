<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$empid=$_GET['employee'];
$status;
$sql = ("DELETE FROM `school_assignments` WHERE emp_id = $empid");

if ($db->query($sql) == TRUE && $db->affected_rows != 0) {
    $status = 1;
} else {
    $status = 0;
}

echo $status;
$db->close();
?>


