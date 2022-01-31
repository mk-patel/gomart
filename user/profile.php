<?php
	/*
	* This page acknowledge order confirmation information.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	
	// Setting up the timezone.
	date_default_timezone_set('Asia/Calcutta');
	$date=date("d M Y")." ".date("H:i A");
	
	//selecting wallet details of user
	$wallet_data = "select user_wallet,user_wallet_expiry from user where user_id=$user_id";
	$wallet_data_result = mysqli_query($conn, $wallet_data);
	$wallet_data_row = mysqli_fetch_assoc($wallet_data_result);
	$user_wallet = $wallet_data_row["user_wallet"];
	$user_wallet_expiry = $wallet_data_row["user_wallet_expiry"];
	
	//checking wallet validity
	if($user_wallet_owner==1){
		if($date>=$user_wallet_expiry){
			$update_owner = "update user set user_wallet='0', user_wallet_expiry='0', user_wallet_owner='0' where user_id=$user_id";
			if(mysqli_query($conn, $update_owner)){
				$transaction = "insert into wallet_transaction (wtrsn_amount, wtrsn_date, wtrsn_type, wtrsn_user_id) values ('-$user_wallet', '$date', 'expired', '$user_id')";
				mysqli_query($conn, $transaction);
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

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
    <!--using FontAwesome--------------->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>

	<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
	body{
		font-family:poppins;
		margin:0px;
		padding: 0px;
		font-family: poppins;
		background-color: #ffffff;
		font-size:14px;
	}
	*{
		box-sizing: border-box;
	}
	a{
		text-decoration: none;
		color:black;
	}
	a:hover{
		text-decoration: none;
		color:black;
	}
	nav{
		width:100%;
		box-shadow: 2px 2px 30px rgba(0,0,0,0.05);
		z-index: 100;
	}
	.navigation{
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding:5px;
	}
	h1{
		font-size:18px;
		margin-left:10px;
	}
	.logo{
		width:200px;
		margin-left:10px;
	}
	.logo img{
		height: 40px;
		width:40px;
	}
	.right-menu a{
		margin: 0px 10px;
		font-size: 1.2rem;
		color: rgba(0,0,0,0.7);
	}
	.right-menu a:hover
	{
		color: #0b9d8a;
		transition: all ease 0.3s;
	}
	.fa-shopping-cart{
		position: relative;
	}
	.num-cart-product{
		position: absolute;
		top: -17px;
		right: -17px;
		width:25px;
		height: 25px;
		font-size: 0.8rem;
		border-radius: 50%;
		background-color: #0b9d8a;
		color: #ffffff;
		display: flex;
		justify-content: center;
		align-items: center;
		font-weight: 400;
	}
	@keyframes fade{
		0%{
			opacity: 0;
		}
		100%{
			opacity: 1;
		}
	}
	.fix-nav{
		width:100%;
		position: -webkit-sticky;
		position: sticky;
		top: 0;
		left: 0px;
		background-color: #ffffff;
		box-shadow: 2px 2px 30px rgba(0,0,0,0.05);
		z-index: 102;
	}
	@media(max-width:1000px){
		nav{
			position: relative;
		}
		.navigation{
			height: 50px;
		}
		.fix-nav{
			height: 50px;
		}
		.menu{
			position: absolute;
			top: 110px;
			left: 0px;
			background-color: #ffffff;
			border-bottom: 4px solid #0b9d8a;
			width: 100%;
			padding: 0px;
			margin: 0px;
			z-index: 102;
			flex-direction: column;
			display: none;
		}
		.fix-nav .menu{
			top: 50px;
		}
		.navigation.active .menu{
			display: block;
		}
	}
	@media(max-width:700px){
		.product-img img{
			width: 90px; 
			height:90px;
		}
		h1{
			font-size:16px;
			margin-left:10px;
		}
	}
	.btn{
		padding:4px;
		padding-left:7px;
		padding-right:7px;
		font-size:13px;
	}
	</style>
</head>
<body> 
    <!--menu-bar----------------------------------------->
    <header class="navigation fix-nav">
        <!--logo------------>
		<div class="logo-img">
			<div class="d-inline-block">
				<a href="../index.php" class="logo"><img src="../sys_images/logo.png" alt="logo"></a>
			</div>
			<div class="d-inline-block">
				<h1>Account</h1>
			</div>
		</div>
        <!--right-menu----------->
		<div class="right-menu">
            <a href="../login/logout.php" class="fa fa-sign-out">
                <span aria-hidden="true">Log Out</span>
            </a>
        </div>
    </header>
	<div class="container">
	<?php
		if($user_wallet_owner==1){
			$wallet = "select user_wallet,user_wallet_expiry from user where user_id=$user_id";
			$wallet_result = mysqli_query($conn, $wallet);
			$wallet_row = mysqli_fetch_assoc($wallet_result);
			
	?>
		<div class="p-3 pt-5">
			<div class="h5"><img src='../sys_images/wallet.png' alt='wallet' style='width:30px;'> Wallet Cash</div>
			<div class="p-2" style="text-size:14px;">
				Wallet cash will provide you the facilities like free and fast delivery, <br/>
				it will also give you addtional discount on products and give you addtional cashback on order.<br/>
				Your wallet cash will be auto expired after 1 year of subscription.<br/>
			</div>
			<div class="pt-3 d-flex h6">
				<div class="pt-2 text-success">Cash: <b class="h5"><em class='fas fa-rupee-sign'></em> <?php echo $wallet_row['user_wallet'];?></b></div>
				<div class="pt-2 pl-2 text-danger">&nbsp; Valid Upto: <b class="h5"><?php echo $wallet_row['user_wallet_expiry'];?></b></div><br/>
			</div>
			<div class="pt-1 d-flex h6">
				<div class="pt-2"><a href="../wallet/wallet-request.php" class="border border-success rounded p-1">Requests</a></div><br/>
				<div class="pt-2 pl-2"><a href="../wallet/wallet-history.php" class="border border-danger rounded p-1">History</a></div>
				<div class="pt-2 pl-2"><a href="../wallet" class="border border-warning rounded p-1">Recharge</a></div>
			</div>
			<hr/>
		</div>
	<?php
		}else{
			
	?>
		<div class="p-3 pt-5">
			<div class="h5">Wallet Cash Facility</div>
			<div class="p-2 h6 ">
				Wallet cash will provide you the facilities like free and fast delivery, <br/>
				it will also give you addtional discount on products and give you addtional cashback on order.<br/>
				You will be able to use Singup Bonus after booking any of the wallet recharge plan.<br/>
			</div>
			<div class="d-flex h6">
				<div><a href="../wallet"><button class="btn btn-primary">Activate Now</button></a></div>
				<div class="pl-2"><a href="../wallet/wallet-request.php"><button class="btn btn-light border border-success rounded"><b>My Requests</b></a></button></div><br/>
				<hr/>
			</div>
		</div>
	<?php
		}
	?>
		<div class="p-3 pt-5 h5">
			Actions
			<div class="pt-3 d-flex ">
				<div class="pt-2"><a href="../order/your-orders.php"><button class="btn btn-primary">My Orders</button></a></div>
				<div class="pt-2 pl-2"><a href="../order/cart.php"><button class="btn btn-warning">My Cart</button></a></div><br/>
				<div class="pt-2 pl-2"><a href="change-pass.php"><button class="btn btn-danger">Change Password</button></a></div>
			</div>
		</div>
		<div class="p-3 pt-5 h5">
			Your Profile
		</div>
		<div class="p-3">
		<?php
			$profile = "select user_full_name, user_dob, user_gender, mobile_number from user where user_id=$user_id";
			$profile_result = mysqli_query($conn, $profile);
			$profile_row = mysqli_fetch_assoc($profile_result);
			$date = $profile_row['user_dob'];
			$dob = date("Y-m-d", strtotime($date));
			
			// Selecting service location.
			$service = "select loc_id,loc_name,loc_district,loc_state,loc_pincode from service_location";
			$service_result = mysqli_query($conn, $service);
		?>
			<form class="form" method='post' action="" onsubmit="return post();">
				<div class="form-group">
					<label for="uname"><b>Change Service Location</b></label>
					<select name="user_loc_id" id="user_loc_id" class="custom-select" required>
						<?php
							$rowcount = mysqli_num_rows($service_result);
							if($rowcount<=0){
								echo "<option value='0'>No Service Location Available.</option>";
							}
							else{
								while($service_row = mysqli_fetch_assoc($service_result)){
									
						?>
							<option value="<?php echo $service_row['loc_id']?>"><?php echo $service_row['loc_name'].", ".$service_row['loc_district'].", ".$service_row['loc_state'].", ".$service_row['loc_pincode']?></option>
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
					<input class="form-control" id="user_full_name" name="user_full_name" placeholder="Enter Full Name" value="<?php echo $profile_row['user_full_name'];?>" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				 </div>
				 <div class="form-group">
					<label for="uname">Date of Birth </label>
					<input type="text" class="form-control" id="user_dob" placeholder="Date of Birth" name="user_dob" value="<?php echo $profile_row['user_dob'];?>" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				 </div>
				 <div class="form-group">
					<label for="uname">Gender</label>
					<select name="user_gender" id="user_gender" class="custom-select">
						<option value="<?php echo $profile_row['user_gender'];?>" selected><?php echo $profile_row['user_gender'];?></option>
						<option value="male">Male</option>
						<option value="femal">Female</option>
						<option value="other">Other</option>
					</select>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				 </div>
				 <div class="form-group">
					<label for="uname">Phone Number</label>
					<input type="text" class="form-control" id="mobile_number" placeholder="Phone Number" name="mobile_number" value="<?php echo $profile_row['mobile_number'];?>" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<p id="notify" name="notify" class="p-2 text-warning h6 mt-2"></p>
				</div>
				<div class="form-group">
					<button type="submit" id="submit" name="submit" class="btn btn-info">Update Profile</button>
				</div>
			</form>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script type="text/javascript">
		function post() {
			
			document.getElementById("submit").innerHTML="Please Wait";
			var user_loc_id = document.getElementById("user_loc_id").value;
			var user_full_name = document.getElementById("user_full_name").value;
			var user_dob = document.getElementById("user_dob").value;
			var user_gender = document.getElementById("user_gender").value;
			var mobile_number = document.getElementById("mobile_number").value;
				if (user_full_name != "" && user_dob != "" && user_gender != "" && mobile_number != "") {
					$.ajax({
					  url: "update-profile.php",
					  method: "post",
					  data: {
						user_loc_id : user_loc_id,
						user_full_name : user_full_name,
						user_dob : user_dob,
						user_gender : user_gender,
						mobile_number : mobile_number,
					  },
					  success: function (response) {
						document.getElementById("notify").innerHTML=response;
						location.reload();
					  },
					});
				}else{
					document.getElementById("notify").innerHTML="Empty Field Not Allowed";
				}
			return false;
		}
		</script> 
		<br/>
		<div class="p-3 pt-5 h5">
			Your Address
		</div>
		<div class="p-3">
		<?php
			$address = "select address_fullname, address_mobile, address_city, address_fulladdress, address_postcode from address where user_id=$user_id";
			$address_result = mysqli_query($conn, $address);
			$address_row = mysqli_fetch_assoc($address_result);
		?>
			<form class="form" method='post' action="" onsubmit="return address();">
				<div class="form-group">
					<label for="uname">Name</label>
					<input class="form-control" id="address_fullname" name="address_fullname" placeholder="Enter Full Name" value="<?php echo $address_row['address_fullname'];?>" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				 </div>
				 <div class="form-group">
					<label for="uname">Mobile Number</label>
					<input class="form-control" id="address_mobile" name="address_mobile" placeholder="Enter Mobile Number" value="<?php echo $address_row['address_mobile'];?>" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				 </div>
				 <div class="form-group">
					<label for="uname">Full Address</label>
					<input class="form-control" id="address_fulladdress" name="address_fulladdress" placeholder="Enter Full Address" value="<?php echo $address_row['address_fulladdress'];?>" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				 </div>
				 <div class="form-group">
					<label for="uname">City/Village Name</label>
					<input class="form-control" id="address_city" name="address_city" placeholder="Enter City/Village Name" value="<?php echo $address_row['address_city'];?>" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				 </div>
				 <div class="form-group">
					<label for="uname">Postal Pin Code</label>
					<input class="form-control" id="address_postcode" name="address_postcode" placeholder="Enter Pin Code" value="<?php echo $address_row['address_postcode'];?>" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				 </div>
				 <div class="form-group">
					<p id="notify2" name="notify2" class="p-2 text-warning h6 mt-2"></p>
				</div>
				<div class="form-group">
					<button type="submit" id="addSubmit" name="add-submit" class="btn btn-info">Update Address</button>
				</div>
			</form>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script type="text/javascript">
		function address() {
			document.getElementById("addSubmit").innerHTML="Please Wait";
			var address_fullname = document.getElementById("address_fullname").value;
			var address_mobile = document.getElementById("address_mobile").value;
			var address_fulladdress = document.getElementById("address_fulladdress").value;
			var address_city = document.getElementById("address_city").value;
			var address_postcode = document.getElementById("address_postcode").value;
				if (address_fullname != "" && address_mobile != "" && address_fulladdress != "" && address_city != "" && address_postcode != "") {
					$.ajax({
					  url: "update-address.php",
					  method: "post",
					  data: {
						address_fullname : address_fullname,
						address_mobile : address_mobile,
						address_fulladdress : address_fulladdress,
						address_city : address_city,
						address_postcode : address_postcode,
					  },
					  success: function (response) {
						document.getElementById("notify2").innerHTML=response;
						location.reload();
					  },
					});
				}else{
					document.getElementById("notify2").innerHTML="Empty Field Not Allowed";
				}
			return false;
		}
		</script> 
	</div>
</body>
</html>