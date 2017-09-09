<?php

ini_set('display_errors','On');

$db = new PDO('mysql:host=127.0.0.1;dbname=data_mix','root','');

$schoolid=strtoupper($_POST['schoolID']);
$empid=strtoupper($_POST['empID']);

$user = $db->prepare("
        INSERT INTO school_assignments(emp_id,school_id)
        VALUES (:empid, :schoolid)
        ");

if($user->execute([
    'schoolid'=>$schoolid,
    'empid'=>$empid
]))
echo "Pussy Is Good";
else
{
    echo"pussy is Bad!";
}
?> 