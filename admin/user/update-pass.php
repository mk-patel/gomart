<?php
	/*
	* This page updates user password.
	*/

	/**
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	
	// on submit button clicked.
	if(isset($_POST["user_id"])){
		$user_id =  mysqli_real_escape_string($conn, $_POST['user_id']);
		$password =  mysqli_real_escape_string($conn, $_POST['password']);
		$repeat_password = mysqli_real_escape_string($conn, $_POST['repeat_password']);
		if($password != $repeat_password){
			echo "You entered password is not matching with repeat password.";
		}else{
			$password = md5($password);
			$password = sha1($password);
			if(empty($password)){
				echo "You haven't filled all the input boxes.";
			}else{
				$password_update = "update user set password='$password' where user_id=$user_id";
				if(mysqli_query($conn, $password_update)){
					echo "Updated Successfull.";
				}else{
					echo "Unsuccessful, Please Try Again.";
				}
			}
		}
	}else{
		echo "Invalid";
	}
	
?>