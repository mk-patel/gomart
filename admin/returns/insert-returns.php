<?php
	/*
	* This page inserts delivery data into database.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	
	if(isset($_POST['rt_loc_id']) && isset($_POST['rt_time'])){
		$rt_loc_id = $_POST['rt_loc_id'];
		$rt_time = $_POST['rt_time'];
		
		$select_loc = "select rt_loc_id from returns where rt_loc_id=$rt_loc_id";
		$loc_results = mysqli_query($conn, $select_loc);
		if(mysqli_num_rows($loc_results)<=0){
			if(!empty($rt_loc_id) && !empty($rt_time)){
				$sql = "INSERT INTO returns(rt_time, rt_loc_id)VALUES('$rt_time', '$rt_loc_id')";
				if(mysqli_query($conn, $sql)){
					echo "Successfully Added.";
				}
				else{
					echo "Not Added, Try Again !";
				}
			}else{
				echo "Empty fields not valid";
			}
		}else{
			echo "Location Already Exist";
		}
	}else{
		echo "Invalid";
	}
?>