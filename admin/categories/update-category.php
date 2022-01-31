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
	
	if(!empty($_FILES["ct_image"]["tmp_name"]) && isset($_POST['ct_name'])){
		$ct_id = $_POST['ct_id'];
		$ct_name = $_POST['ct_name'];

		$fileSize = $_FILES['ct_image']['size'];
		if($fileSize < 100000){
			$image_select = "select ct_image from categories where ct_id=$ct_id";
			$image_result = mysqli_query($conn, $image_select);
			if(mysqli_num_rows($image_result)>=1){
				$image_row = mysqli_fetch_assoc($image_result);
				$delete = "../../".$image_row['ct_image'];
				unlink($delete);
			}
			$target_directory = "../../images/";
			$target_file = $target_directory.basename($_FILES["ct_image"]["name"]); 
			$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$newfilename = uniqid('', true).".".$filetype;
			$path = "images/".$newfilename;
			if(move_uploaded_file($_FILES["ct_image"]["tmp_name"],$target_directory.$newfilename)){
				$sql = "update categories set ct_name='$ct_name', ct_image='$path' where ct_id=$ct_id";
				if(mysqli_query($conn, $sql)){
					echo "Successfully Updated Image.";
				}
				else{
					echo "Not Updated, Try Again !";
				}
			}else{
				echo "File not updated, please try again.";
			}
		}else{
			echo "Invalid, Please Upload Image Under 100kb";
		}
	}else{
		$ct_id = $_POST['ct_id'];
		$ct_name = $_POST['ct_name'];
		$sql = "update categories set ct_name='$ct_name' where ct_id=$ct_id";
		if(mysqli_query($conn, $sql)){
			echo "Successfully Updated Category Name, Image Not Uploaded.";
		}
		else{
			echo "Not Updated, Try Again !";
		}
	}
?>