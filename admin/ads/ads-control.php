<?php
	/*
	* This page displayes updates ad.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	
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
    <link rel="shortcut icon" href="../../sys_images/logo.png" />
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
	.col-sm-6 img{
		width:100%;
		height:auto;
	}
	</style>
</head>
<body> 
    <!--menu-bar----------------------------------------->
    <header class="navigation fix-nav">
        <!--logo------------>
		<div class="logo-img">
			<div class="d-inline-block">
				<a href="#" class="logo"><img src="../../sys_images/logo.png" alt="logo"></a>
			</div>
			<div class="d-inline-block">
				<h1>Advertisment</h1>
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
		<div class="pt-5 pb-5">
			Note : Image size should be in <b>(Width : height) ( 5:2 ) ratio</b> and less then <b>500 kb</b><br/>Please upload all images.
		</div>
		<div class="row pt-3">
			<div class="col-sm-6 border">
				<form id="add_new_products1" autocomplete="on" enctype="multipart/form-data">
					<div class="form-group pt-4">
						<label for="uname" class="lable-title">Slidable 1 Ads</label>
						<input type="file" class="form-control" id="ad_image" name="ad_image" required>
						<input type="hidden" class="form-control" id="ad_id" name="ad_id" value="1" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<br/>
					<button type="submit" id="submit1" name="submit" class="btn btn-primary">Update 1 Ad</button>
				</form>
				<div class="pb-5">
				</div>
				<form id="add_new_products2" autocomplete="on" enctype="multipart/form-data">
					<div class="form-group pt-4">
						<label for="uname" class="lable-title">Slidable 2 Ads</label>
						<input type="file" class="form-control" id="ad_image" name="ad_image" required>
						<input type="hidden" class="form-control" id="ad_id" name="ad_id" value="2" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<br/>
					<button type="submit" id="submit2" name="submit" class="btn btn-primary">Update 2 Ad</button>
				</form>
				<div class="pb-5">
				</div>
				<form id="add_new_products3" autocomplete="on" enctype="multipart/form-data">
					<div class="form-group pt-4">
						<label for="uname" class="lable-title">Slidable 3 Ads</label>
						<input type="file" class="form-control" id="ad_image" name="ad_image" required>
						<input type="hidden" class="form-control" id="ad_id" name="ad_id" value="3" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<br/>
					<button type="submit" id="submit3" name="submit" class="btn btn-primary">Update 3 Ad</button>
				</form>
				<div class="pb-5">
				<hr/>
				<hr/>
				</div>
				<form id="add_new_products_grocery" autocomplete="on" enctype="multipart/form-data">
					<div class="form-group pt-4">
						<label for="uname" class="lable-title">Grocery Ads</label>
						<input type="file" class="form-control" id="ad_image" name="ad_image" required>
						<input type="hidden" class="form-control" id="ad_id" name="ad_id" value="4" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<br/>
					<button type="submit" id="submit_grocery" name="submit" class="btn btn-primary">Update Grocery Ad</button>
				</form>
				<div class="pb-5">
				</div>
			</div>
			<div class="col-sm-6 text-center border">
			<p class="pt-5">Currently Running</p><br>
			<p><b>Slidable 1 Ads</b></p>
			<?php
				$select = "select ad_image from ads where ad_id=1";
				$select_result = mysqli_query($conn, $select);
				if(mysqli_num_rows($select_result)<= 0){
					echo "No ads yet";
				}else{
					$ad_row = mysqli_fetch_assoc($select_result);
			?>
				<img src="../../<?php echo $ad_row['ad_image'];?>" alt="ad image">
			<?php
				}
			?>
			<div class="pb-3">
			</div>
			<p><b>Slidable 2 Ads</b></p>
			<?php
				$select = "select ad_image from ads where ad_id=2";
				$select_result = mysqli_query($conn, $select);
				if(mysqli_num_rows($select_result)<= 0){
					echo "No ads yet";
				}else{
					$ad_row = mysqli_fetch_assoc($select_result);
			?>
				<img src="../../<?php echo $ad_row['ad_image'];?>" alt="ad image">
			<?php
				}
			?>
			<div class="pb-3">
			</div>
			<p><b>Slidable 3 Ads</b></p>
			<?php
				$select = "select ad_image from ads where ad_id=3";
				$select_result = mysqli_query($conn, $select);
				if(mysqli_num_rows($select_result)<= 0){
					echo "No ads yet";
				}else{
					$ad_row = mysqli_fetch_assoc($select_result);
			?>
				<img src="../../<?php echo $ad_row['ad_image'];?>" alt="ad image">
			<?php
				}
			?>
			<div class="pb-3">
			<hr/>
			<hr/>
			</div>
			<p><b>Grocery Ads</b></p>
			<?php
				$select = "select ad_image from ads where ad_id=4";
				$select_result = mysqli_query($conn, $select);
				if(mysqli_num_rows($select_result)<= 0){
					echo "No ads yet";
				}else{
					$ad_row = mysqli_fetch_assoc($select_result);
			?>
				<img src="../../<?php echo $ad_row['ad_image'];?>" alt="ad image">
			<?php
				}
			?>
			<div class="pb-3">
			</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script>
	$(document).ready(function (){
		$("#submit1").click(function(event){
			document.getElementById("submit1").disabled=true;
			document.getElementById("submit1").innerHTML="Please Wait...";
			event.preventDefault();
			var formdata = new FormData($("#add_new_products1")[0]);
			$.ajax({
				type : "post",
				url : "update-ad.php",
				processData : false,
				contentType : false,
				data : formdata,
				success : function(response){
					alert(response);
					location.reload();
				},
			});
		});
		$("#submit2").click(function(event){
			document.getElementById("submit2").disabled=true;
			document.getElementById("submit2").innerHTML="Please Wait...";
			event.preventDefault();
			var formdata = new FormData($("#add_new_products2")[0]);
			$.ajax({
				type : "post",
				url : "update-ad.php",
				processData : false,
				contentType : false,
				data : formdata,
				success : function(response){
					alert(response);
					location.reload();
				},
			});
		});
		$("#submit3").click(function(event){
			document.getElementById("submit3").disabled=true;
			document.getElementById("submit3").innerHTML="Please Wait...";
			event.preventDefault();
			var formdata = new FormData($("#add_new_products3")[0]);
			$.ajax({
				type : "post",
				url : "update-ad.php",
				processData : false,
				contentType : false,
				data : formdata,
				success : function(response){
					alert(response);
					location.reload();
				},
			});
		});
		$("#submit_grocery").click(function(event){
			document.getElementById("submit_grocery").disabled=true;
			document.getElementById("submit_grocery").innerHTML="Please Wait...";
			event.preventDefault();
			var formdata = new FormData($("#add_new_products_grocery")[0]);
			$.ajax({
				type : "post",
				url : "update-ad.php",
				processData : false,
				contentType : false,
				data : formdata,
				success : function(response){
					alert(response);
					location.reload();
				},
			});
		});
	});
	</script>
</body>
</html>