<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$esearch = $_GET['id'];
$esearchresult = array();

$user = $db->query("SELECT personnel.personnel_id,last_name,first_name,middle_name,suffix,date_of_birth,civil_status+0 AS civstat,sex,regular.rpsu_num,sss_num,gsis_num,tin,philhealth_num
FROM personnel 
INNER JOIN regular ON personnel.personnel_id = regular.personnel_id 
WHERE personnel.personnel_id=$esearch");

while ($row = $user->fetch_assoc()){
    $temp=array ("id"=>$row['personnel_id'],"lname"=>$row['last_name'],"fname"=>$row['first_name'],"mname"=>$row['middle_name'],"suffix"=>$row['suffix'],"birthdate"=>$row['date_of_birth'],"civilstatus"=>$row['civstat'],"sex"=>$row['sex'],"empnum"=>$row['rpsu_num'],"sssnum"=>$row['sss_num'],"gsisnum"=>$row['gsis_num'],"tin"=>$row['tin'],"philhealthnum"=>$row['philhealth_num']);
    array_push($esearchresult,$temp);
}

echo json_encode($esearchresult);

?> 
