<?php 
session_start();
include('indexDB.php');

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST['done'])){

		#$fid = $_POST['id'];
		$username = $_POST["uname"];
		$password = $_POST['pass'];
		$name = $_POST['n'];
		$sname = $_POST['sn'];
		#$img = $_POST['img'];
		$email = $_POST['mail'];
		$phno = $_POST['phno'];
		
		$sql = "UPDATE `login` SET `username` = '$username' WHERE `login`.`UID` = '$id'";
		$q = $conn->query($sql);
		$sql = "UPDATE `login` SET `password` = '$password' WHERE `login`.`UID` = '$id'";
		$q = $conn->query($sql);
		$sql = "UPDATE `login` SET `name` = '$name' WHERE `login`.`UID` = '$id'";
		$q = $conn->query($sql);
		$sql = "UPDATE `login` SET `surname` = '$sname' WHERE `login`.`UID` = '$id'";
		$q = $conn->query($sql);
		$sql = "UPDATE `login` SET `email` = '$email' WHERE `login`.`UID` = '$id'";
		$q = $conn->query($sql);
		$sql = "UPDATE `login` SET `phone` = '$phno' WHERE `login`.`UID` = '$id'";
		$q = $conn->query($sql);

		if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}


		#header('Location: admin.php');#If code stops working , comment this out
	}

	/*
	$sql = "SELECT flat_id, totalcost, rate FROM sale";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
	    echo "id: " . $row["flat_id"]. " - Total Cost: " . $row["totalcost"]. " Rate: " . $row["rate"]. "<br>";
	  }
	} else {
	  echo "0 results";
	}*/

	$sql1 = "SELECT * FROM login WHERE UID=1";
	$result = $conn->query($sql1);
	$row = $result->fetch_assoc();
	echo($row["username"]);

	header('Location: adminUserView.php');

}

 ?>

 <!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class = "col-lg-6 m-auto">

		<form method = "post">
			
			<br><br><div class = "card">
				
				<div class = "card-header bg-dark">
					<h1 class = "text-white text-center">Update User-Data</h1>
				</div>

				<form id="form" method="post" action="adminAddUser.php" >
					<!--

					<label>id: </label>
					<input type="text" name="id" id="id" class="form-control"> 

					<label>Location </label>
					<input type="text" name="loc" id="loc" class="form-control">

					<label>City: </label>
					<input type="text" name="city" id="city" class="form-control>">

					<label>Cost: </label>
					<input type="text" name="cost" id="cost" class="form-control">

					<label>Rate: </label>
					<input type="text" name="rate" id="rate" class="form-control">

					
					<label>Image: </label>
					<input type="image" name="img" id="img" class="form-control">
				-->
				<?php

					$q = "select * from login where UID=$id ";
					$query = mysqli_query($conn,$q);
					while($res = mysqli_fetch_array($query)){

				?>

					<label>Username: </label>
					<input type="text" name="uname" id="uname" class="form-control" value = "<?php echo $res['username'];  ?>" >

					<label>Password: </label>
					<input type="text" name="pass" id="pass" class="form-control" value = "<?php echo $res['password'];  ?>">

					<label>Name: </label>
					<input type="text" name="n" id="n" class="form-control" value = "<?php echo $res['name'];  ?>">

					<label>Surname: </label>
					<input type="text" name="sn" id="sn" class="form-control" value = "<?php echo $res['surname'];  ?>">

					<label>Email: </label>
					<input type="text" name="mail" id="mail" class="form-control" value = "<?php echo $res['email'];  ?>">

					<label>Ph no: </label>
					<input type="text" name="phno" id="phno" class="form-control" value = "<?php echo $res['phone'];  ?>">
				<?php 

					}

				 ?>

					<br>


					<button class="btn btn-success" type="submit" name="done"> Submit</button>
				</form>

			</div>

		</form>
		
	</div>
</body>
</html>