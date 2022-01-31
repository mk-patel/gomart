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
		width:100px;
		height:100px;
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
				<h1>Edit Wallet Offer</h1>
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
		<?php
			if(isset($_REQUEST['wlt_id'])){
				$wlt_id = $_REQUEST['wlt_id'];
				$wlt_select = "select wlt_id, wlt_rupees, wlt_amount from wallet where wlt_id = $wlt_id";
				$wlt_result = mysqli_query($conn, $wlt_select);
				$wlt_row = mysqli_fetch_assoc($wlt_result);
			}
		?>
		<div class="row pt-3">
			<div class="col-sm-6 border">
				<form id="add_new_products" autocomplete="on" enctype="multipart/form-data">
					<div class="form-group pt-4">
						<label for="uname" class="lable-title">Payable Amount</label>
						<input type="text" class="form-control" id="wlt_rupees" name="wlt_rupees" value="<?php echo $wlt_row['wlt_rupees'];?>" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="form-group">
						<label for="uname" class="lable-title">Wallet Cash</label>
						<input type="text" class="form-control" id="wlt_amount" name="wlt_amount" value="<?php echo $wlt_row['wlt_amount'];?>" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<br/>
					<input type="hidden" class="form-control" id="wlt_id" name="wlt_id" value="<?php echo $wlt_row['wlt_id'];?>" required>
					<button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
				</form>
				<div class="pb-5">
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script>
	$(document).ready(function (){
		$("#submit").click(function(event){
			document.getElementById("submit").disabled=true;
			document.getElementById("submit").innerHTML="Please Wait...";
			event.preventDefault();
			var formdata = new FormData($("#add_new_products")[0]);
			$.ajax({
				type : "post",
				url : "update-wallet.php",
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