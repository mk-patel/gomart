<?php
	/*
	* This page displayes all address information.
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
		background-image:linear-gradient(to bottom,  #ffb5ea , white);
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
	.lable-title{
		font-size:14px;
	}
	.order-book{
		background:lightblue;
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
				<h1>Place Order</h1>
			</div>
		</div>
        <!--right-menu----------->
        <div class="right-menu">
            <a href="../user/profile.php" class="user">
                <em class="far fa-bars"></em>
            </a>
        </div>
    </header>
	<div class="container">
	<?php
	
		if(isset($_GET["pr_id"])){
			$pr_id_count = count($_GET["pr_id"]);
			if($pr_id_count > 0) {
				for ($i=0; $i < $pr_id_count; $i++){
					$pr_id[] = mysqli_real_escape_string($conn, $_GET["pr_id"][$i]);
					$quantity[] = mysqli_real_escape_string($conn, $_GET["quantity"][$i]);
					$price[] = mysqli_real_escape_string($conn, $_GET["price"][$i]);
			}
		
			// generating randome number for order id.
			function rand_order(){
				$order_id = mt_rand(100000000, 999999999);
				return $order_id;
			}
			$order_unique_id = rand_order();
			$check_uniqueness = "select order_unique_id from orders where order_unique_id=$order_unique_id";
			$result_uniqueness = mysqli_query($conn, $check_uniqueness);
			if(mysqli_num_rows($result_uniqueness) >=1){
				$order_unique_id = rand_order();
			}
			
			// fetching address data.
			$address = "select address_fullname, address_mobile, address_city, address_fulladdress, address_postcode from address where user_id=$user_id";
			$address_result = mysqli_query($conn, $address);
			$address_row = mysqli_fetch_assoc($address_result);
			}
		}
	?>
	<form action="order-success.php" id="setupform" method="post" autocomplete="on">
		<div class="address-body p-3 ">
			<div class="p-3 text-dark rounded lable-title order-book">
			<input type="hidden" value="<?php echo $order_unique_id; ?>" name="order_unique_id">
			<input type="hidden" value="<?php echo implode(",",$price); ?>" name="order_pricing">
			<input type="hidden" value="<?php echo implode(",",$quantity); ?>" name="order_quantity">
			<input type="hidden" value="<?php echo implode(",",$pr_id); ?>" name="order_product_id">
				<p>Order ID- <b><?php echo $order_unique_id; ?></b><br/>
					Order Details -<br/> <b>Total Pricing Rs. : <?php echo implode(",", $price);?></b> <br/> Quantity :  <?php echo implode(",", $quantity);?><br/>
				</p>
			</div>
			<div class="form-group pt-4">
				<label for="uname" class="lable-title">Full Name</label>
				<input type="text" class="form-control" id="fullname" placeholder="Full Name" name="full_name" value="<?php echo $address_row['address_fullname']; ?>" required>
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please fill out this field.</div>
			</div>
			<div class="form-group">
				<label for="uname" class="lable-title">Mobile Number</label>
				<input type="text" class="form-control" id="mobile" placeholder="Mobile Number" name="address_mobile" value="<?php echo $address_row['address_mobile']; ?>" required>
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please fill out this field.</div>
			</div>
			<div class="form-group">
				<label for="uname" class="lable-title">City / Village</label>
				<input type="text" class="form-control" id="city" placeholder="City/Village" name="address_city" value="<?php echo $address_row['address_city']; ?>" required>
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please fill out this field.</div>
			</div>
			<div class="form-group">
				<label for="uname" class="lable-title">Full Address</label>
				<textarea type="text" rows="2" class="form-control" id="address" placeholder="address" name="address_fulladdress" required><?php echo $address_row['address_fulladdress']; ?></textarea>
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please fill out this field.</div>
			</div>
			<div class="form-group">
				<label for="uname" class="lable-title">Postal Pincode</label>
				<input type="text" class="form-control" id="pincode" placeholder="pincode" name="address_postcode" value="<?php echo $address_row['address_postcode']; ?>" required>
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please fill out this field.</div>
			</div>
			<br/>
			<button type="submit" name="submit" id="submit" class="btn btn-primary">Place Order</button>
		</div>
	</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script>
	$(document).ready(function(){
		$(document).on("click", "#submit", function(){
			document.getElementById("submit").innerHTML="Please Wait...Processing";
		});
	});
	</script>
</body>
</html>