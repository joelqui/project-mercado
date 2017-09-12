<?php
header("Content-Type: text/javascript; charset=utf-8");
//require_once '../connect.php';
$db = new PDO('mysql:host=127.0.0.1;dbname=deped_southern_leyte','root','');

$lastname=strtoupper($_POST['lastname']);
$firstname=strtoupper($_POST['firstname']);
$username=$_POST['username'];
$password=$_POST['password'];
$deptcode=$_POST['deptcode'];
$usertype=$_POST['usertype']; 

$userstatus=1;
$status=0;


$user = $db->query("SELECT * FROM users WHERE username='$username'");


    if ($user->fetchColumn() > 0) {
    $userstatus=0; 
    }


if(empty($lastname))
    {
  
    $status=2; 
    }
else if (empty($firstname))
    $status=3;
else if (empty($username) || empty($userstatus))
    $status=4;
else if (empty($password) || strlen($password)<=6)
    $status=5;
else if (empty($deptcode))
    $status=6; 
else if (empty($usertype))
    $status=7;
else {
        $user = $db->prepare("
                INSERT INTO users(last_name,first_name,username,password,usertype,dept_id)
                VALUES (:lastname, :firstname, :username, :password, :usertype, :dept_id)
                ");

        if($user->execute([
            'lastname'=>$lastname,
            'firstname'=>$firstname,
            'username'=>$username,
            'password'=>$password,
            'usertype'=>$usertype,
            'dept_id'=>$deptcode
        ]))
        $status=1; 
        else
        {
        $status=0 ;
        }
}

echo $status;





/*
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
}*/


?> 