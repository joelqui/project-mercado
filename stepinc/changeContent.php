<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$page=$_GET['page'];
$offset=20 *($page-1);

$pagerangeStart = ((floor(($page-1)/5))*5)+1;
$pageStart=$pagerangeStart;
$htmlContent = "";

$gettotal = $db->query("SELECT COUNT(*) AS totalfound from personnel 
INNER JOIN regular on personnel.personnel_id = regular.personnel_id
WHERE regular.step_increment<8 AND DATE_ADD(regular.last_promo_date, INTERVAL (regular.step_increment*3) YEAR) < DATE_ADD(CURDATE(), INTERVAL 7 DAY)");
$total=$gettotal->fetch_assoc()['totalfound'];
$totalpages=ceil($total/20).' ';



$personnel = $db->query("SELECT personnel.personnel_id,CONCAT(last_name,', ',first_name) AS full_name,position.position_code,regular.step_increment, DATE_ADD(regular.last_promo_date, INTERVAL (regular.step_increment*3) YEAR) AS scheduled_step, regular.last_promo_date
from personnel
INNER JOIN regular ON personnel.personnel_id = regular.personnel_id
INNER JOIN position ON regular.position_id = position.position_id
WHERE regular.step_increment<8 AND DATE_ADD(regular.last_promo_date, INTERVAL (regular.step_increment*3) YEAR) < DATE_ADD(CURDATE(), INTERVAL 7 DAY)
ORDER BY scheduled_step ASC
LIMIT 20
OFFSET $offset");

$htmlContent = '<table width="100%" align="center" class="table-bordered table-striped text-center "><thead>
<tr><th style="width:5%">#</th><th style="width:30%">Full Name</th><th style="width:10%">Position</th><th style="width:15%">School</th><th style="width:10%">Current<br>Step</th><th style="width:15%">Schedule<br>of Next Step</th>
<th style="width:15%">Date of Last<br>Promotion</th></tr></thead><tbody>';
$itemNo=(($page-1)*20)+1;

while ($row = $personnel->fetch_assoc()){
$htmlContent .='<tr><td>';
$htmlContent .= $itemNo.'.';
$htmlContent .='</td><td>';
$htmlContent .=$row['full_name'];
$htmlContent .='</td><td>';
$htmlContent .=$row['position_code'];
$htmlContent .='</td><td>';
$htmlContent .='- -';
$htmlContent .='</td><td>';
$htmlContent .=$row['step_increment'];
$htmlContent .='</td><td>';
$htmlContent .=$row['scheduled_step'];
$htmlContent .='</td><td>';
$htmlContent .=$row['last_promo_date'];
$htmlContent .='</td></tr>';
$itemNo++;
}
$htmlContent .='</tbody></table> ';
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