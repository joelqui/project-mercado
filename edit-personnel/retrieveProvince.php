<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$selectedProvince = $_GET['slctd'];

$selected = $_GET['select'];
$user = $db->query("SELECT province_code,province_name FROM `province` WHERE region_code=$selected");

$htmlContent = '<option value="">Province</option>';

while ($row = $user->fetch_assoc()){
    $htmlContent .= '<option value="';
    $htmlContent .= $row['province_code'].'"';
        if($row['province_code'] == $selectedProvince)
            $htmlContent .= 'selected';
    $htmlContent .= '>'.$row['province_name'];
    $htmlContent .= '</option>';
}

echo $htmlContent;

?> 



