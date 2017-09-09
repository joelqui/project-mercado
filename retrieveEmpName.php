<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once 'connect.php';

$esearch = $_GET['id'];
$esearchresult = array();

$user = $db->query("SELECT CONCAT(last_name,', ',first_name,' ',middle_name) AS full_name 
FROM employee WHERE emp_id=$esearch");

while ($row = $user->fetch_assoc()){
    echo $row['full_name'];
}

?> 
