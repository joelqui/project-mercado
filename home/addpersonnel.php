<?php

ini_set('display_errors','On');

$db = new PDO('mysql:host=127.0.0.1;dbname=deped_southernleyte','root','');

//$lastname=$_POST['lastName'];
//$miname=$_POST['age'];
//echo $lastname;
//echo $miname;
$lastname=strtoupper($_POST['lastName']);
$firstname=strtoupper($_POST['firstName']);
$middlename=strtoupper($_POST['middleName']);
$suffix=$_POST['suffix'];
$gender=$_POST['gender'];
$civilstatus=$_POST['civilStatus']; 


$maidenname=strtoupper($_POST['maidenName']);
$tin=$_POST['tin'];
$birthdate=$_POST['birthDate'];
$birthplace=strtoupper($_POST['birthPlace']);
$empstatus=$_POST['empStatus'];

$user = $db->prepare("
        INSERT INTO employee(last_name,first_name,middle_name,suffix,gender,civil_status,maiden_name,tin,birthdate,birthplace,emp_status)
        VALUES (:lastname, :firstname, :middlename, :suffix, :gender, :civilstatus, :maidenname, :tin, :birthdate, :birthplace, :empstatus)
        ");

if($user->execute([
    'lastname'=>$lastname,
    'firstname'=>$firstname,
    'middlename'=>$middlename,
    'suffix'=>$suffix,
    'gender'=>$gender,
    'civilstatus'=>$civilstatus,
    'maidenname'=>$maidenname,
    'tin'=>$tin,
    'birthdate'=>$birthdate,
    'birthplace'=>$birthplace,
    'empstatus'=>$empstatus
]))
echo "Pussy Is Good";
else
{
    echo"pussy is Bad!";
}
?> 