<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$rpsuID = $_GET['rpsu'];
$personnelID = $_GET['psipop'];

$sql = "INSERT INTO request (rpsu_id, personnel_id)
VALUES ($rpsuID, $personnelID)";

if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$db->close();
?>




