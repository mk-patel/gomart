<?php
	/*
	* This page iserts cart product information.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	if(isset($_POST["order_id"])){
		$order_id = mysqli_real_escape_string($conn, $_POST["order_id"]);

		// Setting up the timezone.
		date_default_timezone_set('Asia/Calcutta');
		$date=date("d M Y")." ".date("H:i A");
		
		$cart = "update orders set order_user_status='1', cancellation_time='$date' where order_id=$order_id";
		if(mysqli_query($conn, $cart)){
			echo "Cancelled Successfully";
		}else{
			echo "Unable to cancel";
		}
			
	}else{
		echo "Invalid";
	}
?>