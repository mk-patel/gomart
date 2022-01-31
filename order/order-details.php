<?php
	/*
	* This page displayes ordered products.
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
	<title>Bhagyalaxmi Veg Gallery</title>
	<meta property="og:title" content="Bhagyalaxmi Veg Gallery">
	<meta name="description" content="Bhagyalaxmi veg gallery is collection of fresh vegetables and grocery products.">
	<meta property="og:description" content="Bhagyalaxmi veg gallery is collection of fresh vegetables and grocery products.">
	<meta name="keywords" content="bhagyalaxmi veg gallery, vegetable shop in village, grocery shop in village">
	<meta name="author" content="Manish Patel, Pankaj Sahu">
    <link rel="shortcut icon" href="images/fav-icon.png" />
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
		background-color: rgba(0,0,0,0.1);
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
	.product-price label{
		font-size:13px;
	}
	.product-price label select{
		font-size:12px;
	}
	.product-action label{
		font-size:13px;
	}
	.product-action label select{
		font-size:12px;
	}
	.btn-delete{
		font-size:13px;
		padding:5px 15px 5px 15px;
	}
	.wallet{
		font-size:14px;
		font-weight:600;
	}
	.buttoning {
		size: 12px;
		margin: -1px;
		font-size: x-small;
	}
	.btn-group-sm>.btn,
	.btn-sm {
		font-size: .875rem;
		border-radius: .2rem;
	}
	.row {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap;
	}
	.card img{
		width:100px;
	}
	.card-footer{
		background:white;
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
				<h1>Order Details</h1>
			</div>
		</div>
        <!--right-menu----------->
        <div class="right-menu">
            <a href="../user/profile.php" class="user">
                <em class="fa fa-bars"></em>
            </a>
        </div>
    </header>
	<div class="container">
		<div class="row">
		
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
			<div class="col-lg-6 col-md-6 pt-4">
				<div class="card my_card">
					<div class="card-body">
						<div class="d-flex mb-3 NU">
							<img class="img-thumbnail" src="../<?php echo $product_row['pr_image']; ?>" alt="Product Image">
							
							<h5 class="card-title pl-4 pt-4 h6"><?php echo $product_row['pr_name'];?></h5>
						</div>
						<div class="d-flex mb-3 product-price">
							<label class="form-control">Price/Quantity:
								<?php echo $order_pricing_array[$i]; ?>
							</label>
							&nbsp;&nbsp;&nbsp;
							<label class="form-control">Quantity:
								<?php echo $order_quantity_array[$i]; ?>
							</label>
							&nbsp;&nbsp;&nbsp;
							<label class="form-control">Delivery Charge: <?php ?>
						</label>
						</div>
					</div>
				</div>
			</div>
			<?php
				}
				$i++;
			}
			?>
		</div>
	</div>
</body>
</html>