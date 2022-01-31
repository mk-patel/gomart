<?php
	/*
	* This page books a wallet request.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	
	if(isset($_POST['wlt_id'])){
		$wlt_id = $_POST['wlt_id'];
		
		// Setting up the timezone.
		date_default_timezone_set('Asia/Calcutta');
		$date=date("d M Y")." ".date("H:i A");
		
		if(!empty($wlt_id)){
			$wallet = "insert into subscription_request(sb_wlt_id,sb_date,sb_status,sb_user_id)
				values('$wlt_id','$date','0','$user_id')";
			if(mysqli_query($conn,$wallet)){
				echo "Successfully Requested.";
			}else{
				echo "Unable to request, try again...";
			}
		}else{
			echo "Empty fields not allowed.";
		}
	}else{
		echo "Invalid";
	}
?>