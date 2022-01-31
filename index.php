<?php

	// Starting the session to keep the user logged in.
	session_start();

	// This ("connetion.php") file contains Database Connection code.
	require_once 'control/connection.php';

	/**
	* Taking mobile number and password from session.
	* Validating the user.
	*/
	$mobile_number = $_SESSION["mobile_number"];
	$password = $_SESSION["password"];
	$query = "select user_id,mobile_number,password,user_full_name,user_wallet_owner,user_wallet,user_wallet_expiry from user where mobile_number='$mobile_number' and password='$password'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$user_id = $row["user_id"];
	$user_wallet_owner = $row["user_wallet_owner"];
	$user_full_name = $row["user_full_name"];
	$first_name = explode(" ", $user_full_name);
	if($user_wallet_owner==1){
		$wallet_ic = "<a href='wallet/wallet-history.php' class='wallet'>
                <em><img src='sys_images/wallet.png' alt='wallet' style='width:20px;'></em>
            </a>";
	}else{
		$wallet_ic = "";
	}

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
	
	// Setting up the timezone.
	date_default_timezone_set('Asia/Calcutta');
	$date=date("d M Y")." ".date("H:i A");
	
	//checking wallet validity
	if($user_wallet_owner==1){
		if($date>=$row["user_wallet_expiry"]){
			$update_owner = "update user set user_wallet='0', user_wallet_expiry='0', user_wallet_owner='0' where user_id=$user_id";
			if(mysqli_query($conn, $update_owner)){
				$user_wallet = $row["user_wallet"];
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
    <link rel="shortcut icon" href="sys_images/logo.png" />
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
		background-image: url("sys_images/bg.jpeg");
		height: auto; 
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}
	.wlcm-img img{
		width:100%;
		height:100vh;
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
		height: 50px;
	}
	.fix-nav{
		height: 50px;
	}
	.navigation{
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding:5px;
	}
	.logo{
		width:200px;
		margin-left:10px;
	}
	.logo img{
		height: 30px;
		width:30px;
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
	.service-name{
		color:#fc8a17;
		font-weight:600;
		font-size:20px;
	}
	.ads-block{
		width:100%;
	}
	.ads-1{
		width:33%;
		background:white;
	}
	.ads-1 img{
		width:100%;
		border:2px solid white;
		border-radius:10px;
	}
	.advertisement{
		text-align:center;
		width:100%;
		height:200px;
	}
	.advertisement img{
		width:auto;
		height:200px;
	}
	.slideshow-container{
		display:none;
	}
	.categories{
		padding:30px 5px 5px 15px;
	}
	.product{
		padding:10px;
		box-shadow:5px 5px 20px 2px #ffbf80;
		background:white;
	
	}
	.product-img{
		text-align:center;
	}
	.product-img img{
		width: 230px; 
		height:230px;
	}
	.product-desc{
		text-align:center;
		margin-top:15px;
		font-size:14px;
		font-weight:500;
	}
	.whatsapp{
		width:100%;
		background:black;
		font-size:13px;
		color:white;
	}
	.whatsapp img {
		width:30px;
		height:30px;
	}
	.search-bar{
		display:none;
	}
	.search-input{
		border: 2px solid black;
		width:370px;
	}
	.search-result{
		font-size:13px;
	}
	.ssipmt{
		text-align:center;
	}
    <!--for advertisement--------------->
	.mySlides {
		display: none;
	}
	.slideshow-container {
		max-width: 450px;
		position: relative;
		margin: auto;
		height:200px;
	}
	.mySlides img{
		width:100%;
		height:200px;
	}
	.fade {
		-webkit-animation-name: fade;
		-webkit-animation-duration: 5.5s;
		animation-name: fade;
		animation-duration: 5.5s;
	}
	@-webkit-keyframes fade {
		from {opacity: .4} 
		to {opacity: 1}
	}
	@keyframes fade {
		from {opacity: .4} 
		to {opacity: 1}
	}
	
	.mySlidesBottom {
		display: none;
	}
	.mySlidesBottom img{
		width:100%;
		height:200px;
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
		.advertisement img{
			width:100%;
			height:200px;
		}
		.product-img img{
			width: 120px; 
			height:120px;
		}
		.ads-block{
			display:none;
		}
	}
	@media(max-width:720px){
		.wlcm-img{
			width:100%;
			height:auto;
		}
		.product-img img{
			width: 100px; 
			height:100px;
		}
		.search-input{
			width:210px;
		}
		.navigation{
			height: 40px;
		}
		.fix-nav{
			height: 40px;
		}
		.slideshow-container{
			display:block;
		}
		.ads-1{
			display:none;
		}
	}
	@media(max-width:580px){
		.search-bar-header{
			display:none;
		}
		.search-bar{
			display:block;
			width:100%;
			text-align:center;
		}
		.search-input{
			width:96%;
			padding:3px;
		}
	}
	#notify{
		display:none;
	}
	.link-bar{
		font-size:13px;
	}
	
	</style>
</head>
<script>
function loader(){
	var loaded =  document.getElementById("loaded");
	loaded.style.display = "none";
}
</script>
<div id="loaded" class="img-responsive text-center wlcm-img">
	<img src="sys_images/wlcm.jpg" alt="Go Mart"/>
</div>
<body onload="loader()"> 
    <!--menu-bar----------------------------------------->
    <header class="navigation fix-nav">
        <!--logo------------>
		<div class="logo-img">
			<div class="d-inline-block">
				<b class="logo"><img src="sys_images/logo.png" alt="logo"></b>
			</div>
			<div class="d-inline-block">
				<b class='service-name'>&nbsp;Go Mart</b>
			</div>
			<span class="p-1 ml-2 search-bar-header">
				<input class="rounded search-input" type="text" name="search-header" id="search" placeholder="&nbsp;&nbsp;Search">
			</span>
		</div>
        <!--right-menu----------->
        <div class="right-menu ">
			<span id="notify"><img src="sys_images/loading.gif" width="40px" height="40px"></span>
			 <a href="order/cart.php" class="cart">
                <em class="fas fa-shopping-cart">
                </em>
            </a>
            <a href="user/profile.php" class="user">
                <em class="fa fa-bars"></em>
            </a>
			<?php echo $wallet_ic;?>
        </div>
    </header>
	<div class="pt-1 search-bar">
		<input class="rounded search-input" type="text" name="search" id="search-header" placeholder="&nbsp;&nbsp;Search">
	</div>
	<div class="search-result col-5 pb-1 text-center" id="search-result">
		<!-- Here autocomplete list will be display -->
	</div>
	
	<div class="p-3 bg-light ssipmt ">
		<div class="container">
			<img src="sys_images/ssipmt.jpeg" alt="Logo" style="width:40px;"> Shri Shankaracharya Institute of Professional Management & Technology
		</div>
	</div>
	<div class="d-flex justify-content-center ads-block mt-4">
		<?php
            $select = "select ad_image from ads limit 3";
		    $select_result = mysqli_query($conn, $select);
			if(mysqli_num_rows($select_result)<= 0){
				echo "No ads yet";
			}else{
				while($ad_row = mysqli_fetch_assoc($select_result)){
		?>
					<div class="ads-1">
						<img src="<?php echo $ad_row['ad_image'];?>" alt="ads">
					</div>
		<?php
				}
			}
		?>
	</div>
	
	<div class="slideshow-container">
		<?php
            $select = "select ad_image from ads limit 3";
		    $select_result = mysqli_query($conn, $select);
			if(mysqli_num_rows($select_result)<= 0){
				echo "No ads yet";
			}else{
				while($ad_row = mysqli_fetch_assoc($select_result)){
		?>
					<div class="mySlides fade">
					  <img src="<?php echo $ad_row['ad_image'];?>" style="width:100%">
					</div>
		<?php
				}
			}
		?>
	</div>
	<script>
		var slideIndex = 0;
		showSlides();

		function showSlides() {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");
		  for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";  
		  }
		  slideIndex++;
		  if (slideIndex > slides.length) {slideIndex = 1}    

		  slides[slideIndex-1].style.display = "block";  
		  setTimeout(showSlides, 5000); // Change image every 2 seconds
		}
	</script>
	
	<div class="mt-4 ml-2 mr-2 p-3 bg-light text-center h6 text-dark rounded">
		Categories
	</div>
	<div class="container">
		<div class="row categories">
		<?php
			$select = "select ct_id, ct_name, ct_image from categories order by ct_id asc";
			$select_result = mysqli_query($conn, $select);
			if(mysqli_num_rows($select_result)<= 0){
				echo "No categories yet.";
			}else{
				while($ct_row = mysqli_fetch_assoc($select_result)){
		?>
			<div class="col-sm-3 col-sm-4 col-6 mt-3 mb-3">
				<a href="product/products.php?ct=<?php echo $ct_row['ct_id'];?>&ct_name=<?php echo $ct_row['ct_name'];?>&img=<?php echo $ct_row['ct_image'];?>">
					<div class="product">
						<div class="product-img">
							<img src="<?php echo $ct_row['ct_image'];?>" alt="Categories">
						</div>
						<div class="product-desc">
							<p>
								<?php echo $ct_row['ct_name'];?>
							</p>
						</div>
					</div>
				</a>
			</div>
			<?php
				}
			}
			?>
		</div>
	</div>
	<div class="mt-4 ml-2 mr-2 p-3 bg-light text-center h6 text-dark rounded">
		Advertisement
	</div>
	<div class="d-flex justify-content-center ads-block mt-4">
		<?php
            $select = "select ad_image from ads limit 3";
		    $select_result = mysqli_query($conn, $select);
			if(mysqli_num_rows($select_result)<= 0){
				echo "No ads yet";
			}else{
				while($ad_row = mysqli_fetch_assoc($select_result)){
		?>
					<div class="ads-1">
						<img src="<?php echo $ad_row['ad_image'];?>" alt="ads">
					</div>
		<?php
				}
			}
		?>
	</div>
	<div class="slideshow-container">
		<?php
			$select = "select ad_image from ads limit 3";
			$select_result = mysqli_query($conn, $select);
			if(mysqli_num_rows($select_result)<= 0){
				echo "No ads yet";
			}else{
				while($ad_row = mysqli_fetch_assoc($select_result)){
		?>
		<div class="mySlidesBottom fade">
		  <img src="<?php echo $ad_row['ad_image'];?>" style="width:100%">
		</div>
		<?php
				}
			}
		?>
	</div>
	<div class="p-2 mt-4 bg-dark text-light link-bar">
		<a class="text-light" href="about/about.html">About</a> &nbsp;|&nbsp; <a class="text-light" href="feedback/feedback.php">Feedback</a>
	</div>
	<div class="pt-5"></div>
	<div class="p-2 whatsapp fixed-bottom">
		Have a query? Send Message <img src="sys_images/whatsapp.png"> 1234567890
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script>
	$(document).ready(function(){
		$(document).on("click", "a", function(){
			document.getElementById("notify").style.display="inline-block";
		});
	});
	</script>
	<script>
	  $(document).ready(function () {
		// Send Search Text to the server
		$("#search").keyup(function () {
		  let searchText = $(this).val();
		  if (searchText != "") {
			$.ajax({
			  url: "search/search-from-index.php",
			  method: "post",
			  data: {
				query: searchText,
			  },
			  success: function (response) {
				$("#search-result").html(response);
			  },
			});
		  } else {
			$("#search-result").html("");
		  }
		});
		$("#search-header").keyup(function () {
		  let searchText = $(this).val();
		  if (searchText != "") {
			$.ajax({
			  url: "search/search-from-index.php",
			  method: "post",
			  data: {
				query: searchText,
			  },
			  success: function (response) {
				$("#search-result").html(response);
			  },
			});
		  } else {
			$("#search-result").html("");
		  }
		});
	  });
	</script>
	<script>
		var slideIndexBottom = 0;
		showSlidesBottom();

		function showSlidesBottom() {
		  var i;
		  var slides = document.getElementsByClassName("mySlidesBottom");
		  for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";  
		  }
		  slideIndexBottom++;
		  if (slideIndexBottom > slides.length) {slideIndexBottom = 1}    

		  slides[slideIndexBottom-1].style.display = "block";  
		  setTimeout(showSlidesBottom, 5000); // Change image every 2 seconds
		}
	</script>
</body>
</html>