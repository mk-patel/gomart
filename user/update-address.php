<?php
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once "../control/identification.php";
	
	// on submit button clicked.
	if(isset($_POST["address_fullname"])){
		$address_fullname =  mysqli_real_escape_string($conn, $_POST['address_fullname']);
		$address_mobile = mysqli_real_escape_string($conn, $_POST['address_mobile']);
		$address_fulladdress = mysqli_real_escape_string($conn, $_POST['address_fulladdress']);
		$address_city = mysqli_real_escape_string($conn, $_POST['address_city']);
		$address_postcode = mysqli_real_escape_string($conn, $_POST['address_postcode']);
		if(empty($address_fullname) && empty($address_mobile) && empty($address_fulladdress) && empty($address_city) && empty($address_postcode)){
			echo "You haven't filled all the input boxes.";
		}else{
			// Setting up default timezone.
			date_default_timezone_set('Asia/Calcutta');
			$date=date("d M Y, h:i A");
			
			$profile_update = "update address set address_fullname='$address_fullname', address_mobile='$address_mobile', address_fulladdress='$address_fulladdress', address_city='$address_city', address_postcode='$address_postcode' where user_id=$user_id";
			if(mysqli_query($conn, $profile_update)){
				echo "Address Updated Successfull";
			}else{
				echo "Unsuccessful, Please Try Again";
			}
		}
	}
?>