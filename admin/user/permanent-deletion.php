<?php
	/*

	* This page deletes account.
	*/

	/**
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';

	if(isset($_REQUEST['uid'])){
		$user_id = $_REQUEST['uid'];
		
		$cart_delete = "delete from cart where cart_user_id=$user_id";
		mysqli_query($conn, $cart_delete);
		
		$order_delete = "delete from orders where order_user_id=$user_id";
		mysqli_query($conn, $order_delete);
		
		$account_delete = "delete from user where user_id=$user_id";
		mysqli_query($conn, $account_delete);

		echo "<script>alert('Successfully Deleted, Go back and refresh the page.');
			window.location.href='user-details.php';</script>";
		echo "Successfully deleted, Go back and refresh the page.";

	}
?>