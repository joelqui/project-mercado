<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$selectedBarangay = $_GET['slctd'];

$selected = $_GET['select'];
$user = $db->query("SELECT brgy_code,barangay_name FROM `barangay` WHERE municipality_code=$selected");

$htmlContent = '<option value="">Barangay</option>';

while ($row = $user->fetch_assoc()){
    $htmlContent .= '<option value="';
    $htmlContent .= $row['brgy_code'].'"';
        if($row['brgy_code'] == $selectedBarangay)
            $htmlContent .= 'selected';
    $htmlContent .= '>'.$row['barangay_name'];
    $htmlContent .= '</option>';
}

echo $htmlContent;

?> 



