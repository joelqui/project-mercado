<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';



$page=$_GET['page'];
$offset=20 *($page-1);

$pagerangeStart = ((floor(($page-1)/5))*5)+1;
$pageStart=$pagerangeStart;


$gettotal = $db->query("SELECT COUNT(*) AS totalfound from personnel 
INNER JOIN regular ON personnel.personnel_id = regular.personnel_id
WHERE ((YEAR(DATE_ADD(regular.original_appointment, INTERVAL 10 YEAR)) = YEAR(CURDATE())) AND
(DATE_ADD(regular.original_appointment, INTERVAL 10 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)))) OR
((YEAR(DATE_ADD(regular.original_appointment, INTERVAL 15 YEAR)) = YEAR(CURDATE())) AND
(DATE_ADD(regular.original_appointment, INTERVAL 15 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)))) OR
((YEAR(DATE_ADD(regular.original_appointment, INTERVAL 20 YEAR)) = YEAR(CURDATE())) AND
(DATE_ADD(regular.original_appointment, INTERVAL 20 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)))) OR
((YEAR(DATE_ADD(regular.original_appointment, INTERVAL 25 YEAR)) = YEAR(CURDATE())) AND
(DATE_ADD(regular.original_appointment, INTERVAL 25 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)))) OR
((YEAR(DATE_ADD(regular.original_appointment, INTERVAL 30 YEAR)) = YEAR(CURDATE())) AND
(DATE_ADD(regular.original_appointment, INTERVAL 30 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)))) OR
((YEAR(DATE_ADD(regular.original_appointment, INTERVAL 35 YEAR)) = YEAR(CURDATE())) AND
(DATE_ADD(regular.original_appointment, INTERVAL 35 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)))) OR
((YEAR(DATE_ADD(regular.original_appointment, INTERVAL 40 YEAR)) = YEAR(CURDATE())) AND
(DATE_ADD(regular.original_appointment, INTERVAL 40 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH))))");
$total=$gettotal->fetch_assoc()['totalfound'];
$totalpages=ceil($total/20).' ';



$personnel = $db->query("
SELECT personnel.personnel_id,CONCAT(last_name,', ',first_name) AS full_name,position.position_code,YEAR(CURDATE())-YEAR(regular.original_appointment) AS years,regular.original_appointment,
    CASE    
        WHEN YEAR(DATE_ADD(regular.original_appointment, INTERVAL 10 YEAR)) = YEAR(CURDATE()) AND 
             DATE_ADD(regular.original_appointment, INTERVAL 10 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)) THEN DATE_ADD(regular.original_appointment, INTERVAL 10 YEAR)
        WHEN YEAR(DATE_ADD(regular.original_appointment, INTERVAL 15 YEAR)) = YEAR(CURDATE()) AND 
             DATE_ADD(regular.original_appointment, INTERVAL 15 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)) THEN DATE_ADD(regular.original_appointment, INTERVAL 15 YEAR)
        WHEN YEAR(DATE_ADD(regular.original_appointment, INTERVAL 20 YEAR)) = YEAR(CURDATE()) AND 
             DATE_ADD(regular.original_appointment, INTERVAL 20 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)) THEN DATE_ADD(regular.original_appointment, INTERVAL 20 YEAR)
        WHEN YEAR(DATE_ADD(regular.original_appointment, INTERVAL 25 YEAR)) = YEAR(CURDATE()) AND 
             DATE_ADD(regular.original_appointment, INTERVAL 25 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)) THEN DATE_ADD(regular.original_appointment, INTERVAL 25 YEAR)
        WHEN YEAR(DATE_ADD(regular.original_appointment, INTERVAL 30 YEAR)) = YEAR(CURDATE()) AND 
             DATE_ADD(regular.original_appointment, INTERVAL 30 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)) THEN DATE_ADD(regular.original_appointment, INTERVAL 30 YEAR)
        WHEN YEAR(DATE_ADD(regular.original_appointment, INTERVAL 35 YEAR)) = YEAR(CURDATE()) AND 
             DATE_ADD(regular.original_appointment, INTERVAL 35 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)) THEN DATE_ADD(regular.original_appointment, INTERVAL 35 YEAR)
        WHEN YEAR(DATE_ADD(regular.original_appointment, INTERVAL 40 YEAR)) = YEAR(CURDATE()) AND 
             DATE_ADD(regular.original_appointment, INTERVAL 40 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)) THEN DATE_ADD(regular.original_appointment, INTERVAL 40 YEAR)
    END AS status
FROM personnel
INNER JOIN regular ON personnel.personnel_id = regular.personnel_id
INNER JOIN position on regular.position_id = position.position_id
WHERE ((YEAR(DATE_ADD(regular.original_appointment, INTERVAL 10 YEAR)) = YEAR(CURDATE())) AND
(DATE_ADD(regular.original_appointment, INTERVAL 10 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)))) OR
((YEAR(DATE_ADD(regular.original_appointment, INTERVAL 15 YEAR)) = YEAR(CURDATE())) AND
(DATE_ADD(regular.original_appointment, INTERVAL 15 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)))) OR
((YEAR(DATE_ADD(regular.original_appointment, INTERVAL 20 YEAR)) = YEAR(CURDATE())) AND
(DATE_ADD(regular.original_appointment, INTERVAL 20 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)))) OR
((YEAR(DATE_ADD(regular.original_appointment, INTERVAL 25 YEAR)) = YEAR(CURDATE())) AND
(DATE_ADD(regular.original_appointment, INTERVAL 25 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)))) OR
((YEAR(DATE_ADD(regular.original_appointment, INTERVAL 30 YEAR)) = YEAR(CURDATE())) AND
(DATE_ADD(regular.original_appointment, INTERVAL 30 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)))) OR
((YEAR(DATE_ADD(regular.original_appointment, INTERVAL 35 YEAR)) = YEAR(CURDATE())) AND
(DATE_ADD(regular.original_appointment, INTERVAL 35 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)))) OR
((YEAR(DATE_ADD(regular.original_appointment, INTERVAL 40 YEAR)) = YEAR(CURDATE())) AND
(DATE_ADD(regular.original_appointment, INTERVAL 40 YEAR) < LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH))))
ORDER BY status ASC
LIMIT 20
OFFSET $offset");

$htmlContent = '<table align="center" class="table-condensed table-bordered table-striped text-center ">';
$htmlContent .= '<thead><tr><th>#</th><th>Full Name</th><th>Position</th><th>School</th><th>No. of <br>Ye';
$htmlContent .= 'ars in Service</th><th>Schedule to<br>receive Loyalty Pay</th><th>Original<br>Appointment ';
$htmlContent .= 'Date</th></tr></thead><tbody>';

$itemNo=(($page-1)*20)+1;

while ($row = $personnel->fetch_assoc()){

$htmlContent .= '<tr><td>';
$htmlContent .= $itemNo;
$htmlContent .= '.</td><td>';
$htmlContent .= $row['full_name'];
$htmlContent .= '</td><td>';
$htmlContent .= $row['position_code'];
$htmlContent .= '</td><td>';
$htmlContent .= ' --';
$htmlContent .= '</td><td>';
$htmlContent .= $row['years'];
$htmlContent .= '</td><td>';
$htmlContent .= $row['status'];
$htmlContent .= '</td><td>';
$htmlContent .= $row['original_appointment'];
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