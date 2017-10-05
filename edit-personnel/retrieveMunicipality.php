<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$selectedMunicipality = $_GET['slctd'];

$selected = $_GET['select'];
$user = $db->query("SELECT municipality_code,municipality_name FROM `municipality` WHERE province_code=$selected");

$htmlContent = '<option value="">Municipality/City</option>';

while ($row = $user->fetch_assoc()){
    $htmlContent .= '<option value="';
    $htmlContent .= $row['municipality_code'].'"';
        if($row['municipality_code'] == $selectedMunicipality)
            $htmlContent .= 'selected';
    $htmlContent .= '>'.$row['municipality_name'];
    $htmlContent .= '</option>';
}

echo $htmlContent;

?> 



