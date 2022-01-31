<?php
	/*
	* This page updates cashback into database.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	
	if(isset($_POST['cb_cash_order'])){
		$cb_cash_order = $_POST['cb_cash_order'];
		if(!empty($cb_cash_order)){
			$select = "select cb_id,cb_cash_signup from cashback";
			$select_result = mysqli_query($conn, $select);
			$cb_result = mysqli_fetch_assoc($select_result);
			if(mysqli_num_rows($select_result)<= 0){
				if(empty($cb_result['cb_cash_signup'])){
					$sql = "INSERT INTO cashback(cb_cash_order,cb_cash_signup)VALUES('$cb_cash_order','0')";
					if(mysqli_query($conn, $sql)){
						echo "Successfully Added.";
					}
					else{
						echo "Not Added, Try Again !";
					}
				}else{
					$sql = "INSERT INTO cashback(cb_cash_order)VALUES('$cb_cash_order')";
					if(mysqli_query($conn, $sql)){
						echo "Successfully Added.";
					}
					else{
						echo "Not Added, Try Again !";
					}
				}
			}else{
				$sql = "update cashback set cb_cash_order='$cb_cash_order' where cb_id=1";
				if(mysqli_query($conn, $sql)){
					echo "Successfully Updated.";
				}
				else{
					echo "Not Updated, Try Again !";
				}
			}
		}else{
			echo "Fill the input box";
		}
	}
	else if(isset($_POST['cb_cash_signup'])){
		$cb_cash_signup = $_POST['cb_cash_signup'];
		if(!empty($cb_cash_signup)){
			$select = "select cb_id,cb_cash_order from cashback";
			$select_result = mysqli_query($conn, $select);
			$cb_result = mysqli_fetch_assoc($select_result);
			if(mysqli_num_rows($select_result)<= 0){
				if(empty($cb_result['cb_cash_order'])){
					$sql = "INSERT INTO cashback(cb_cash_signup,cb_cash_order)VALUES('$cb_cash_signup','0')";
					if(mysqli_query($conn, $sql)){
						echo "Successfully Added.";
					}
					else{
						echo "Not Added, Try Again !";
					}
				}else{
					$sql = "INSERT INTO cashback(cb_cash_signup)VALUES('$cb_cash_signup')";
					if(mysqli_query($conn, $sql)){
						echo "Successfully Added.";
					}
					else{
						echo "Not Added, Try Again !";
					}
				}
			}else{
				$sql = "update cashback set cb_cash_signup='$cb_cash_signup' where cb_id=1";
				if(mysqli_query($conn, $sql)){
					echo "Successfully Updated.";
				}
				else{
					echo "Not Updated, Try Again !";
				}
			}
		}else{
			echo "Fill the input box";
		}
	}else{
		echo "Invalid";
	}
?>