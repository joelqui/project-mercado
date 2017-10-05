<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$esearch = $_GET['id'];
$esearchresult = array();

$user = $db->query("SELECT personnel.personnel_id,last_name,first_name,middle_name,suffix,
date_of_birth,place_of_birth,civil_status+0 AS civstat,sex+0 AS sex,
email_address,cel_num,tel_num,height,weight,blood_type+0 AS blood_type,
regular.rpsu_num,sss_num,gsis_num,tin,philhealth_num,pagibig_num,
spouse_last_name,spouse_first_name,spouse_middle_name,
father_last_name,father_first_name,father_middle_name,
mother_last_name,mother_first_name,mother_middle_name
FROM personnel 
INNER JOIN regular ON personnel.personnel_id = regular.personnel_id 
WHERE personnel.personnel_id=$esearch");

while ($row = $user->fetch_assoc()){
    $temp=array ("id"=>$row['personnel_id'],"lname"=>$row['last_name'],"fname"=>$row['first_name'],"mname"=>$row['middle_name'],"suffix"=>$row['suffix'],
    "birthdate"=>$row['date_of_birth'],"birthplace"=>$row['place_of_birth'],"civilstatus"=>$row['civstat'],"sex"=>$row['sex'],
    "email"=>$row['email_address'],"celno"=>$row['cel_num'],"telno"=>$row['tel_num'],"height"=>$row['height'],"weight"=>$row['weight'],"bloodtype"=>$row['blood_type'],
    "empnum"=>$row['rpsu_num'],"sssnum"=>$row['sss_num'],"gsisnum"=>$row['gsis_num'],"tin"=>$row['tin'],"philhealthnum"=>$row['philhealth_num'],"pagibignum"=>$row['pagibig_num'],
    "slastname"=>$row['spouse_last_name'],"sfirstname"=>$row['spouse_first_name'],"smiddlename"=>$row['spouse_middle_name'],
    "flastname"=>$row['father_last_name'],"ffirstname"=>$row['father_first_name'],"fmiddlename"=>$row['father_middle_name'],
    "mlastname"=>$row['mother_last_name'],"mfirstname"=>$row['mother_first_name'],"mmiddlename"=>$row['mother_middle_name']);
    array_push($esearchresult,$temp);
}

//echo strtotime("$esearchresult[0]['birthdate']");

//echo date_format($esearchresult[0]['birthdate'],"m/d/Y");

echo json_encode($esearchresult);

?> 
