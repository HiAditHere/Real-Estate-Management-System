<?php

$username = "root";
$password = "";
$database = "housing-co";

$conn = new mysqli("localhost",$username,$password,$database);

if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    } 

$id = $_GET['id'];

$sql = "DELETE FROM `flat` WHERE `flat`.`flat_id` = $id;";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

header('location:admin.php');

?>