<?php

/*

* This page deletes product.
*/

/**
* This ("identification.php") file contains User Authentication code.
* This ("identification.php") file contains Database Connection code.
* It checks the user existency in database .
*/
require_once '../control/identification.php';

if(isset($_REQUEST['pid'])){
	$del_id = $_REQUEST['pid'];
	$img_select ="select pr_image from product where pr_id=$del_id";
	$img_result = mysqli_query($conn, $img_select);
	$img_row= mysqli_fetch_assoc($img_result);
	$img="../../".$img_row['pr_image'];
	unlink($img);
	$product_delete = "delete from product where pr_id=$del_id";
	if(mysqli_query($conn, $product_delete)){
		echo "<script>alert('Successfully Deleted, Go back and refresh the page');
		window.location.href='index.php';</script>";
		echo "Successfully deleted, go back and refresh the page.";
	}else{
		echo "<script>alert('Not Deleted, Please Try Again.');
		window.location.href='index.php';</script>";
		echo "Not Deleted, Please Try Again.";
	}
}
?>