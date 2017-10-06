<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$esearch = $_GET['id'];
$htmlContent = '';

$user = $db->query("SELECT dependent_id,dependent_name,dependent_birthdate 
FROM dependent 
WHERE personnel_id = $esearch");

//found at least one child
if($user->num_rows > 0){
    $htmlContent .= '<table align="center" class="table-condensed table-bordered table-striped text-center "><thead>';
    $htmlContent .= '<tr><th style="width:60%">Full Name</th><th style="width:30%">Date of Birth</th>';
    $htmlContent .= '<th style="width:10%">Delete</th></tr></thead><tbody>';

    while ($row = $user->fetch_assoc()){
        $htmlContent .= '<tr data-id="';
        $htmlContent .= $row['dependent_id'];
        $htmlContent .= '"><td>';
        $htmlContent .= $row['dependent_name'];
        $htmlContent .= '</td><td>';
        $htmlContent .= $row['dependent_birthdate'];
        $htmlContent .= '</td><td><button type="button" class="btn btn-primary btn-sm">Remove</button></td></tr>';         
        }   
    $htmlContent .= '</tbody></table>';
}

//found no children at all
else if($user->num_rows == 0) {
    $htmlContent .= '<h4>BAOG SIGURO</h4>';
}

echo $htmlContent;

?> 
