<?php
	/*
	* This page updates delivery data into database.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	
	if(isset($_POST['rt_id']) && isset($_POST['rt_time'])){
		$rt_id = $_POST['rt_id'];
		$rt_time = $_POST['rt_time'];
		
		if(!empty($rt_id)){
			$sql = "update returns set rt_time='$rt_time' where rt_id=$rt_id";
			if(mysqli_query($conn, $sql)){
				echo "Successfully Updated.";
			}
			else{
				echo "Not Updated, Try Again !";
			}
		}else{
			echo "Fill all the input boxes";
		}
	}else{
		echo "Invalid";
	}
?>