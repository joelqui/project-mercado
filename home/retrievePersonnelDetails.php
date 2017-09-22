<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$esearch = $_GET['id'];

$user = $db->query("SELECT date_of_birth, sex, civil_status, tin, philhealth_num, gsis_num, regular.rpsu_num, regular.step_increment, 
regular.original_appointment, regular.last_promo_date, regular.school_id, position.position_code, plantilla_station.plantilla_station_code
FROM personnel
INNER JOIN regular ON personnel.personnel_id = regular.personnel_id
INNER JOIN position ON position.position_id = regular.position_id
INNER JOIN plantilla_station ON regular.plantilla_station_id = plantilla_station.plantilla_station_id
WHERE personnel.personnel_id=$esearch");

while ($row = $user->fetch_assoc()){
    echo '<div>EMPLOYEE NUMBER:&nbsp;<strong>'.$row['rpsu_num'].'</strong></div>';
    echo '<div>DATE OF BIRTH: &nbsp;<strong>'.$row['date_of_birth'].'</strong></div>';
    echo '<div>GENDER: &nbsp;<strong>'.$row['sex'].'</strong></div>';
    echo '<div>CIVIL STATUS:&nbsp;<strong>'.$row['civil_status'].'</strong></div>';
    echo '<div>TAX IDENTIFICATION NUMBER:&nbsp;<strong>'.$row['tin'].'</strong></div>';
    echo '<div>PHILHEALTH NUMBER:&nbsp;<strong>'.$row['philhealth_num'].'</strong></div>';
    echo '<div>GSIS POLICY NUMBER:&nbsp;<strong>'.$row['gsis_num'].'</strong></div>';
    echo '<div>POSITION:&nbsp;<strong>'.$row['position_code'].'</strong></div>';
    echo '<div>STEP INCREMENT:&nbsp;<strong>'.$row['step_increment'].'</strong></div>';
    echo '<div>ORIGINAL APPOINTMENT:&nbsp;<strong>'.$row['original_appointment'].'</strong></div>';
    echo '<div>LAST PROMO DATE:&nbsp;<strong>'.$row['last_promo_date'].'</strong></div>';
    echo '<div>PLANTILLA STATION:&nbsp;<strong>'.$row['plantilla_station_code'].'</strong></div>';
    echo '<div>SCHOOL ID:&nbsp;<strong>'.$row['school_id'].'</strong></div>';
   
}

?> 
