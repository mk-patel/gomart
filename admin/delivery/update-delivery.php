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
	
	if(isset($_POST['dlr_id'])){
		$dlr_id = $_POST['dlr_id'];
		$dlr_charge = $_POST['dlr_charge'];
		$dlr_time = $_POST['dlr_time'];
		$dlr_charge_wallet = $_POST['dlr_charge_wallet'];
		$dlr_time_wallet = $_POST['dlr_time_wallet'];
		if(!empty($dlr_id) && !empty($dlr_charge) && !empty($dlr_time) && !empty($dlr_charge_wallet) && !empty($dlr_time_wallet)){
			$sql = "update delivery set dlr_charge='$dlr_charge', dlr_time='$dlr_time',dlr_charge_wallet='$dlr_charge_wallet', dlr_time_wallet='$dlr_time_wallet' where dlr_id=$dlr_id";
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