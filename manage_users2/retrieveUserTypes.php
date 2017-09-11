<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$usertype = $db->query("SELECT usertype_id, usertype FROM usertype ORDER BY usertype ASC");

$htmlContent = '<option value=""></option>';


//outputs the html code for departments dropdown
while ($row = $usertype->fetch_assoc()){
    $htmlContent .= '<option value="';
    $htmlContent .= $row['usertype_id'];
    $htmlContent .= '">';   
    $htmlContent .= $row['usertype'];
    $htmlContent .= '</option>';
}

echo $htmlContent;

?> 

