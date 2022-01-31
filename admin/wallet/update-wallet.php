<?php
	/*
	* This page updates wallet info into database.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	
	if(isset($_POST['wlt_id']) && isset($_POST['wlt_rupees']) && isset($_POST['wlt_amount'])){
		$wlt_id = $_POST['wlt_id'];
		$wlt_rupees = $_POST['wlt_rupees'];
		$wlt_amount = $_POST['wlt_amount'];
		if(!empty($wlt_id) && !empty($wlt_rupees) && !empty($wlt_amount)){
			$sql = "update wallet set wlt_rupees='$wlt_rupees', wlt_amount='$wlt_amount' where wlt_id=$wlt_id";
			if(mysqli_query($conn, $sql)){
				echo "Successfully Updated.";
			}
			else{
				echo "Not Updated, Try Again !";
			}
		}else
			echo "Fill all the boxes";
	}else
		echo "Invalid";
?>