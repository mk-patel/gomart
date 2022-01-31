<?php
	/*
	* This page displayes all categories.
	*/
	
	// starting the session.
	session_start();
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once 'control/connection.php';
	
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
		header("location: login/signin.php");
		exit();
		}
	else if($_SESSION["mobile_number"] != $row["mobile_number"]){
		header("location: login/signin.php");
		exit();
	}
	else if($password != $row["password"]){
		header("location: login/signin.php");
		exit();
	}
	else if($row["role"] != 'superadmin89'){
		header("location: login/signin.php");
		exit();
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
		h1{
			font-size:16px;
			margin-left:10px;
		}
	}
	.h6{
		font-size:16px;
		font-weight:600;
	}
	.flash-u{
		box-shadow:5px 5px 20px 2px #b3fffb;
	}
	.flash-head-u{
		background-color:#b3fffb;
	}
	.flash-sl{
		box-shadow:5px 5px 20px 2px #cbaafa;
	}
	.flash-head-sl{
		background-color:#cbaafa;
	}
	.flash-ad{
		box-shadow:5px 5px 20px 2px #faaaaa;
	}
	.flash-head-ad{
		background-color:#faaaaa;
	}
	.flash-ct{
		box-shadow:5px 5px 20px 2px #f26bbe;
	}
	.flash-head-ct{
		background-color:#f26bbe;
	}
	.flash-wt{
		box-shadow:5px 5px 20px 2px #fff187;
	}
	.flash-head-wt{
		background-color:#fff187;
	}
	.flash-od{
		box-shadow:5px 5px 20px 2px #2bff48;
	}
	.flash-head-od{
		background-color:#2bff48;
	}
	.flash-pr{
		box-shadow:5px 5px 20px 2px #62a3d9;
	}
	.flash-head-pr{
		background-color:#62a3d9;
	}
	.flash-dlr{
		box-shadow:5px 5px 20px 2px #ffcd8f;
	}
	.flash-head-dlr{
		background-color:#ffcd8f;
	}
	</style>
</head>
<body> 
    <!--menu-bar----------------------------------------->
    <header class="navigation fix-nav">
        <!--logo------------>
		<div class="logo-img">
			<div class="d-inline-block">
				<a href="#" class="logo"><img src="../sys_images/logo.png" alt="logo"></a>
			</div>
			<div class="d-inline-block">
				<h1>Admin Panel</h1>
			</div>
		</div>
        <!--right-menu----------->
        <div class="right-menu">
            <a href="login/logout.php" class="fa fa-sign-out">
                <span aria-hidden="true">Log Out</span>
            </a>
        </div>
    </header>
	
	<div class="container">
		<div class="row categories p-2">
			<div class="col-sm-1 col-sm-2 col-6 mt-3 mb-3">
				<a href="user/user-details.php">
					<div class="flash-u ">
						<div class="flash-head-u h3 p-5 text-center">
							<?php
								$select = "select user_id from user";
								$result = mysqli_query($conn, $select);
								echo mysqli_num_rows($result);
							?>
						</div>
						<div class="flash-footer h6 text-center p-2 pb-3 rounded">
							Users
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-1 col-sm-2 col-6 mt-3 mb-3">
				<a href="ads/ads-control.php">
					<div class="flash-ad">
						<div class="flash-head-ad h3 p-5 text-center">
							<?php
								$select = "select ad_id from ads";
								$result = mysqli_query($conn, $select);
								echo mysqli_num_rows($result);
							?>
						</div>
						<div class="flash-footer h6 text-center pb-3 p-2 rounded">
							Ads
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-1 col-sm-2 col-6 mt-3 mb-3">
				<a href="area/add-area.php">
					<div class="flash-sl">
						<div class="flash-head-sl h3 p-5 text-center">
							<?php
								$select = "select loc_id from service_location";
								$result = mysqli_query($conn, $select);
								echo mysqli_num_rows($result);
							?>
						</div>
						<div class="flash-footer h6 text-center pb-3 p-2 rounded">
							Service Location
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-1 col-sm-2 col-6 mt-3 mb-3">
				<a href="categories/categories.php">
					<div class="flash-ct">
						<div class="flash-head-ct h3 p-5 text-center">
							<?php
								$select = "select ct_id from categories";
								$result = mysqli_query($conn, $select);
								echo mysqli_num_rows($result);
							?>
						</div>
						<div class="flash-footer h6 text-center pb-3 p-2 rounded">
							Categories
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-1 col-sm-2 col-6 mt-3 mb-3">
				<a href="wallet">
					<div class="flash-wt">
						<div class="flash-head-wt h3 p-5 text-center">
							<?php
								$select = "select sb_id from subscription_request";
								$result = mysqli_query($conn, $select);
								echo mysqli_num_rows($result);
							?>
						</div>
						<div class="flash-footer h6 text-center pb-3 p-2 rounded">
							Wallet
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-1 col-sm-2 col-6 mt-3 mb-3">
				<a href="cashback">
					<div class="flash-sl">
						<div class="flash-head-sl h3 p-5 text-center">
							<?php
								$select = "select cb_id from cashback";
								$result = mysqli_query($conn, $select);
								echo mysqli_num_rows($result);
							?>
						</div>
						<div class="flash-footer h6 text-center pb-3 p-2 rounded">
							Cashback
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-1 col-sm-2 col-6 mt-3 mb-3">
				<a href="order/orders.php">
					<div class="flash-od">
						<div class="flash-head-od h3 p-5 text-center">
							<?php
								$select = "select order_id from orders";
								$result = mysqli_query($conn, $select);
								echo mysqli_num_rows($result);
							?>
						</div>
						<div class="flash-footer h6 text-center pb-3 p-2 rounded">
							Orders
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-1 col-sm-2 col-6 mt-3 mb-3">
				<a href="product">
					<div class="flash-pr">
						<div class="flash-head-pr h3 p-5 text-center">
							<?php
								$select = "select pr_id from product";
								$result = mysqli_query($conn, $select);
								echo mysqli_num_rows($result);
							?>
						</div>
						<div class="flash-footer h6 text-center pb-3 p-2 rounded">
							Product
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-1 col-sm-2 col-6 mt-3 mb-3">
				<a href="delivery">
					<div class="flash-dlr">
						<div class="flash-head-dlr h3 p-5 text-center">
							<?php
								$select = "select dlr_id from delivery";
								$result = mysqli_query($conn, $select);
								echo mysqli_num_rows($result);
							?>
						</div>
						<div class="flash-footer h6 text-center pb-3 p-2 rounded">
							Delivery
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-1 col-sm-2 col-6 mt-3 mb-3">
				<a href="returns">
					<div class="flash-u ">
						<div class="flash-head-u h3 p-5 text-center">
							<?php
								$select = "select rt_id from returns";
								$result = mysqli_query($conn, $select);
								echo mysqli_num_rows($result);
							?>
						</div>
						<div class="flash-footer h6 text-center p-2 pb-3 rounded">
							Returns
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-1 col-sm-2 col-6 mt-3 mb-3">
				<a href="user/pass-request.php">
					<div class="flash-od">
						<div class="flash-head-od h3 p-5 text-center">
							<?php
								$select = "select pass_id from pass_request";
								$result = mysqli_query($conn, $select);
								echo mysqli_num_rows($result);
							?>
						</div>
						<div class="flash-footer h6 text-center pb-3 p-2 rounded">
							New Password
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-1 col-sm-2 col-6 mt-3 mb-3">
				<a href="feedback/feedback.php">
					<div class="flash-ad">
						<div class="flash-head-ad h3 p-5 text-center">
							<?php
								$select = "select fd_id from feedback";
								$result = mysqli_query($conn, $select);
								echo mysqli_num_rows($result);
							?>
						</div>
						<div class="flash-footer h6 text-center pb-3 p-2 rounded">
							Feedbacks
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</body>
</html>