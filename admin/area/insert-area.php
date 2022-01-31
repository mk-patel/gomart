<?php
	/*
	* This page updates ad into database.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	
	if(isset($_POST['loc_name']) && isset($_POST['loc_district'])  && isset($_POST['loc_state'])  && isset($_POST['loc_pincode'])){
		$loc_name = $_POST['loc_name'];
		$loc_district = $_POST['loc_district'];
		$loc_state = $_POST['loc_state'];
		$loc_pincode = $_POST['loc_pincode'];
		if(!empty($loc_name) && !empty($loc_district) && !empty($loc_state) && !empty($loc_pincode)){
			$sql = "INSERT INTO service_location(loc_name, loc_district, loc_state, loc_pincode)
			VALUES('$loc_name', '$loc_district', '$loc_state', '$loc_pincode')";
			if(mysqli_query($conn, $sql)){
				echo "Successfully Added.";
			}
			else{
				echo "Not Added, Try Again !";
			}
		}else
			echo "Fill all the boxes";
	}else
		echo "Invalid";
?>