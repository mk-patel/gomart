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
	
	if(isset($_REQUEST['oid'])){
		$oid = $_REQUEST['oid'];
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
	.row{
		<?php echo $bill;?>;
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
				<h1>Order Billing</h1>
			</div>
		</div>
    </header>
	<?php
		$order_select = "select order_unique_id,order_sum_amount,order_sum_quantity,order_sum_wallet,order_address,order_date,cb_cash_order from orders 
		inner join cashback on cb_id=1
		where order_id=$oid";
		$order_result = mysqli_query($conn, $order_select);
		if(mysqli_num_rows($order_result) <= 0){
			echo "<div class='p-3 bg-danger text-center'>Sorry, You don't have any orders.</div>";
		}else{
			$order_row = mysqli_fetch_assoc($order_result);
	?>
	<div class="container pt-4 pb-4">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-8 ">
				<div class="card my_card " style="background-color:#9dedf2">
					<div class="card-body">
						<div class="d-flex mb-3 NU">
							<div class="p-2 mr-auto h5"><b>Order Bill</b></div>
							
							<div class="p-2"><?php echo $order_row['order_date'];?></div>
						</div>
						<div class="d-flex mb-3">
							<div class="p-2 mr-auto NU">Total Products :<b> <?php echo $order_row['order_sum_quantity'];?></b></div>
						</div>
						 <div class="d-flex mb-3">
							<div class="p-2 mr-auto NU">Cash On Delivery :<b> Rs. <?php echo $order_row['order_sum_amount'];?> only (Including Delivery Charges)</b></div>
						</div>
						<?php 
							if($user_wallet_owner==1){
								echo "
									<div class='d-flex mb-3 NU name'>
										<div class='p-2 mr-auto'>Wallet Cash Used :
											<b> 
												Rs. ".$order_row['order_sum_wallet']."
											</b>
										</div>
										<div class='p-2'>Cashback Won(will be credited after delivery):
											<b> 
												Rs. ".($order_row['cb_cash_order']*floor($order_row['order_sum_amount']/100))."
											</b>
										</div>
									</div>";
							}
						?>
						<div class="d-flex mb-3 NU name">
							<div class="p-2 mr-auto">Order Address :<b> <?php echo $order_row['order_address'];?></b></div>
						</div>
						<div class="d-flex mb-3 NU name">
							<div class="p-2 mr-auto">Order Id :<b> <?php echo $order_row['order_unique_id'];?></b></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		}
	?>
</body>
</html>