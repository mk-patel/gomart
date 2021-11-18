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
    <link rel="shortcut icon" href="../sys_images/logo.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <style>
		body{
			font-family: Arial, 
			Helvetica, sans-serif;
			background-image: url("../sys_images/bg.jpeg");
			height: auto; 
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
		.service-name{
			color:#fc8a17;
			font-weight:700;
			font-size:20px;
		}
		.special-button {
			width:100%;
		}
		.form{
			width:50%;
		}
		.navbar-brand{
			color:#fc8a17;
			font-weight:700;
			font-size:20px;
			text-shadow:0 0 2px white, 0 0 5px white;
		}
		.intro{
			width:100%;
			text-align:center;
		}
		.copyright{
			font-size:13px;
			text-align:center;
		}
		.ssipmt{
			text-align:center;
		}
		@media screen and (max-width: 1000px) {
			.form{
				width:90%;
			}
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-md bg-light navbar-light">
		<b class="navbar-brand">
			<img src="../sys_images/logo.png" alt="Logo" style="width:30px;">&nbsp;&nbsp;&nbsp;<b class="service-name">Go Mart</b>
		</b>
		
		<!-- Toggler/collapsibe Button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>

		  <!-- Navbar links -->
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="../about/about.html"><button class="btn btn-light text-dark">About</button></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../feedback/feedback.php"><button class="btn btn-light text-dark">Feedback</button></a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="p-3 bg-light ssipmt mt-1">
		<div class="container">
			<img src="../sys_images/ssipmt.jpeg" alt="Logo" style="width:40px;"> Shri Shankaracharya Institute of Professional Management & Technology
		</div>
	</div>
	<div class="intro p-5">
		<b class="navbar-brand">
			<img src="../sys_images/login.png" alt="Logo" style="width:50px;border-radius:10px;">
		</b><br/>
		<b class="navbar-brand ml-3">
			Welcome Back
		</b>
		
		<div class="">
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
					$sql="SELECT mobile_number, password FROM user WHERE mobile_number = '$mobile_number'";
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
						else if($password == $row["password"]){
							$_SESSION["mobile_number"] = $row["mobile_number"];
							$_SESSION["password"] = $row["password"];
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
						$sql="SELECT mobile_number, password FROM user WHERE mobile_number='$mobile_number'";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if($resultCheck < 1){
							echo  "This Mobile Number is not exist.";
						}
						else{
							$row = mysqli_fetch_assoc($result);
							if($password != $row["password"]){
									echo "Wrong Mobile Number or Password !!";
							}
							else if($password == $row["password"]){
								session_start();
								$_SESSION["mobile_number"] = $row["mobile_number"];
								$_SESSION["password"] = $row["password"];
								header("Location: ../index.php");
							}
							else{
								echo "Please Login Carefully !!";
							}
						}
					}
				}
				else{
					echo "Login Carefully";
				}
			}
		?>
		</div>
	</div>
	<div class="container p-3 mb-5">
		<div class="row justify-content-center">
			<form class="form p-5 bg-light rounded" method='post' action="">
				<div class="form-group">
					<label for="uname">Mobile Number</label>
					<input class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number" value="<?php if(isset($_COOKIE["mobile_number"])) { echo $_COOKIE["mobile_number"];}?>" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">Password</label>
					<input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"];}?>" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div>
					<input type="checkbox" name="remember"> <span>Remember me</span>
				</div>
				<div class="form-group">
					<p id="notify" name="notify" class="p-2 text-warning h6 mt-2"></p>
				</div>
				<div class="form-group">
					<button type="submit" id="submit" name="login" class="btn btn-warning special-button">Log in</button>
					<br/>
					<br/>
					<p style="text-align:center;">Forgot <a href="../user/forget-password.php">password?</a></p>
					<br/>
					<p style="text-align:center;">Or</p>
					<a href="signup.php"><b class="btn btn-secondary special-button">Sign up</b></a>
				</div>
			</form>
		</div>
	</div>
	<div class="copyright bg-dark p-2 text-light">
		<footer><img src="../sys_images/ssipmt.jpeg" alt="Logo" style="width:20px;"> Developed under SSIPMT College</footer>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script>
	$(document).ready(function(){
		$(document).on("click", "#notify", function(){
			document.getElementById("notify").innerHTML="Please Wait";
		});
		$(document).on("click", "#login-button", function(){
			document.getElementById("login-button").innerHTML="Please Wait";
		});
	});
	</script>
</body>
</html>
