<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once 'connect.php';

$esearch = $_GET['id'];
$esearchresult = array();

$user = $db->query("SELECT serrec_id,start_date,end_date,item_description,
employment_nature,ssalary,station,data1,data2,data3,data4
                        from srecords 
                        WHERE emp_id = $esearch ORDER BY record_sequence ASC");

while ($row = $user->fetch_assoc()){
    echo '<tr><td>',$row['start_date'],'</td>';
    echo '<td>',$row['end_date'],'</td>';
     echo '<td>',$row['item_description'],'</td>';
      echo '<td>',$row['employment_nature'],'</td>';
       echo '<td>',$row['ssalary'],'</td>';
        echo '<td>',$row['station'],'</td>';
         echo '<td>',$row['data1'],'</td>';
          echo '<td>',$row['data2'],'</td>';
           echo '<td>',$row['data3'],'</td>';
 echo '<td>',$row['data4'],'</td></tr>';

}


?> 
