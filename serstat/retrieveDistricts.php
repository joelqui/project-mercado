<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$district = $db->query("SELECT * FROM district");
$htmlContent = "";
while ($row = $district->fetch_assoc()){

 /*   $htmlContent .= '<option value="';
    $htmlContent .= $row['district_id'];
    $htmlContent .= '">';
    $htmlContent .= $row['district_name'];
    $htmlContent .= '</option>';   */

    $htmlContent .= '<div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title">';
    $htmlContent .= '<a href="#';
    $htmlContent .= $row['district_id'];
    $htmlContent .= '" data-toggle="collapse" data-parent="#districtAccordion">';
    $htmlContent .= $row['district_name'];
    $htmlContent .= '</a><a class="pull-right" href="#fuck">&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open"></span> </a>';
    $htmlContent .= '<a class="pull-right" href="#fuck"><span class="glyphicon glyphicon glyphicon-plus"></span> </a></h4></div>';
    $htmlContent .= '<div class="collapse panel-collapse" id="';
    $htmlContent .= $row['district_id'];
    $htmlContent .= '"><div class="panel-body"><ul class="list-group"></ul></div></div></div>';

}

echo $htmlContent;

?> 