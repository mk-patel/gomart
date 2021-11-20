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
	
	if(isset($_POST["order_unique_id"])){
		$order_unique_id = mysqli_real_escape_string($conn, $_POST["order_unique_id"]);
		$order_product_id = mysqli_real_escape_string($conn, $_POST["order_product_id"]);
		$order_quantity = mysqli_real_escape_string($conn, $_POST["order_quantity"]);
		$order_pricing = mysqli_real_escape_string($conn, $_POST["order_pricing"]);
		$address_fullname = mysqli_real_escape_string($conn, $_POST["full_name"]);
		$address_mobile = mysqli_real_escape_string($conn, $_POST["address_mobile"]);
		$address_city = mysqli_real_escape_string($conn, $_POST["address_city"]);
		$address_fulladdress = mysqli_real_escape_string($conn, $_POST["address_fulladdress"]);
		$address_postcode = mysqli_real_escape_string($conn, $_POST["address_postcode"]);
		$order_address = $_POST["full_name"].", ".$_POST["address_mobile"].", ".$_POST["address_city"].", ".$_POST["address_fulladdress"].", ".$_POST["address_postcode"];
		
		// Setting up the timezone.
		date_default_timezone_set('Asia/Calcutta');
		$date=date("d M Y")." ".date("H:i A");
		
		$place_order = "insert into orders (order_unique_id, order_product_id, order_pricing, order_quantity, order_address, order_user_id, order_date,order_user_status,order_status,cancellation_time)
						values ('$order_unique_id','$order_product_id','$order_pricing','$order_quantity','$order_address','$user_id','$date','0','Order Placed','Not Cancelled Yet')";
		if(mysqli_query($conn, $place_order)){
			$msg = "Ordered Successfully";
			$background = "green";
			$address_select ="select user_id from address where user_id=$user_id";
			$address_result = mysqli_query($conn, $address_select);
			if(mysqli_num_rows($address_result)>0){
				$update_address = "update address set address_fullname='$address_fullname', address_mobile='$address_mobile', address_city='$address_city', address_fulladdress='$address_fulladdress', address_postcode='$address_postcode' where user_id=$user_id";
				mysqli_query($conn, $update_address);
			}else{
				$address_entry = "insert into address (address_fullname, address_mobile, address_city, address_fulladdress, address_postcode, user_id)
								values ('$address_fullname','$address_mobile','$address_city','$address_fulladdress','$address_postcode','$user_id')";
				mysqli_query($conn, $address_entry);
			}
		}else{
			$msg = "Unsuccessful, Please try again.";
			$background = "red";
		}
			
	}else{
		$msg = "Invalid";
		$background = "red";
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
		font-size:16px;
		margin-left:10px;
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
	.order-success{
		background:<?php echo $background;?>;
		text-align:center;
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
				<h1>Ordered Successfully</h1>
			</div>
		</div>
    </header>
	<div class="order-success p-4 ">
		<p class="h4 text-light"><?php echo $msg;?></p><br/>
		<p class="h6 text-light mt-2">Thankyou, something great will happen, just wait for some time...</p>
		<p class="h5 text-light mt-4">To see your order <b>go back</b> and click &nbsp; <em class="fa fa-bars"></em> &nbsp; icon, then go to <b>Orders</b>.</p>
	</div>
</body>
</html>