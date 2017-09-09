<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$page=$_GET['page'];
$offset=20 *($page-1);

$pagerangeStart = ((floor(($page-1)/5))*5)+1;
$pageStart=$pagerangeStart;
$htmlContent = "";

$gettotal = $db->query("SELECT COUNT(*) AS totalfound from personnel WHERE step_inc<8 AND DATE_ADD(lastpromo_date, INTERVAL (step_inc*3) YEAR) < DATE_ADD(CURDATE(), INTERVAL 7 DAY)");
$total=$gettotal->fetch_assoc()['totalfound'];
$totalpages=ceil($total/20).' ';



$personnel = $db->query("SELECT emp_id,CONCAT(last_name,', ',first_name) AS full_name,position.position_shortname,step_inc, DATE_ADD(lastpromo_date, INTERVAL (step_inc*3) YEAR) AS scheduled_step, lastpromo_date
from personnel
INNER JOIN position on personnel.position_id = position.position_id
WHERE step_inc<8 AND DATE_ADD(lastpromo_date, INTERVAL (step_inc*3) YEAR) < DATE_ADD(CURDATE(), INTERVAL 7 DAY)
ORDER BY scheduled_step ASC
LIMIT 20
OFFSET $offset");

$htmlContent = '<div id="tableContainer"><table align="center" class="table-condensed table-bordered table-striped text-center "><thead>
<tr><th>#</th><th>Full Name</th><th>Position</th><th>School</th><th>Current<br>Step</th><th>Schedule<br>of Next Step</th>
<th>Date of Last<br>Promotion</th></tr></thead><tbody>';
$itemNo=(($page-1)*20)+1;

while ($row = $personnel->fetch_assoc()){
$htmlContent .='<tr><td>';
$htmlContent .= $itemNo.'.';
$htmlContent .='</td><td>';
$htmlContent .=$row['full_name'];
$htmlContent .='</td><td>';
$htmlContent .=$row['position_shortname'];
$htmlContent .='</td><td>';
$htmlContent .='dummy';
$htmlContent .='</td><td>';
$htmlContent .=$row['step_inc'];
$htmlContent .='</td><td>';
$htmlContent .=$row['scheduled_step'];
$htmlContent .='</td><td>';
$htmlContent .=$row['lastpromo_date'];
$htmlContent .='</td></tr>';
$itemNo++;
}
$htmlContent .='</tbody></table> </div>';
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