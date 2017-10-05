<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$pID = $_GET['id'];
$lastName = strtoupper($_GET['lname']);
$firstName = strtoupper($_GET['fname']);
$middleName = strtoupper($_GET['mname']);
$suffix = strtoupper($_GET['suffix']);

$birthdate = $_GET['birthdate'];
$birthplace = strtoupper($_GET['birthplace']);
$sex = $_GET['sex'];
$civilstatus = $_GET['civilstatus'];

$email = $_GET['email'];
$celno = $_GET['celno'];
$telno = $_GET['telno'];
$height = $_GET['height'];
$weight = $_GET['weight'];
$bloodtype = $_GET['bloodtype'];

$region = $_GET['region'];
$province = $_GET['province'];
$municipality = $_GET['municipality'];
$barangay = $_GET['barangay'];
$zipcode = $_GET['zipcode'];

$empnum = $_GET['empnum'];
$tin = $_GET['tin'];
$sssnum = $_GET['sssnum'];
$gsisnum = $_GET['gsisnum'];
$pagibignum = $_GET['pagibignum'];
$philhealthnum = $_GET['philhealthnum'];

$slastname = strtoupper($_GET['slastname']);
$sfirstname = strtoupper($_GET['sfirstname']);
$smiddlename = strtoupper($_GET['smiddlename']);

$flastname = strtoupper($_GET['flastname']);
$ffirstname = strtoupper($_GET['ffirstname']);
$fmiddlename = strtoupper($_GET['fmiddlename']);

$mlastname = strtoupper($_GET['mlastname']);
$mfirstname = strtoupper($_GET['mfirstname']);
$mmiddlename = strtoupper($_GET['mmiddlename']);

$status = 0;

$sql="UPDATE `personnel` SET `last_name`='{$lastName}',`first_name`='{$firstName}', `middle_name`='{$middleName}', `suffix`='{$suffix}',
`date_of_birth`='{$birthdate}',`place_of_birth`='{$birthplace}', `sex`='{$sex}', `civil_status`='{$civilstatus}',
`email_address`='{$email}',`cel_num`='{$celno}', `tel_num`='{$telno}', `height`='{$height}', `weight`='{$weight}', `blood_type`='{$bloodtype}',
`region_code`='{$region}',`province_code`='{$province}' ,`barangay_code`='{$barangay}', `municipality_code`='{$municipality}', `zipcode`='{$zipcode}',
`tin`='{$tin}', `sss_num`='{$sssnum}', `gsis_num`='{$gsisnum}', `pagibig_num`='{$pagibignum}', `philhealth_num`='{$philhealthnum}',
`spouse_last_name`='{$slastname}',`spouse_first_name`='{$sfirstname}' ,`spouse_middle_name`='{$smiddlename}',
`father_last_name`='{$flastname}',`father_first_name`='{$ffirstname}' ,`father_middle_name`='{$fmiddlename}',
`mother_last_name`='{$mlastname}',`mother_first_name`='{$mfirstname}' ,`mother_middle_name`='{$mmiddlename}'
WHERE `personnel`.`personnel_id` = {$pID}";

if ($db->query($sql) === TRUE) {
    $status++;
} 

$sql="UPDATE `regular` SET `rpsu_num`='{$empnum}'
WHERE `personnel_id` = {$pID}";

if ($db->query($sql) === TRUE) {
    $status++;
} 

$db->close();

echo $status;

?> 
