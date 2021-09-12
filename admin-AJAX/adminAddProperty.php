<?php 
session_start();
include('indexDB.php');

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST['done'])){

		$uid = $_POST['uid'];
		$loc = $_POST["loc"];
		$city = $_POST['city'];
		$desc = $_POST['desc'];
		$amen = $_POST['amen'];
		$area = $_POST['area'];
		$img1 = $_POST['img1'];
		$img2 = $_POST['img2'];
		$img3 = $_POST['img3'];
		$img4 = $_POST['img4'];
		$rate = $_POST['rate'];
		$q1="insert into flat(location,uid,city,description,amenities,area,image,image1,image2,image3) values('$loc','$uid','$city','$desc','$amen',$area,'$img1','$img2','$img3','$img4')";

		$query = $conn->query($q1);

		$q3="select flat_id from flat where location='$loc' and city='$city' and area=$area and amenities='$amen'";
    	$r3=$conn->query($q3);
    	$x=mysqli_fetch_array($r3, MYSQLI_ASSOC);
    	$test=$x['flat_id'];
    	echo "flat id fetched is ".$test;
    	$cost=$rate*$area;
		$q2="insert into sale(flat_id,totalcost,rate) values($test,$cost,$rate)";
		echo $q2;
    	$result2 = $conn->query($q2);
    	echo "Sale inserted";
    	#header('Location: admin.php');
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
					<h1 class = "text-white text-center">Insert Property</h1>
				</div>

				<form id="form" method="post" action="adminAddProperty.php" > 

					<label>User ID: </label>
					<input type="text" name="uid" id="uid" class="form-control>">

					<label>Location </label>
					<input type="text" name="loc" id="loc" class="form-control">

					<label>City: </label>
					<input type="text" name="city" id="city" class="form-control>">

					<label>Description: </label>
					<input type="text" name="desc" id="desc" class="form-control>">	

					<label>Amenities: </label>
					<input type="text" name="amen" id="amen" class="form-control>">				

					<label>Area: </label>
					<input type="text" name="area" id="area" class="form-control">

					<label>Rate: </label>
					<input type="text" name="rate" id="rate" class="form-control">					

					<label>Img1: </label>
					<input type="text" name="img1" id="img1" class="form-control>">

					<label>Img2: </label>
					<input type="text" name="img2" id="img2" class="form-control>">

					<label>Img3: </label>
					<input type="text" name="img3" id="img3" class="form-control>">

					<label>Img4: </label>
					<input type="text" name="img4" id="img4" class="form-control>">

				

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