<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$selected = $_GET['select'];
$user = $db->query("SELECT municipality_code,municipality_name FROM `municipality` WHERE province_code=$selected");

$htmlContent = "";

while ($row = $user->fetch_assoc()){
    $htmlContent .= '<option value="';
    $htmlContent .= $row['municipality_code'].'">';
    $htmlContent .= $row['municipality_name'];
    $htmlContent .= '</option>';
}

echo $htmlContent;

?> 



