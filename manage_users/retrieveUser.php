<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$userid=$_GET['id'];

$user = $db->query("
SELECT username FROM users WHERE 
user_id=$userid");

$htmlContent = '<h4 data-value="';

while ($row = $user->fetch_assoc()){

$htmlContent .= $userid;
$htmlContent .= '">';
$htmlContent .=  'Username: ';
$htmlContent .= $row['username'];
$htmlContent .= '</h4>';
}

echo $htmlContent;

?> 

