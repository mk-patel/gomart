<?php
	/*
	* This page displayes order details.
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
		background-image: url("../../sys_images/bg.jpeg");
		height: auto; 
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
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
	.product-img{
		text-align-center;
	}
	.product-img img{
		width:90px;
		height:90px;
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
	.cart-body{
	}
	.product-name{
		font-size:14px;
		font-weight:600;
	}
	.product-price label{
		font-size:13px;
		background:white;
	} 
	.product-price lable p{
		font-size:13px;
	}
	.product-quantity label{
		font-size:13px;
		background:white;
	} 
	.product-quantity lable p{
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
                <a href="#" class="logo"><img src="../../sys_images/logo.png" alt="logo"></a>
            </div>
            <div class="d-inline-block">
                <h1>Orders Details</h1>
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
	
	if(isset($_REQUEST['oid'])){
		$order_id = $_REQUEST['oid'];
	}
	else{
		header('location:../index.php');
	}
	
	//
	$pr_ids = "select order_product_id, order_unique_id, order_pricing, order_quantity, order_user_status, order_status from orders where order_id=$order_id";
	$pr_ids_result = mysqli_query($conn, $pr_ids);
	$pr_ids_row = mysqli_fetch_assoc($pr_ids_result);
	$pr_id_array = explode(",", $pr_ids_row['order_product_id']);
	$order_pricing_array = explode(",", $pr_ids_row['order_pricing']);
	$order_quantity_array = explode(",", $pr_ids_row['order_quantity']);
	$i=0;
	foreach ($pr_id_array as $pr_id){
		
	// fetching pricing details of the product id.
	$product = "select pr_id, pr_name, pr_image from product where pr_id=$pr_id";
	$product_result = mysqli_query($conn, $product);
		if(mysqli_num_rows($product_result) <= 0){
			echo "<div class='p-3 bg-danger text-center'>Sorry, Item not available.</div>";
		}
		else{
			$product_row = mysqli_fetch_assoc($product_result);		
	?>
		<div class="row border-bottom border-dark d-flex justify-content-center cart-body border-bottom">
			<div class="d-flex justify-content-start pt-5 product-img">
				<img class="img-thumbnail" src="../../<?php echo $product_row['pr_image']; ?>" alt="Product Image">
			</div>
			<div class="p-5 product-desc">
				<div class="row text-dark product-name">
					<p class=""><?php echo $product_row['pr_name']; ?></p>
				</div>
				<div class="row product-price">
				<label class="pt-2 pl-2 pr-2">Pricing / 1 Quantity
					<p class="pt-1 pl-1 pr-1"><?php echo $order_pricing_array[$i]; ?></p>
				</label>
				</div>
				<div class="row product-quantity">
				<label class="p-2">Quantity - <?php echo $order_quantity_array[$i]; ?>
				</label>
				</div>
			</div>
		</div>
		<?php
			}
			$i++;
		}
		?>
	</div>
</body>
</html>