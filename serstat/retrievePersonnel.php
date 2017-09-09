<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$selectedSchool = $_GET['school'];
$htmlContent = "";

$school = $db->query("SELECT CONCAT(last_name,' ', first_name) 
AS full_name from employee 
INNER JOIN school_assignments ON employee.emp_id=school_assignments.emp_id 
WHERE school_assignments.school_id =  $selectedSchool
");


while ($row = $school->fetch_assoc()){
  
   $htmlContent .= '<tr><td>';
    $htmlContent .= $row['full_name'];
    $htmlContent .= '</td><td>Teacher I</td></tr>';
}
echo $htmlContent;

?> 


    