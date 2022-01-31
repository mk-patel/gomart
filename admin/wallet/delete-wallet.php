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
	
	if(isset($_REQUEST['wlt_id'])){
		$wlt_id = $_REQUEST['wlt_id'];
		$wlt_sql = "delete from wallet where wlt_id=$wlt_id";
		if(mysqli_query($conn, $wlt_sql)){
			echo "
			<script>
				alert('Successfully Deleted');
				window.location.href='index.php';
			</script>";
		}
		else{
			echo "
			<script>
				alert('Not Deleted, Try Again !');
				window.location.href='index.php';
			</script>";
		}
	}else{
		echo "Invalid";
	}
?>