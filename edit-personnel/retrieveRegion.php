<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$user = $db->query("SELECT region_code, region_name FROM region");

$htmlContent = "";

while ($row = $user->fetch_assoc()){
    $htmlContent .= '<option value="';
    $htmlContent .= $row['region_code'].'">';
    $htmlContent .= $row['region_name'];
    $htmlContent .= '</option>';
}

echo $htmlContent;

?> 



