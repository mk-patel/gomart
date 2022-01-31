<?php
	/*
	* This page inserts product into database.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';

	// on submit button clicked.
	if(isset($_POST["pr_loc_id"]) && isset($_POST["pr_name"]) && isset($_POST["pr_actual_price"]) && isset($_POST["pr_effective_price"]) && isset($_POST["pr_discount"]) && isset($_POST["pr_category"]) && !empty($_POST['pr_wallet_disc']) && !empty($_POST['pr_stock_count'])){
		$pr_loc_id = mysqli_real_escape_string($conn, $_POST['pr_loc_id']);
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
		if(!empty($pr_loc_id) && !empty($pr_name) && !empty($pr_actual_price) && !empty($pr_effective_price) && !empty($pr_discount) && !empty($pr_wallet_disc) && !empty($pr_unit_effective) && !empty($pr_stock_count)){
			if(!empty($pr_category)){
				if(!empty($_FILES["pr_image"]["tmp_name"])){
				
					$fileSize = $_FILES['pr_image']['size'];
					if($fileSize < 200000){
						
						// Setting up default timezone.
						date_default_timezone_set('Asia/Calcutta');
						$date=date("d M Y, h:i A");

						$target_directory = "../../images/";
						$target_file = $target_directory.basename($_FILES["pr_image"]["name"]); 
						$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
						$newfilename = uniqid('', true).".".$filetype;
						$path = "images/".$newfilename;
						if(move_uploaded_file($_FILES["pr_image"]["tmp_name"],$target_directory.$newfilename)){
							$sql = "INSERT INTO product(pr_name, pr_actual_price, pr_unit_actual, pr_effective_price, pr_unit_effective, pr_discount, pr_wallet_disc,
									pr_desc, pr_offers, pr_category, pr_returns, pr_status, pr_stock_count, pr_entry_date, pr_modifying_date, pr_image, pr_user_id, pr_loc_id) 
									
									VALUES('$pr_name','$pr_actual_price','$pr_unit_actual','$pr_effective_price','$pr_unit_effective','$pr_discount','$pr_wallet_disc',
									'$pr_desc','$pr_offers','$pr_category','$pr_returns','1','$pr_stock_count','$date', 'none','$path','1', '$pr_loc_id')";
							if(mysqli_query($conn, $sql)){
								
								echo "Successfully Inserted.";
							}
							else{
								echo "Not Inserted, Try Again !";
							}
						}else{
							echo "Image not uploaded, Try Again";
						}
					}else{
						echo "Invalid, Please Upload Image Under 200kb";
					}
				}else{
					echo "Empty Image Not Allowed.";
				}
			}else{
				echo "Empty Category, Add Category First.";
			}
		}else{
			echo "Empty Field Not Allowed, Please Fill Product Name, Actual Price, Effective Price, Discount, Total Stock";
		}
	}
	else{
		echo "Some fields are empty";
	}
?>