<?php
    include('indexDB.php');
    session_start();
    $n=$_POST['name'];
    $c=$_POST['cno'];
    $e=$_POST['email'];
    $q="insert into packers_movers(name_org,contact_no,email_id) values('$n',$c,'$e')";
    $result = $conn->query($q);
    header('Location: PackersAndMovers.php');
?>