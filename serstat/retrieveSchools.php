<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$selectedDistrict = $_GET['district'];
$htmlContent = "";

$school = $db->query("SELECT * FROM school 
WHERE district_id = $selectedDistrict");


while ($row = $school->fetch_assoc()){
  
   $htmlContent .= '<li class="list-group-item"><a href="?schoolid=';
    $htmlContent .= $row['school_id'];
    $htmlContent .= '">';
    $htmlContent .= $row['school_name'];
    $htmlContent .= '</a></li>';
}
echo $htmlContent;

?> 