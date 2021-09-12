<?php 
session_start();
include('indexDB.php');

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST['done'])){

		$rate = $_POST['rate'];
		$area = $_POST['area'];

		$q1="update flat set area=$area where flat_id=$id";

		if ($conn->query($q1) === TRUE) {
		  echo "Record deleted successfully";
		} else {
		  echo "Error deleting record: " . $conn->error;
		}

    	$cost=$rate*$area;
		
		$q2="UPDATE `sale` SET `totalcost` = '$cost', `rate` = '$rate' WHERE `sale`.`flat_id`=$id";

		if ($conn->query($q2) === TRUE) {
		  echo "Record deleted successfully";
		} else {
		  echo "Error deleting record: " . $conn->error;
		}

	}


	$sql = "SELECT flat_id, totalcost, rate FROM sale";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
	    echo "id: " . $row["flat_id"]. " - Total Cost: " . $row["totalcost"]. " Rate: " . $row["rate"]. "<br>";
	  }
	} else {
	  echo "0 results";
	}
	header('Location: admin.php');
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
	<p id = ></p>
	<div class = "col-lg-6 m-auto">

		<form method = "post">
			
			<br><br><div class = "card">
				
				<div class = "card-header bg-dark">
					<h1 class = "text-white text-center">Insert Property</h1>
				</div>

				<form id="form" method="post" action="adminUpdateData.php" > 

					<?php

					$q = "select * from flat where flat_id = $id ";
					$query = mysqli_query($conn,$q);
					while($res = mysqli_fetch_array($query)){

				?>

					<label>Area: </label>
					<input type="text" name="area" id="area" class="form-control" value = "<?php echo $res['area'];  ?>">

					<label>Rate: </label>
					<input type="text" name="rate" id="rate" class="form-control" >

				<?php } ?>				

				<!--

					<label>Username: </label>
					<input type="text" name="uname" id="uname" class="form-control">

					<label>Password: </label>
					<input type="text" name="pass" id="pass" class="form-control">

					<label>Name: </label>
					<input type="text" name="n" id="n" class="form-control">

					<label>Surname: </label>
					<input type="text" name="sn" id="sn" class="form-control">

					<label>Email: </label>
					<input type="text" name="mail" id="mail" class="form-control">

					<label>Ph no: </label>
					<input type="text" name="phno" id="phno" class="form-control"> -->

					<br>


					<button class="btn btn-success" type="submit" name="done"> Submit</button>
				</form>

			</div>

		</form>
		
	</div>
</body>
</html>