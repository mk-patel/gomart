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
		.container {
			padding: 10px;
		}
		.special-button {
			width:100%;
		}
		.term{
			font-size:13px;
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
<?php
	//including database connection code.
	require_once "../control/connection.php";
	
	// Selecting signup bonus.
	$signup = "select cb_cash_signup from cashback";
	$signup_result = mysqli_query($conn, $signup);
	$signup_row = mysqli_fetch_assoc($signup_result);
	
	// Selecting service location.
	$service = "select loc_id,loc_name from service_location";
	$service_result = mysqli_query($conn, $service);
	
?>
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
			<img src="../sys_images/new-user.png" alt="Logo" style="width:100px;background:white;border-radius:50%;"><br/><b class="navbar-brand ml-3">Welcome</b>
		</b>
		<p class="desc pt-4"> 
			<img src="../sys_images/wallet.png" alt="Logo" style="width:20px;">&nbsp;&nbsp;We have a <b>Gift</b> worth Rs. <?php echo $signup_row['cb_cash_signup'];?>  for you, signup and get it now.
		</p>
	</div>
	<div class="container mb-5">
		<div class="row justify-content-center">
			<form class="form p-5 bg-light rounded" method='post' action="" onsubmit="return post();">
				<div class="form-group">
					<label for="uname"><b>Select Service Location</b></label>
					<select name="user_location" id="user_location" class="custom-select" required>
						<?php
							$rowcount = mysqli_num_rows($service_result);
							if($rowcount<=0){
								echo "<option value='0'>No Service Location Available.</option>";
							}
							else{
								while($service_row = mysqli_fetch_assoc($service_result)){
									
						?>
							<option value="<?php echo $service_row['loc_id']?>"><?php echo $service_row['loc_name']?></option>
						<?php
								}
							}
						?>
					</select>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">Full Name</label>
					<input class="form-control" id="user_full_name" name="user_full_name" placeholder="Enter Full Name" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">Date of Birth</label>
					<input type="text" class="form-control" id="user_dob" placeholder="Date of Birth" name="user_dob" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">Gender</label>
					<select name="user_gender" id="user_gender" class="custom-select">
						<option value="none" disabled selected>Gender</option>
						<option value="male">Male</option>
						<option value="femal">Female</option>
						<option value="other">Other</option>
					</select>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				 </div>
				 <div class="form-group">
					<label for="uname">Phone Number</label>
					<input type="text" class="form-control" id="mobile_number" placeholder="Phone Number" name="mobile_number" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">Password</label>
					<input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname">Retype Password</label>
					<input type="text" class="form-control" id="password_repeat" placeholder="Retype Password" name="password_repeat" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div>
					<input type="checkbox" name="term" id="term" required> <span class="term"> Agree Terms & Conditions</span>
				</div>
				<div class="form-group">
					<p id="notify" name="notify" class="p-2 text-warning h6 mt-2"></p>
				</div>
				<div class="form-group">
					<button type="submit" id="submit" name="submit" class="btn btn-warning special-button">Sign Up</button>
					<br/>
					<br/>
					<p style="text-align:center;">Or</p>
					<a href="signin.php"><b class="btn btn-secondary special-button">Log In</b></a>
				</div>
			</form>
		</div>
	</div>
	<div class="copyright bg-dark p-2 text-light">
		<footer><img src="../sys_images/ssipmt.jpeg" alt="Logo" style="width:20px;"> Developed under SSIPMT College</footer>
	</div>
	<script type="text/javascript">
	function post() {
		document.getElementById("notify").innerHTML="Please Wait";
		document.getElementById("submit").disabled=true;
		var user_location = document.getElementById("user_location").value;
		var user_full_name = document.getElementById("user_full_name").value;
		var user_dob = document.getElementById("user_dob").value;
		var user_gender = document.getElementById("user_gender").value;
		var mobile_number = document.getElementById("mobile_number").value;
		var password = document.getElementById("password").value;
		var password_repeat = document.getElementById("password_repeat").value;
		var term = document.getElementById("term").value;
		if(password == password_repeat){
			if (mobile_number != "" && password != "") {
				$.ajax({
					url: "signup-insert.php",
					method: "post",
					data: {
						user_location : user_location,
						user_full_name : user_full_name,
						user_dob : user_dob,
						user_gender : user_gender,
						mobile_number : mobile_number,
						password : password,
						password_repeat : password_repeat,
						term : term
					},
					success: function (response) {
					document.getElementById("notify").innerHTML=response;
					},
				});
			} else {
				document.getElementById("notify").innerHTML="Empty Field Not Allowed";
			}
		}
		else {
			document.getElementById("notify").innerHTML="Password Not Matched";
		}
		return false;
	}
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
