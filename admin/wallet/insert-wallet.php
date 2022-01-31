<?php
	/*
	* This page inserts wallet info into database.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	
	if(isset($_POST['wlt_rupees']) && isset($_POST['wlt_amount'])){
		$wlt_rupees = $_POST['wlt_rupees'];
		$wlt_amount = $_POST['wlt_amount'];
		if(!empty($wlt_rupees) && !empty($wlt_amount)){
			$sql = "INSERT INTO wallet(wlt_rupees, wlt_amount)VALUES('$wlt_rupees', '$wlt_amount')";
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