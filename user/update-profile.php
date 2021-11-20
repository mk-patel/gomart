<?php
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once "../control/identification.php";
	
	// on submit button clicked.
	if(isset($_POST["user_full_name"])){
		$user_full_name =  mysqli_real_escape_string($conn, $_POST['user_full_name']);
		$user_dob = mysqli_real_escape_string($conn, $_POST['user_dob']);
		$user_gender = mysqli_real_escape_string($conn, $_POST['user_gender']);
		$mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
		if(empty($user_full_name) && empty($user_dob) && empty($user_gender) && empty($mobile_number)){
			echo "You haven't filled all the input boxes.";
		}else{
			// Setting up default timezone.
			date_default_timezone_set('Asia/Calcutta');
			$date=date("d M Y, h:i A");
			
			$profile_update = "update user set user_full_name='$user_full_name', user_dob='$user_dob', user_gender='$user_gender', mobile_number='$mobile_number', user_update_date='$date' where user_id=$user_id";
			if(mysqli_query($conn, $profile_update)){
				echo "Profile Updated Successfull";
			}else{
				echo "Unsuccessful, Please Try Again";
			}
		}
	}
?>