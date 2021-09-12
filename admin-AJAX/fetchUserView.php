<?php 
	
	include 'indexDB.php';
	$search_value = $_POST["search"];

	$output = '';

	$sql = "SELECT * FROM login WHERE UID LIKE '%{$search_value}%' OR name LIKE '%{$search_value}%' OR username LIKE '%{$search_value}%' OR email LIKE '%{$search_value}%'";

	$res1 = mysqli_query($conn, $sql);

	if(mysqli_num_rows($res1) > 0)
	{
		$output = '  <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
				<tr class="bg-dark text-white text-center">

				<th> Uid </th>
				<th> Name </th>
				<th> Username</th>
				<th> Email </th>
				<th> Password</th>
				<th> Delete Data</th>
				<th> Update Data</th>

				</tr >';
		while($res = mysqli_fetch_array($res1))
		{
			
			$output .= '<tr class="text-center">
					 <td>'.$res['UID'].'</td>
					 <td>'.$res['name'].'</td>
					 <td>'.$res['username'].'</td>
					 <td>'.$res['email'].'</td>
					 <td>'.$res['password'].'</td>
					 <td> <button class="btn-danger btn"> <a href="adminDeleteUser.php?id='.$res['UID'].'" class="text-white"> Delete </a>  </button> </td>
					 <td> <button class="btn-primary btn"> <a href="adminUpdateUserData.php?id='.$res['UID'].'" class="text-white"> Update </a> </button> </td>

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