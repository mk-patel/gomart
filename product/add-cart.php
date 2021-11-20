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
	if(isset($_POST["pr_id"])){
		$pr_id = mysqli_real_escape_string($conn, $_POST["pr_id"]);

		// Setting up the timezone.
		date_default_timezone_set('Asia/Calcutta');
		$date=date("d M Y")." ".date("H:i A");
		
		$cart = "insert into cart (cart_pr_id, cart_user_id, cart_date)
						values ('$pr_id','$user_id','$date')";
		if(mysqli_query($conn, $cart)){
			echo "Added Successfully";
		}else{
			echo "Unsuccessful, Try again.";
		}
			
	}else{
		echo "Invalid";
	}
?>