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
	
	if(!empty($_FILES["ad_image"]["tmp_name"])){
		$ad_id=$_POST['ad_id'];
		
		$fileSize = $_FILES['ad_image']['size'];
		if($fileSize < 500000){
			
			$select = "select ad_id from ads where ad_id=$ad_id";
			$select_result = mysqli_query($conn, $select);
			if(mysqli_num_rows($select_result)<= 0){
				
				$target_directory = "../../images/";
				$target_file = $target_directory.basename($_FILES["ad_image"]["name"]); 
				$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$newfilename = uniqid('', true).".".$filetype;
				$path = "images/".$newfilename;
				if(move_uploaded_file($_FILES["ad_image"]["tmp_name"],$target_directory.$newfilename)){
				
					$sql = "INSERT INTO ads(ad_id, ad_image)VALUES('$ad_id', '$path')";
					if(mysqli_query($conn, $sql)){
						echo "Successfully Updated.";
					}
					else{
						echo "Not Updated, Try Again !";
					}
				}else
					echo "File not updated, please try again.";
			}else{
				$img_select ="select ad_image from ads where ad_id=$ad_id";
				$img_result = mysqli_query($conn, $img_select);
				$img_row= mysqli_fetch_assoc($img_result);
				$img="../../".$img_row['ad_image'];
				unlink($img);
				
				$target_directory = "../../images/";
				$target_file = $target_directory.basename($_FILES["ad_image"]["name"]); 
				$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$newfilename = uniqid('', true).".".$filetype;
				$path = "images/".$newfilename;
				if(move_uploaded_file($_FILES["ad_image"]["tmp_name"],$target_directory.$newfilename)){
				
					$sql = "update ads set ad_image='$path' where ad_id=$ad_id";
					if(mysqli_query($conn, $sql)){
						echo "Successfully Updated.";
					}
					else{
						echo "Not Updated, Try Again !";
					}
				}else{
					echo "File not updated, please try again.";	
				}
			}
		}else{
				echo "Invalid, Please Upload Image Under 500kb";
			}
	}else
		echo "Please choose a image";
?>