<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$status=0;



$user = $db->query("SELECT user_id,username,last_name,first_name,usertype+0 AS type FROM users WHERE username='$username' AND password='$password'");

if ($user->num_rows > 0) {
        while ($row = $user->fetch_assoc()){
        $status=1;
        $_SESSION["user_id"] = $row['user_id'];
        $_SESSION["username"] = $row['username'];
        $_SESSION["last_name"] = $row['last_name'];
        $_SESSION["first_name"] = $row['first_name'];
        $_SESSION["usertype"] = $row['type'];
        }
}
else {
    $status=0;
}


echo $status;


?>