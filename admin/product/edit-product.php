<?php
	/*
	* This page updates products into database.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';

	// on submit button clicked.
	if(isset($_POST["pr_id"])){
		$pr_loc_id = mysqli_real_escape_string($conn, $_POST['pr_loc_id']);
		$pr_id = mysqli_real_escape_string($conn, $_POST['pr_id']);
		$pr_name = mysqli_real_escape_string($conn, $_POST['pr_name']);
		$pr_actual_price = mysqli_real_escape_string($conn, $_POST['pr_actual_price']);
		$pr_unit_actual = mysqli_real_escape_string($conn, $_POST['pr_unit_actual']);
		$pr_effective_price = mysqli_real_escape_string($conn, $_POST['pr_effective_price']);
		$pr_unit_effective = mysqli_real_escape_string($conn, $_POST['pr_unit_effective']);
		$pr_discount =  mysqli_real_escape_string($conn, $_POST['pr_discount']);
		$pr_wallet_disc =  mysqli_real_escape_string($conn, $_POST['pr_wallet_disc']);
		$pr_stock_count =  mysqli_real_escape_string($conn, $_POST['pr_stock_count']);
		$pr_desc = mysqli_real_escape_string($conn, $_POST['pr_desc']);
		if(empty($pr_desc)){
			$pr_desc = '0';
		}
		$pr_offers =  mysqli_real_escape_string($conn, $_POST['pr_offers']);
		if(empty($pr_offers)){
			$pr_offers = '0';
		}
		$pr_category = mysqli_real_escape_string($conn, $_POST['pr_category']);
		$pr_returns = mysqli_real_escape_string($conn, $_POST['pr_returns']);
		if(empty($pr_returns)){
			$pr_returns = '0';
		}	
		$pr_status = mysqli_real_escape_string($conn, $_POST['pr_status']);
		if(!empty($pr_loc_id) && !empty($pr_name) && !empty($pr_actual_price) && !empty($pr_effective_price) && !empty($pr_discount) && !empty($pr_wallet_disc)){
			// Setting up default timezone.
			date_default_timezone_set('Asia/Calcutta');
			$date=date("d M Y, h:i A");
			
			if(!empty($_FILES["pr_image"]["tmp_name"])){
				$fileSize = $_FILES['pr_image']['size'];
				if($fileSize < 200000){
					$image_select = "select pr_image from product where pr_id=$pr_id";
					$image_result = mysqli_query($conn, $image_select);
					if(mysqli_num_rows($image_result)>=1){
						$image_row = mysqli_fetch_assoc($image_result);
						$delete = "../../".$image_row['pr_image'];
						unlink($delete);
					}
					
					$target_directory = "../../images/";
					$target_file = $target_directory.basename($_FILES["pr_image"]["name"]); 
					$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
					$newfilename = uniqid('', true).".".$filetype;
					$path = "images/".$newfilename;
					if(move_uploaded_file($_FILES["pr_image"]["tmp_name"],$target_directory.$newfilename)){
					
						$sql = "update product set pr_name='$pr_name', pr_actual_price='$pr_actual_price', pr_unit_actual='$pr_unit_actual', 
								pr_effective_price='$pr_effective_price', pr_unit_effective='$pr_unit_effective', pr_discount='$pr_discount', pr_wallet_disc='$pr_wallet_disc',
								pr_desc='$pr_desc', pr_offers='$pr_offers', pr_category='$pr_category', pr_returns='$pr_returns', 
								pr_status='$pr_status',pr_stock_count='$pr_stock_count', pr_modifying_date='$date', pr_image='$path', pr_loc_id='$pr_loc_id' where pr_id=$pr_id";
						if(mysqli_query($conn, $sql)){
							echo "Successfully Updated Products Details With Image.";
						}
						else{
							echo "Not Updated, Try Again !";
							die(mysqli_error($conn));
						}
					}else{
						echo "file not supported";
					}
				}else{
					echo "Invalid, Please Upload Image Under 200kb";
				}
			}else{
				$sql = "update product set pr_name='$pr_name', pr_actual_price='$pr_actual_price', pr_unit_actual='$pr_unit_actual', 
						pr_effective_price='$pr_effective_price', pr_unit_effective='$pr_unit_effective', pr_discount='$pr_discount', pr_wallet_disc='$pr_wallet_disc',
						pr_desc='$pr_desc', pr_offers='$pr_offers', pr_category='$pr_category', pr_returns='$pr_returns', 
						pr_status='$pr_status',pr_stock_count='$pr_stock_count', pr_modifying_date='$date', pr_loc_id='$pr_loc_id' where pr_id=$pr_id";
				if(mysqli_query($conn, $sql)){
					echo "Successfully Updated Product Details.";
				}
				else{
					echo "Not Updated, Try Again !";
					die(mysqli_error($conn));
				}
			}
		}else{
			echo "Some important fields are empty.";
		}
	}
	else{
		echo "Invalid";
	}
?>