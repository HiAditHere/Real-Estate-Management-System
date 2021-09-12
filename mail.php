<?php
session_start();
include('indexDB.php');

$k = $_SESSION['id'];
$fid = $_SESSION['flat_id'];

$sql1 = "SELECT * FROM login WHERE UID=$k";
$result = $conn->query($sql1);
$row = mysqli_fetch_assoc($result);

$sql2 = "SELECT * FROM flat WHERE flat_id=$fid";
$result2 = $conn->query($sql2);
$row2 = mysqli_fetch_assoc($result2);

$sql3 = "SELECT * FROM sale WHERE flat_id=$fid";
$result3 = $conn->query($sql3);
$row3 = mysqli_fetch_assoc($result3);

$mail = $row['email'];

$id = $row2['fid'];
$loc = $row2['location'];
$city = $row2['city'];
$des = $row2['description'];
$amen = $row2['amenities'];
$area = $row2['area'];
$rate = $row3['rate'];
$tc = $row3['totalcost'];

$to_email = $mail;
$subject = "Flat Purchase";
$body = "Hi, This is a reciept for your house purchase \n House id:". $row2['flat_id'] ." \nLocation : ".$row2['location'] ." \nCity: ".$row2['city']."  \nDescription:". $row2['description'] ." \n Amenities: ".$row2['amenities']." \n Area : ".$row2['area']." \n Rate: ".$row3['rate'] ."\n Totalcost: ".$row3['totalcost'];
$headers = "From: noreply@housing-co.org";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}

header('location: normalHomeSale.php');

?>