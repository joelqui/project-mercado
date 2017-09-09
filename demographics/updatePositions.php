<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$positionArray = array();
$positionDetails = array();

$position = $db->query("SELECT position_id FROM position");

while ($row = $position->fetch_assoc()){
    array_push($positionArray,$row['position_id']);   
}

foreach($positionArray as $pos_id){
    $position = $db->query("SELECT 
    COUNT(*) total,
    SUM(CASE WHEN gender = 1 THEN 1 ELSE 0 END) male,
    SUM(CASE WHEN gender = 2 THEN 1 ELSE 0 END) female
    FROM personnel
    WHERE position_id = $pos_id");

    while ($row = $position->fetch_assoc()){
        $male=$row['male'];
        $female=$row['female'];
        $total=$row['total'];
        //array_push($positionDetails,$temp);   
    }   
 //   $db->close();
    echo $male.'<br>';
    echo $female.'<br>';
    echo $total.'<br>';

    $sql = "UPDATE position SET position_male=$male,position_female=$female,position_totalslots=$total WHERE position_id=$pos_id";

    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $db->error;
    }
 //   $db->close();  

}

/*
var_dump($positionDetails);   
echo $htmlContent;

$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

if ($db->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();


 $query = "UPDATE employment_info
                               SET employment_status={$empstatus}
                               WHERE employment_info.personnel_id = $p_id";
                      $result = mysqli_query($connection,$query);
                    if(!$result){
                          die("Database query failed.");
                            }
                     else{
                     ?>

echo $htmlContent;  */

?> 