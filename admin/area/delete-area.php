<?php
	/*
	* This page delete wallet from database.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	
	if(isset($_REQUEST['loc_id'])){
		$loc_id = $_REQUEST['loc_id'];
		
		$product = "delete from product where pr_loc_id=$loc_id";
		mysqli_query($conn, $product);
		
		$user = "update user set user_loc_id=0 product where user_loc_id=$loc_id";
		mysqli_query($conn, $user);
		
		$returns = "delete from returns where rt_loc_id=$loc_id";
		mysqli_query($conn, $returns);
		
		$delivery = "delete from delivery where dlr_loc_id=$loc_id";
		mysqli_query($conn, $delivery);
		
		$loc_sql = "delete from service_location where loc_id=$loc_id";
		if(mysqli_query($conn, $loc_sql)){
			echo "
			<script>
				alert('Successfully Deleted');
				window.location.href='add-area.php';
			</script>";
		}
		else{
			echo "
			<script>
				alert('Not Deleted, Try Again !');
				window.location.href='add-area.php';
			</script>";
		}
	}else{
		echo "Invalid";
	}
?>