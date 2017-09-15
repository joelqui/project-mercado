<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$esearch = $_GET['id'];

$user = $db->query("SELECT last_name,first_name,middle_name,date_of_birth,tin,sex
FROM personnel WHERE personnel_id=$esearch");

while ($row = $user->fetch_assoc()){
    echo '<div>EMPLOYEE NUMBER:</div>';
    echo '<div>LAST NAME: &nbsp;<strong>'.$row['last_name'].'</strong></div>';
    echo '<div>FIRST NAME: &nbsp;<strong>'.$row['first_name'].'</strong></div>';
    echo '<div>MIDDLE NAME:&nbsp;<strong>'.$row['middle_name'].'</strong></div>';
    echo '<div>GENDER:&nbsp;<strong>'.$row['sex'].'</strong></div>';
    echo '<div>BIRTHDATE:&nbsp;<strong>'.$row['date_of_birth'].'</strong></div>';
    echo '<div>BIRTHPLACE:&nbsp;</div>';
    echo '<div>TAX IDENTIFICATION NUMBER:&nbsp;<strong>'.$row['tin'].'</strong></div>';
    echo '<div>MONTHLY SALARY:&nbsp;</div>';
    echo '<div>POSITION:&nbsp;</div>';
    echo '<div>SALARY GRADE:&nbsp;</div>';
    echo '<div>STEP INCREMENT:&nbsp;</div>';
    echo '<div>ITEM NUMBER:&nbsp;</div>';
    echo '<div>ELIGIBILITY:&nbsp;</div>';
    echo '<div>ACTUAL STATION:&nbsp;</div>';
    echo '<div>RPSU STATION:&nbsp;</div>';
}

?> 
