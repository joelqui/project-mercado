<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$page=$_GET['pagerange'];
$offset=20 *($page-1);
$pagerangeStart = ((floor(($page-1)/5))*5)+1;
$pageStart=$pagerangeStart;
$htmlContent = "";

$gettotal = $db->query("SELECT COUNT(*) AS totalfound from personnel WHERE step_inc<8 AND DATE_ADD(lastpromo_date, INTERVAL (step_inc*3) YEAR) < DATE_ADD(CURDATE(), INTERVAL 7 DAY)");
$total=$gettotal->fetch_assoc()['totalfound'];

$totalpages=ceil($total/20).' ';
//condition for pages after page 5
if ($page>5) {
    $htmlContent .= '<li><a href="#" id="p1" data-id="1"><<</a></li>';
    $htmlContent .= '<li><a href="#" id="p';
    $htmlContent .= $pagerangeStart-5;
    $htmlContent .= '" data-id="';
    $htmlContent .=  $pagerangeStart-5;
    $htmlContent .= '"><</a></li>';
}

for($i=0;$i<5;$i++){

    if($pagerangeStart>$totalpages)
       break;

    $htmlContent .= '<li><a href="#" id="p';
    $htmlContent .= $pagerangeStart;
    $htmlContent .= '" data-id="';
    $htmlContent .= $pagerangeStart;
    $htmlContent .= '">';
    $htmlContent .= $pagerangeStart++;
    $htmlContent .= '</a></li>';

}

//condition for pages befor the last page
if (floor($page/5) != floor($totalpages/5)) {
    $htmlContent .= '<li><a href="#" id="p';
    $htmlContent .= $pageStart+5;
    $htmlContent .= '" data-id="';
    $htmlContent .= $pageStart+5;
    $htmlContent .= '">>></a></li>';
    
    $htmlContent .= '<li><a href="#" id="p';
    $htmlContent .= $totalpages;
    $htmlContent .= '" data-id="';
    $htmlContent .= $totalpages;
    $htmlContent .= '">></a></li>';
}

echo $htmlContent;

?> 