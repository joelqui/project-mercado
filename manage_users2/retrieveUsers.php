<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';


$page=$_GET['page'];
$offset=10 *($page-1);

$pagerangeStart = ((floor(($page-1)/5))*5)+1;
$pageStart=$pagerangeStart;


$gettotal = $db->query("SELECT COUNT(*) AS totalfound from users");
$total=$gettotal->fetch_assoc()['totalfound'];
$totalpages=ceil($total/10).' ';



$user = $db->query("
SELECT user_id, CONCAT(first_name,' ',last_name) AS full_name, username, usertype.usertype, department.dept_code FROM users 
LEFT JOIN department on users.dept_id = department.dept_id 
LEFT JOIN usertype on users.usertype=usertype.usertype_id
LIMIT 10
OFFSET $offset");

$htmlContent = '<table align="center" class="table-condensed table-bordered table-striped text-center "><thead><tr><th>#</th><th>Full Name</th><th>Position</th>';
$htmlContent .= '<th>School</th><th>Date of<br>Birth</th><th>Age</th><th>Retirement<br>Type</th><th>Years in<br>Service</th></tr></thead><tbody>';

$htmlContent = '<table class="table-bordered table-striped table-condensed col-xs-12"><thead><tr>';
$htmlContent .= '<th style="width:5%" class="text-center">USER_ID</th>';
$htmlContent .= '<th style="width:15%" class="text-center">DEPT_CODE</th>';
$htmlContent .= '<th style="width:40%" class="text-center">NAME</th>';
$htmlContent .= '<th style="width:20%"class="text-center">USERNAME</th>';
$htmlContent .= '<th style="width:15%"class="text-center">USERTYPE<br></th>';
$htmlContent .= '<th style="width:5%"class="text-center">CHANGE<br>PASSWORD</th>';
$htmlContent .= '</tr></thead><tbody>';

$itemNo=(($page-1)*10)+1;


while ($row = $user->fetch_assoc()){

$htmlContent .= '<tr><td  class="text-center">';
$htmlContent .= $row['user_id'];
$htmlContent .= '</td><td>';
$htmlContent .= $row['dept_code'];
$htmlContent .= '</td><td>';
$htmlContent .= $row['full_name'];
$htmlContent .= '</td><td>';
$htmlContent .= $row['username'];
$htmlContent .= '</td><td>';
$htmlContent .= $row['usertype'];
$htmlContent .= '</td><td class="text-center"><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#changePassword" value="';
$htmlContent .= $row['user_id'];
$htmlContent .= '"><span class="glyphicon glyphicon-edit"></span></button></td></tr>';


$itemNo++;   
}

$htmlContent .='</tbody></table>';
//echo $htmlContent;


$htmlContent .= '<div id="pageHolder"><ul class="pagination">';

//condition for pages after page 5
if ($page>5) {
    $htmlContent .= '<li><a class="page" href="#" id="1"><<</a></li>';
    $htmlContent .= '<li><a class="page" href="#" id="';
    $htmlContent .= $pagerangeStart-1;
    $htmlContent .= '"><</a></li>';
}

for($i=0;$i<5;$i++){

    if($pagerangeStart>$totalpages)
       break;

    $htmlContent .= '<li><a class="page" href="#" id="';
    $htmlContent .= $pagerangeStart;
    $htmlContent .= '">';
    $htmlContent .= $pagerangeStart++;
    $htmlContent .= '</a></li>';

}

//condition for pages befor the last page
if (floor(($page-1)/5) != floor($totalpages/5)) {
    $htmlContent .= '<li><a class="page" href="#" id="';
    $htmlContent .= $pageStart+5;
    $htmlContent .= '">>></a></li>';
    
    $htmlContent .= '<li><a class="page" href="#" id="';
    $htmlContent .= $totalpages;
    $htmlContent .= '">></a></li>';
}

$htmlContent .= '</ul></div>';


echo $htmlContent;

?> 