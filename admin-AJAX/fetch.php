<?php 
	
	include 'indexDB.php';
	$search_value = $_POST["search"];

	$output = '';

	$sql = "SELECT * FROM flat WHERE location LIKE '%{$search_value}%' OR city LIKE '%{$search_value}%' OR uid LIKE '%{$search_value}%' OR flat_id LIKE '%{$search_value}%'";

	$res1 = mysqli_query($conn, $sql);

	if(mysqli_num_rows($res1) > 0)
	{
		$output = ' <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
					 <tr class="bg-dark text-white text-center">
					 
					 <th> Uid </th>
					 <th> Fid </th>
					 <th> Location </th>
					 <th> City </th>
					 <th> Delete Property </th>
					 <th> Update Data</th>

					 </tr >';
		while($res = mysqli_fetch_array($res1))
		{
			
			$output .= ' <tr class="text-center">
						 <td>'.$res["uid"].'</td>
						 <td>'.$res["flat_id"].'</td>
						 <td>'.$res["location"].'</td>
						 <td>'.$res["city"].'</td>
						 <td> <button class="btn-danger btn"> <a href="adminDeleteProperty.php?id='.$res["flat_id"].' "class="text-white"> Delete </a>  </button> </td>
						 <td> <button class="btn-primary btn"> <a href="adminUpdateData.php?id='.$res["flat_id"].'" class="text-white"> Update </a> </button> </td>
						 </tr>
					';
		}
		echo $output;
	}
	else
	{
		echo 'Data not found';
	}


 ?>