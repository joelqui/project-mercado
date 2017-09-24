<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';



$page=$_GET['page'];
$offset=20 *($page-1);

$pagerangeStart = ((floor(($page-1)/5))*5)+1;
$pageStart=$pagerangeStart;


$gettotal = $db->query("SELECT COUNT(*) AS totalfound from personnel WHERE (YEAR(CURDATE()) - YEAR(date_of_birth)) > 59");
$total=$gettotal->fetch_assoc()['totalfound'];
$totalpages=ceil($total/20).' ';



$personnel = $db->query("
SELECT personnel.personnel_id,CONCAT(last_name,', ',first_name) AS full_name,position.position_code,date_of_birth, 
FLOOR(DATEDIFF (NOW(), regular.original_appointment)/365) AS years, FLOOR(DATEDIFF (NOW(), date_of_birth)/365) AS age, 
CASE WHEN (YEAR(CURDATE())-YEAR(date_of_birth) > 64) 
THEN 'MANDATORY' ELSE 'OPTIONAL' 
END AS retirement_type FROM personnel 
INNER JOIN regular ON personnel.personnel_id = regular.personnel_id 
INNER JOIN position on regular.position_id = position.position_id 
WHERE (YEAR(CURDATE()) - YEAR(date_of_birth)) > 59 
ORDER BY retirement_type ASC, MONTH(date_of_birth),DAY(date_of_birth)
LIMIT 20
OFFSET $offset");

$htmlContent = '<table align="center" class="table-condensed table-bordered table-striped text-center "><thead><tr><th>#</th><th>Full Name</th><th>Position</th>';
$htmlContent .= '<th>School</th><th>Date of<br>Birth</th><th>Age</th><th>Retirement<br>Type</th><th>Years in<br>Service</th></tr></thead><tbody>';

$itemNo=(($page-1)*20)+1;

while ($row = $personnel->fetch_assoc()){

$htmlContent .= '<tr><td>';
$htmlContent .= $itemNo;
$htmlContent .= '</td><td>';
$htmlContent .= $row['full_name'];
$htmlContent .= '</td><td>';
$htmlContent .= $row['position_code'];
$htmlContent .= '</td><td>';
$htmlContent .= ' - -';
$htmlContent .= '</td><td>';
$htmlContent .= $row['date_of_birth'];
$htmlContent .= '</td><td>';
$htmlContent .= $row['age'];
$htmlContent .= '</td><td>';
$htmlContent .= $row['retirement_type'];
$htmlContent .= '</td><td>';
$htmlContent .= $row['years'];
$htmlContent .= '</td></tr>';

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