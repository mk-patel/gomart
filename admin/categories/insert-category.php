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
		
		$fileSize = $_FILES['ct_image']['size'];
		if($fileSize < 100000){
		
			$ct_name = $_POST['ct_name'];
			$target_directory = "../../images/";
			$target_file = $target_directory.basename($_FILES["ct_image"]["name"]); 
			$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$newfilename = uniqid('', true).".".$filetype;
			$path = "images/".$newfilename;
			if(move_uploaded_file($_FILES["ct_image"]["tmp_name"],$target_directory.$newfilename)){
				$sql = "INSERT INTO categories(ct_name, ct_image)VALUES('$ct_name', '$path')";
				if(mysqli_query($conn, $sql)){
					echo "Successfully Added.";
				}
				else{
					echo "Not Added, Try Again !";
				}
			}else
				echo "File not added, please try again.";
		}else
			echo "Invalid, Please Upload Image Under 100kb";
	}else
		echo "Please choose a image";
?>