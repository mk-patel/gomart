<?php

	// Starting the session to keep the user logged in.
	session_start();

	// This ("connetion.php") file contains Database Connection code.
	require_once 'connection.php';

	/**
	* Taking mobile number and password from session.
	* Validating the user.
	*/
	$mobile_number = $_SESSION["mobile_number"];
	$password = $_SESSION["password"];
	$role = $_SESSION["role"];
	$query = "select user_id,mobile_number,password,role from user where mobile_number='$mobile_number' and password='$password' and role='$role'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$user_id = $row["user_id"];
	if(empty($mobile_number) || empty($password)){
		header("location: ../login/signin.php");
		exit();
		}
	else if($_SESSION["mobile_number"] != $row["mobile_number"]){
		header("location: ../login/signin.php");
		exit();
	}
	else if($password != $row["password"]){
		header("location: ../login/signin.php");
		exit();
	}
	else if($row["role"] != 'superadmin89'){
		header("location: ../login/signin.php");
		exit();
	}
?>