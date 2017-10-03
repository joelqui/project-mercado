<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$selected = $_GET['select'];
$user = $db->query("SELECT brgy_code,barangay_name FROM `barangay` WHERE municipality_code=$selected");

$htmlContent = "";

while ($row = $user->fetch_assoc()){
    $htmlContent .= '<option value="';
    $htmlContent .= $row['brgy_code'].'">';
    $htmlContent .= $row['barangay_name'];
    $htmlContent .= '</option>';
}

echo $htmlContent;

?> 



