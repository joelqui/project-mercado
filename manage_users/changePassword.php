<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$userid=$_POST['id'];
$password1=$_POST['p1'];
$password2=$_POST['p2'];

$status=0;

if(strcmp($password1,$password2))
    {
    $status=2; 
    }
else if (empty($password1) || strlen($password1)<=6){
    $status=3;
    }
else {
    $sql=sprintf("UPDATE users SET password='%s' WHERE user_id=%d",$password1,$userid);

    if ($db->query($sql) === TRUE) {
        $status=1;
    } else {
        $status=0;
    }
}

echo $status;

?> 


