<?php 
	include('indexDB.php');
	session_start();

	$id = $_GET["fid"];

	$sql = "DELETE FROM `flat` WHERE `flat`.`flat_id` = $id";

	if ($conn->query($sql) === TRUE) {
	  echo "Record deleted successfully";
	} else {
	  echo "Error deleting record: " . $conn->error;
	}

	header('Location: normalHomeSale.php');

 ?>