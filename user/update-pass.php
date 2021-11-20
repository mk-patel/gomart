<?php
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once "../control/identification.php";
	
	// on submit button clicked.
	if(isset($_POST["password"])){
		$password =  mysqli_real_escape_string($conn, $_POST['password']);
		$password_repeat = mysqli_real_escape_string($conn, $_POST['password_repeat']);
		if(empty($password) && empty($password_repeat)){
			echo "You haven't filled all the input boxes.";
		}else{
			if($password==$password_repeat){
				// Setting up default timezone.
				date_default_timezone_set('Asia/Calcutta');
				$date=date("d M Y, h:i A");
				
				$password = md5($password);
				$password = sha1($password);
				
				$pass_update = "update user set password='$password' where user_id=$user_id";
				if(mysqli_query($conn, $pass_update)){
					echo "Password Updated Successfull";
				}else{
					echo "Unsuccessful, Please Try Again";
				}
			}else{
				echo "Password Not Matching, Please Try Again";
			}
		}
	}
?>