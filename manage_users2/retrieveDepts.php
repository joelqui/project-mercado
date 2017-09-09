<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$district = $db->query("SELECT dept_id,dept_name FROM department ORDER BY dept_name ASC");

$htmlContent = '<option value=""></option>';


//outputs the html code for departments dropdown
while ($row = $district->fetch_assoc()){
    $htmlContent .= '<option value="';
    $htmlContent .= $row['dept_id'];
    $htmlContent .= '">';   
    $htmlContent .= $row['dept_name'];
    $htmlContent .= '</option>';
}

echo $htmlContent;

?> 