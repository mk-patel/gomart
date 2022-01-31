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
		font-size:14px;
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
	.btn{
		padding:4px;
		padding-left:7px;
		padding-right:7px;
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
				<a href="../index.php" class="logo"><img src="../sys_images/logo.png" alt="logo"></a>
			</div>
			<div class="d-inline-block">
				<h1>Wallet</h1>
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
		if($user_wallet_owner==1){
			$wallet = "select user_wallet,user_wallet_expiry from user where user_id=$user_id";
			$wallet_result = mysqli_query($conn, $wallet);
			$wallet_row = mysqli_fetch_assoc($wallet_result);
			
	?>
		<div class="p-3 pt-5">
			<div class="h5"><img src='../sys_images/wallet.png' alt='wallet' style='width:30px;'> Wallet Cash</div>
			<div class="p-2" style="text-size:14px;">
				Wallet cash will provide you the facilities like free and fast delivery, <br/>
				it will also give you addtional discount on products and give you addtional cashback on order.<br/>
				Your wallet cash will be auto expired after 1 year of subscription.<br/>
			</div>
			<div class="pt-3 d-flex h6">
				<div class="pt-2 text-success">Cash: <b class="h5"><em class='fas fa-rupee-sign'></em> <?php echo $wallet_row['user_wallet'];?></b></div>
				<div class="pt-2 pl-2 text-danger">&nbsp; Valid Upto: <b class="h5"><?php echo $wallet_row['user_wallet_expiry'];?></b></div><br/>
			</div>
			<div class="pt-1 d-flex h6">
				<div class="pt-2"><a href="../wallet/wallet-request.php" class="border border-success rounded p-1">Requests</a></div><br/>
				<div class="pt-2 pl-2"><a href="../wallet" class="border border-warning rounded p-1">Recharge</a></div>
			</div>
		</div>
	<?php
		}else{
			
	?>
		<div class="p-3 pt-5">
			<div class="h5">Wallet Cash Facility</div>
			<div class="p-2 h6 ">
				Wallet cash will provide you the facilities like free and fast delivery, <br/>
				it will also give you addtional discount on products and give you addtional cashback on order.<br/>
				You will be able to use Singup Bonus after booking any of the wallet recharge plan.<br/>
			</div>
			<div class="d-flex h6">
				<div><a href="../wallet"><button class="btn btn-primary">Activate Now</button></a></div>
				<div class="pl-2"><a href="../wallet/wallet-request.php"><button class="btn btn-light border border-success rounded"><b>My Requests</b></a></button></div><br/>
			</div>
		</div>
	<?php
		}
	?>
	</div>
	<div class="container p-5">
	<div class="h5 pb-3">Wallet Cash History</div>
	<?php
		if($user_wallet_owner==1){
			$wallet_transaction = "select wtrsn_amount,wtrsn_date,wtrsn_type from wallet_transaction where wtrsn_user_id=$user_id order by wtrsn_id desc";
			$wallet_transaction_result = mysqli_query($conn, $wallet_transaction);
			if(mysqli_num_rows($wallet_transaction_result)<=0)
				echo "<div class='text-center p-4'>No History.</div>";
			else{
				while($wallet_transaction_row = mysqli_fetch_assoc($wallet_transaction_result)){
					if($wallet_transaction_row['wtrsn_amount'][0]=="+"){
						echo "
						<div class='p-3 mt-3 h6 w-100 rounded' style='background-color:#d4ffcf'>
							<div class='text-dark'>Rs. ".str_replace("+","",$wallet_transaction_row['wtrsn_amount'])." ".$wallet_transaction_row['wtrsn_type']." recieved.</div>
						</div>
						";
					}else{
						echo "
						<div class='p-3 mt-3 h6 w-100 rounded' style='background-color:#ffdbdc'>
							<div class='text-dark'>Rs. ".str_replace("-","",$wallet_transaction_row['wtrsn_amount'])." ".$wallet_transaction_row['wtrsn_type'].".</div>
						</div>
						";
					}
	?>
	<?php
		}
			}
		}
	?>
	</div>
</body>
</html>