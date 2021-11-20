		<?php
			// Database connection code.
			require_once "../control/connection.php";
			
			// Setting up default timezone.
			date_default_timezone_set('Asia/Calcutta');
			$date=date("d M Y, h:i A");
			
			// on submit button clicked.
			if(isset($_POST["pass_mobile"])){
				$pass_mobile =  mysqli_real_escape_string($conn, $_POST['pass_mobile']);
				$pass_name = mysqli_real_escape_string($conn, $_POST['pass_name']);
				
				if(empty($pass_mobile) && empty($pass_name)){
					echo "You haven't filled all the input boxes.";
				}else{
					$pass_insert = "insert into pass_request (pass_mobile, pass_name, pass_date) values ('$pass_mobile','$pass_name','$date')";
					if(mysqli_query($conn, $pass_insert)){
						echo "Requested Successfull, Please wait for 6 hours.";
					}else{
						echo "Unsuccessful, Please Try Again.";
					}
				}
			}
				
			?>