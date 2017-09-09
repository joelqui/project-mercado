<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$schoolid=$_GET['school'];
$empid=$_GET['employee'];

$personnel = $db->query("SELECT * FROM school_assignments WHERE emp_id = $empid");
$assignStatus =0;
while ($row = $personnel->fetch_assoc()){
    if($row['emp_id']==$empid && $row['school_id']==$schoolid)
        $assignStatus=2;
    else
        $assignStatus=1;
}

echo $assignStatus;
?>