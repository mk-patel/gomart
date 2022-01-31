<?php
	/*
	* This page inserts delivery data into database.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	
	if(isset($_POST['dlr_charge']) && isset($_POST['dlr_time'])){
		$dlr_charge = $_POST['dlr_charge'];
		$dlr_time = $_POST['dlr_time'];
		$dlr_charge_wallet = $_POST['dlr_charge_wallet'];
		$dlr_time_wallet = $_POST['dlr_time_wallet'];
		$dlr_loc_id = $_POST['dlr_loc_id'];
		
		$select_loc = "select dlr_loc_id from delivery where dlr_loc_id=$dlr_loc_id";
		$loc_results = mysqli_query($conn, $select_loc);
		if(mysqli_num_rows($loc_results)<=0){
			if(!empty($dlr_charge) && !empty($dlr_time)){
				$sql = "INSERT INTO delivery(dlr_charge, dlr_time,dlr_charge_wallet, dlr_time_wallet, dlr_loc_id)VALUES('$dlr_charge', '$dlr_time','$dlr_charge_wallet', '$dlr_time_wallet', '$dlr_loc_id')";
				if(mysqli_query($conn, $sql)){
					echo "Successfully Added.";
				}
				else{
					echo "Not Added, Try Again !";
				}
			}else{
				echo "Empty fields not valid";
			}
		}else{
			echo "Location Already Exist";
		}
	}else{
		echo "Invalid";
	}
?>