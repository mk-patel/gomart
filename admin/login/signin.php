<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1, minimum-scale=1, width=device-width">
	<meta name="theme-color" content="green" />
	<title>Go Mart</title>
	<meta property="og:title" content="Go Mart">
	<meta name="description" content="Go Mart is collection of fresh vegetables and grocery products.">
	<meta property="og:description" content="Go Mart is collection of fresh vegetables and grocery products.">
	<meta name="keywords" content="go mart, vegetable shop in village, grocery shop in village">
	<meta name="author" content="Manish Patel, Nitish Prasad">
    <link rel="shortcut icon" href="../../sys_images/logo.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		body{
			font-family: Arial, 
			Helvetica, sans-serif;
			background-image: url("../../sys_images/bg.jpeg");
			height: 100vh; 
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
		.imgcontainer {
			text-align: center;
			margin: 24px 0 12px 0;
		}
		img.logo {
			width: 100px;
			height:100px;
		}
		.headline_0{
			text-align: center;
			font-size:23px;
			color:#017522;
			font-weight:700;
			margin-bottom:50px;
		}
		.headline_1{
			text-align: center;
			font-size:13px;
			color:black;
		}
		.container {
			padding: 10px;
		}
		input[type=text], input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}
		button {
			background-color: #4CAF50;
			olor: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 100%;
		}
		button:hover {
			opacity: 0.8;
		}
		.signupbtn {
			width: auto;
			padding: 10px 18px;
			background-color:darkorange;
		}
		span.psw {
			float: right;
			padding-top: 16px;
		}
		@media screen and (max-width: 300px) {
			span.psw {
				display: block;
				float: none;
			}
			.signupbtn {
				width: 100%;
			}
		}
	</style>
</head>
<body>
	<div class="headline_0 pt-5">
		<p>
			Veg Gallery<br/>
			<br/>
			Admin Panel
		</p>
	</div>
	<div class="ml-2 p-3 text-danger text-center">
		<?php
			// Database connection code.
			require_once "../control/connection.php";
			
			// starting the session.
			session_start();
			
			// on login button clicked.
			if(isset($_POST["login"])){
				$mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
				$mobile_number = trim($mobile_number);
				$password_actual = mysqli_real_escape_string($conn, $_POST['password']);
				$password = md5($password_actual);
				$password = sha1($password);
				if(empty($mobile_number) || empty($password_actual)){
					echo "Mobile Number or Password is empty.";
				}
				else{
					$sql="SELECT mobile_number, password, role FROM user WHERE mobile_number = '$mobile_number'";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if($resultCheck < 1){
						echo "This Mobile Number is not exist.";
					}
					else{
						$row = mysqli_fetch_assoc($result);
						if($password != $row["password"]){
								echo "Wrong Mobile Number or Password !!";
						}
						else if($password == $row["password"] && $row["role"] == 'superadmin89'){
							$_SESSION["mobile_number"] = $row["mobile_number"];
							$_SESSION["password"] = $row["password"];
							$_SESSION["role"] = "superadmin89";
							if(!empty($_POST["remember"])){
								setcookie ("mobile_number",$mobile_number,time()+(30 * 24 * 60 * 60));
								setcookie ("password",$password_actual,time()+(30 * 24 * 60 * 60));
							}
							else{
								if(isset($_COOKIE["mobile_number"])){
									setcookie ("mobile_number","");
								}
								if(isset($_COOKIE["password"])){
									setcookie ("password","");
								}
							}
							header("location: ../index.php");
						}
						else{
							echo "Wrong Mobile Number or Password.";
						}
					}
				}
			}
			else{
				if(isset($_COOKIE["mobile_number"]) && isset($_COOKIE["password"])){
					$mobile_number =$_COOKIE["mobile_number"];
					$mobile_number = trim($mobile_number);
					$password_actual =$_COOKIE["password"];
					$password = md5($password_actual);
					$password = sha1($password);
					if(empty($mobile_number) || empty($password_actual)){
						echo "Mobile Number or Password is empty.";
					}else{
						$sql="SELECT mobile_number, password, role FROM user WHERE mobile_number='$mobile_number'";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if($resultCheck < 1){
							echo  "This Mobile Number is not exist.";
						}
						else{
							$row = mysqli_fetch_assoc($result);
							if($password != $row["password"] && $row["role"] == 'superadmin89'){
									echo "Wrong Mobile Number or Password !!";
							}
							else if($password == $row["password"]){
								$_SESSION["mobile_number"] = $row["mobile_number"];
								$_SESSION["password"] = $row["password"];
								$_SESSION["role"] = "superadmin89";
								header("Location: ../index.php");
							}
							else{
								echo "Please Login Carefully !!";
							}
						}
					}
				}
				else{
					echo "Please Login Carefully !!";
				}
			}
		?>
	</div>
	<div class="container">
		<form action="" method="post">
			<input type="text" placeholder="Enter Mobile Number" value="<?php if(isset($_COOKIE["mobile_number"])) { echo $_COOKIE["mobile_number"];}?>" id="mobile_number" name="mobile_number" maxlength="10" required="Number">
			<input type="password" placeholder="Enter Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"];}?>" id="password" name="password" required>
			<label>
				<input type="checkbox" name="remember"> <span>Remember me</span>
			</label>
			<button id="login-button" name="login" type="submit">Login</button>
		</form>
	</div>
</body>
</html>
