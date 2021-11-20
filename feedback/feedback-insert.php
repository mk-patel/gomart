<?php
	// Database connection code.
	require_once "../control/connection.php";
	
	// on submit button clicked.
	if(isset($_POST["fd_type"])){
		$fd_type =  mysqli_real_escape_string($conn, $_POST['fd_type']);
		$fd_name = mysqli_real_escape_string($conn, $_POST['fd_name']);
		$fd_mobile = mysqli_real_escape_string($conn, $_POST['fd_mobile']);
		$fd_data = mysqli_real_escape_string($conn, $_POST['fd_data']);
		if(empty($fd_type) && empty($fd_data)){
			echo "You haven't filled all the input boxes.";
		}else{
			// Setting up default timezone.
			date_default_timezone_set('Asia/Calcutta');
			$date=date("d M Y, h:i A");
			
			$fd_insert = "insert into feedback (fd_type, fd_name, fd_mobile, fd_data, fd_date) values ('$fd_type','$fd_name','$fd_mobile','$fd_data','$date')";
			if(mysqli_query($conn, $fd_insert)){
				echo "Inserted Successfull";
			}else{
				echo "Unsuccessful, Please Try Again";
			}
		}
	}
?>