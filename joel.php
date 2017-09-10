<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once 'connect.php';

//This is to test if git really works!!!!

$esearch = $_GET['eq'];
$esearchresult = array();

$user = $db->query("SELECT emp_id,CONCAT(last_name,', ',first_name,' ',middle_name) AS full_name 
FROM employee 
WHERE last_name LIKE '$esearch%' OR first_name LIKE '$esearch%' OR middle_name LIKE '$esearch%'");
$cnt=0;
while ($row = $user->fetch_assoc()){
  /*  echo '<a href=personnel.php?id=',$row['emp_id'],'>';
    echo $row['full_name'];
    echo '</a><br>';  */
    $temp=array ("id"=>$row['emp_id'],"text"=>$row['full_name']);
    array_push($esearchresult,$temp);
}
echo json_encode($esearchresult);

?> 
