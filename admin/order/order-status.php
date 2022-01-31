<?php

/*

* This page updates order status.
*/

/**
* This ("identification.php") file contains User Authentication code.
* This ("identification.php") file contains Database Connection code.
* It checks the user existency in database .
*/
require_once '../control/identification.php';

if(isset($_REQUEST['oid']) && isset($_REQUEST['st'])){
	$order_id = $_REQUEST['oid'];
	$status_id = $_REQUEST['st'];
	
	$order_status_update = "update orders set order_status='$status_id' where order_id=$order_id";
	if(mysqli_query($conn, $order_status_update)){
		echo "<script>alert('Successfully Updated, Go back and refresh the page');
		window.location.href='orders.php';</script>";
		echo "Successfully deleted, go back and refresh the page.";
	}else{
		echo "<script>alert('Not Updated, Please Try Again.');
		window.location.href='orders.php';</script>";
		echo "Not Deleted, Please Try Again.";
	}
}
?>