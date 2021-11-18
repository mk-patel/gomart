		<?php
			// Database connection code.
			require_once "../control/connection.php";
			
			// Setting up default timezone.
			date_default_timezone_set('Asia/Calcutta');
			$date=date("d M Y, h:i A");
			
			// on submit button clicked.
			if(isset($_POST["user_full_name"])){
				$user_location = mysqli_real_escape_string($conn, $_POST['user_location']);
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
							echo "You entered password is not matching with repeat password.";
						}else{
							$password = md5($password);
							$password = sha1($password);
							if(empty($user_location) && empty($user_full_name) && empty($user_dob) && empty($user_gender) && empty($mobile_number) && empty($password)){
								echo "You haven't filled all the input boxes.";
							}else{
								$user_insert = "insert into user (mobile_number, password, role, user_full_name, user_dob, user_gender, user_location, user_entry_date, user_update_date) values ('$mobile_number','$password', 'none', '$user_full_name','$user_dob','$user_gender','$user_location','$date', 'none')";
								if(mysqli_query($conn, $user_insert)){
									echo "Registered Successfull, <a href='signin.php'>Click Here To Login.</a>";
								}else{
									echo "Unsuccessful, Please Try Again.";
                                    die(mysqli_error($conn));
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