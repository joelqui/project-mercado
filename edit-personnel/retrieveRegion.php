<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$selected = $_GET['slctd'];
$user = $db->query("SELECT region_code, region_name FROM region");

$htmlContent = '<option value="">Select Region</option>';

while ($row = $user->fetch_assoc()){
    $htmlContent .= '<option value="';
    $htmlContent .= $row['region_code'].'"';
    if($row['region_code'] == $selected)
        $htmlContent .= 'selected';
    $htmlContent .= '>'.$row['region_name'];
    $htmlContent .= '</option>';
}

echo $htmlContent;

?> 



