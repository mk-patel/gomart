<?php
	// Database connection code.
	require_once "../control/connection.php";
	
	// Setting up default timezone.
	date_default_timezone_set('Asia/Calcutta');
	$date=date("d M Y, h:i A");
	
	// on submit button clicked.
	if(isset($_POST["user_full_name"])){
		$user_loc_id = mysqli_real_escape_string($conn, $_POST['user_loc_id']);
		$user_full_name =  mysqli_real_escape_string($conn, $_POST['user_full_name']);
		$user_dob = mysqli_real_escape_string($conn, $_POST['user_dob']);
		$user_gender = mysqli_real_escape_string($conn, $_POST['user_gender']);
		$mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
		$mobile_number = trim($mobile_number);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$password_repeat = mysqli_real_escape_string($conn, $_POST['password_repeat']);
		if(!empty($_POST["term"])){
			$select_user = "select mobile_number from user where mobile_number='$mobile_number'";
			$select_result = mysqli_query($conn, $select_user);
			if(mysqli_num_rows($select_result) <= 0){
				if($password != $password_repeat){
					echo "Your entered password is not matching with repeat password.";
				}else{
					$password = md5($password);
					$password = sha1($password);
					if(empty($user_loc_id) && empty($user_full_name) && empty($user_dob) && empty($user_gender) && empty($mobile_number) && empty($password)){
						echo "You haven't filled all the input boxes.";
					}else{
						// selecting casbhack details for signup
						$cashback = "select cb_cash_signup from cashback";
						$cashback_result = mysqli_query($conn, $cashback);
						$cashback_row = mysqli_fetch_assoc($cashback_result);
						$cashback_amt = $cashback_row['cb_cash_signup'];
						
						$user_insert = "insert into user (mobile_number, password, role, user_wallet_owner, user_wallet, user_wallet_expiry, user_full_name, user_dob, user_gender, user_loc_id, user_entry_date, user_update_date) values ('$mobile_number','$password', 'none', '0', '$cashback_amt', '0', '$user_full_name','$user_dob','$user_gender','$user_loc_id','$date', 'none')";
						if(mysqli_query($conn, $user_insert)){

							//selecting user id for this user
							$user_id_select = "select user_id from user where mobile_number='$mobile_number'";
							$user_result = mysqli_query($conn, $user_id_select);
							$user_id_row = mysqli_fetch_assoc($user_result);
							$user_id = $user_id_row['user_id'];
							
							//updating wallet transaction details
							$wtrsn = "insert into wallet_transaction (wtrsn_amount,wtrsn_date,wtrsn_type,wtrsn_user_id)
							values ('+$cashback_amt','$date','signup bonus','$user_id')";
							mysqli_query($conn, $wtrsn);
							
							echo "Congratulations You Have Won Rs. ".$cashback_amt." Wallet Cash.";
							echo "Registered Successfull, <a href='signin.php'>Click Here To Login.</a>";
						
						}else{
							echo "Unsuccessful, Please Try Again.";
						}
					}
				}
			}else{
				echo "Mobile Number Already Exist";
			}
		}else{
			echo "Please Accept Terms and Conditions.";
		}
	}
?>