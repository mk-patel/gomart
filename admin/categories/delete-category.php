<?php
	/*
	* This page updates ad into database.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	
	if(isset($_REQUEST['ct_id'])){
		$ct_id = $_REQUEST['ct_id'];
		$img_select ="select ct_image from categories where ct_id=$ct_id";
		$img_result = mysqli_query($conn, $img_select);
		$img_row= mysqli_fetch_assoc($img_result);
		$img="../../".$img_row['ct_image'];
		unlink($img);
		$sql = "delete from categories where ct_id=$ct_id";
		if(mysqli_query($conn, $sql)){
			$img_select ="select pr_image from product where pr_category=$ct_id";
			$img_result = mysqli_query($conn, $img_select);
			$img_row= mysqli_fetch_assoc($img_result);
			$img="../../".$img_row['pr_image'];
			unlink($img);
			$pr_sql = "delete from product where pr_category=$ct_id";
			if(mysqli_query($conn, $pr_sql))
				echo "<script>
				alert('All products related to this category are also deleted');
			</script>";
			echo "
			<script>
				alert('Successfully Deleted');
				window.location.href='categories.php';
			</script>";
		}
		else{
			echo "
			<script>
				alert('Not Deleted, Try Again !');
				window.location.href='categories.php';
			</script>";
		}
	}
?>