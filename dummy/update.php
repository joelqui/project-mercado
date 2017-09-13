<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once '../connect.php';

$rpsuID = $_GET['rpsu'];

$sql = "UPDATE rpsu_personnel SET requested='1' WHERE rpsu_id=$rpsuID";

if ($db->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$db->close();
?>

