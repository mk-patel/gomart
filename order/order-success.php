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
	
	$bill = "";
	if(isset($_POST["order_unique_id"])){
		$order_unique_id = mysqli_real_escape_string($conn, $_POST["order_unique_id"]);
		$order_product_id = mysqli_real_escape_string($conn, $_POST["order_product_id"]);
		$order_quantity = mysqli_real_escape_string($conn, $_POST["order_quantity"]);
		$order_pricing = mysqli_real_escape_string($conn, $_POST["order_pricing"]);
		$order_sum_amount = mysqli_real_escape_string($conn, $_POST["order_sum_amount"]);
		$order_sum_quantity = mysqli_real_escape_string($conn, $_POST["order_sum_quantity"]);
		$order_sum_wallet = mysqli_real_escape_string($conn, $_POST["order_sum_wallet"]);
		
		$address_fullname = mysqli_real_escape_string($conn, $_POST["full_name"]);
		$address_mobile = mysqli_real_escape_string($conn, $_POST["address_mobile"]);
		$address_city = mysqli_real_escape_string($conn, $_POST["address_city"]);
		$address_fulladdress = mysqli_real_escape_string($conn, $_POST["address_fulladdress"]);
		$address_postcode = mysqli_real_escape_string($conn, $_POST["address_postcode"]);
		$order_address = $_POST["full_name"].", ".$_POST["address_mobile"].", ".$_POST["address_city"].", ".$_POST["address_fulladdress"].", ".$_POST["address_postcode"];
		
		
		//inserting order details
		$place_order = "insert into orders (order_unique_id, order_product_id, order_pricing, order_quantity,
						order_sum_amount,order_sum_quantity,order_sum_wallet,
						order_address, order_user_id, order_date,order_user_status,order_status,cancellation_time)
						values ('$order_unique_id','$order_product_id','$order_pricing','$order_quantity',
						'$order_sum_amount','$order_sum_quantity','$order_sum_wallet',
						'$order_address','$user_id','$date','0','00','Not Cancelled Yet')";
		if(mysqli_query($conn, $place_order)){
			
			// checking that user is a wallet owner or not.
			if($user_wallet_owner==1){
				
				// Checking user wallet amount
				$user_wallet = "select user_wallet from user where user_id=$user_id";
				$user_wallet_result = mysqli_query($conn, $user_wallet);
				$user_wallet_row = mysqli_fetch_assoc($user_wallet_result);
				$user_wallet = $user_wallet_row['user_wallet'];
				
				// checking that user has suffcient amount of wallet cash;
				if($user_wallet!=0){
					
					//debiting wallet cash for order.
					$user_wallet_update = "update user set user_wallet=(user_wallet-".$order_sum_wallet.") where user_id=$user_id";
					mysqli_query($conn, $user_wallet_update);
					
					//updating wallet transaction details
					$wtrsn = "insert into wallet_transaction (wtrsn_amount,wtrsn_date,wtrsn_type,wtrsn_user_id)
					values ('-$order_sum_wallet','$date','debited for order','$user_id')";
					mysqli_query($conn, $wtrsn);
				}
				
				// selecting cashback for order
				$casback = "select cb_cash_order from cashback";
				$casback_result = mysqli_query($conn, $casback);
				$casback_row = mysqli_fetch_assoc($casback_result);
				$cashback = $casback_row['cb_cash_order'];
				
				//calculating cashback per 100 rs
				$cb = floor($order_sum_amount/100);
				$cb = $cb*$cashback;
			}
			
			//updating product stock details
			$product_ids = explode(",",$order_product_id);
			foreach ($product_ids as $pr_ids){
				$update_stock = "update product set pr_stock_count=pr_stock_count-1 where pr_id=$pr_ids";
				mysqli_query($conn, $update_stock);
			}
			
			
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
			$bill = "display:none";
		}
			
	}else{
		$msg = "Invalid";
		$background = "red";
		$bill = "display:none";
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
				<h1>Ordered Status</h1>
			</div>
		</div>
    </header>
	<div class="order-success p-4 ">
		<p class="h4 text-light"><?php echo $msg;?></p><br/>
		<p class="h6 text-light mt-2">Thankyou, something great will happen, just wait for some time...</p>
		<p class="h5 text-light mt-4">To see your order <b>go back</b> and click &nbsp; <em class="fa fa-bars"></em> &nbsp; icon, then go to <b>Orders</b>.</p>
	</div>

	<div class="container pt-4 pb-4">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-8 ">
				<div class="card my_card " style="background-color:#9dedf2">
					<div class="card-body">
						<div class="d-flex mb-3 NU">
							<div class="p-2 mr-auto h5"><b>Order Bill</b></div>
							
							<div class="p-2"><?php echo $date;?></div>
						</div>
						<div class="d-flex mb-3">
							<div class="p-2 mr-auto NU">Total Products :<b> <?php echo $order_sum_quantity;?></b></div>
						</div>
						 <div class="d-flex mb-3">
							<div class="p-2 mr-auto NU">Cash On Delivery :<b> Rs. <?php echo $order_sum_amount;?> only (Including Delivery Charges)</b></div>
						</div>
						<?php 
							if($user_wallet_owner==1 && $user_wallet!=0){
								echo "
									<div class='d-flex mb-3 NU name'>
										<div class='p-2 mr-auto'>Wallet Cash Used :
											<b> 
												Rs. ".$order_sum_wallet."
											</b>
										</div>
										<div class='p-2'>Cashback Won(will be credited after delivery):
											<b> 
												Rs. ".$cb."
											</b>
										</div>
									</div>";
							}
						?>
						<div class="d-flex mb-3 NU name">
							<div class="p-2 mr-auto">Order Address :<b> <?php echo $order_address;?></b></div>
						</div>
						<div class="d-flex mb-3 NU name">
							<div class="p-2 mr-auto">Order Id :<b> <?php echo $order_unique_id;?></b></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>