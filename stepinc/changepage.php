<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$page=$_GET['page'];
$offset=20 *($page-1);

$personnel = $db->query("SELECT emp_id,CONCAT(last_name,', ',first_name) AS full_name,position.position_shortname,step_inc, DATE_ADD(lastpromo_date, INTERVAL (step_inc*3) YEAR) AS scheduled_step, lastpromo_date
from personnel
INNER JOIN position on personnel.position_id = position.position_id
WHERE step_inc<8 AND DATE_ADD(lastpromo_date, INTERVAL (step_inc*3) YEAR) < DATE_ADD(CURDATE(), INTERVAL 7 DAY)
ORDER BY scheduled_step ASC
LIMIT 20
OFFSET $offset");

$htmlContent = '<table align="center" class="table-condensed table-bordered table-striped text-center "><thead>
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

$htmlContent .='</tbody></table>';
echo $htmlContent;

?> 