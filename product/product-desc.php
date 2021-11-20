<?php
	/*
	* This page displayes all products.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	
	if(isset($_REQUEST["pid"])){
		$pr_id = $_REQUEST["pid"];
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
		background-image: url("../sys_images/bg.jpeg");
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
		color:#fc8a17;
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
		width:300px;
		height:auto;
	}
	.sub-head{
		color:#8c0766;
		font-weight:600;
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
		width:380px;
	}
	.search-result{
		font-size:13px;
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
	.product-img{
			margin-top:50px;
		}
	@media(max-width:700px){
		.product-img{
			margin-top:0px;
		}
		.product-img img{
			width: 100%; 
			height:auto;
		}
		h1{
			font-size:16px;
			margin-left:10px;
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
	}
	.product-name{
		font-size:16px;
		font-weight:500;
	}
	.product-offers{
		font-size:14px;
	}
	.product-delivery{
		font-size:14px;
	}
	.product-details{
		font-size:13px;
	}
	.wallet{
		font-size:14px;
		font-weight:700;
		padding:3px;
		background:white;
		color:green;
		border-radius:5px;
	}
	@media(max-width:520px){
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
				<h1>Product Details</h1>
			</div>
			<span class="p-1 ml-2 search-bar-header">
				<input class="rounded search-input" type="text" name="search-header" id="search" placeholder="&nbsp;&nbsp;Search">
			</span>
		</div>
        <!--right-menu----------->
        <div class="right-menu">
			 <a href="../order/cart.php" class="cart">
                <em class="fas fa-shopping-cart">
                </em>
            </a>
            <a href="../user/profile.php" class="user">
                <em class="fa fa-bars"></em>
            </a>
           
        </div>
    </header>
	<div class="pt-1 search-bar">
		<input class="rounded search-input" type="text" name="search" id="search-header" placeholder="&nbsp;&nbsp;Search">
	</div>
	<div class="search-result col-5 pb-3 text-center" id="search-result">
		<!-- Here autocomplete list will be display -->
	</div>
	<?php
		
		// fetching all data of products.
		$product = "select pr_id, pr_name, pr_actual_price, pr_effective_price,pr_wallet_disc,
		pr_discount, pr_desc, pr_offers, pr_returns, pr_image,dlr_charge,dlr_time,rt_time from product
		inner join delivery on dlr_loc_id=$user_loc_id
		inner join returns on rt_loc_id=$user_loc_id
		where pr_id=$pr_id";
		$product_result = mysqli_query($conn, $product);
		if(mysqli_num_rows($product_result) <= 0)
			echo "<div class='p-3 bg-danger text-center'>Sorry, it will available soon.</div>";
		else{
			$product_row = mysqli_fetch_assoc($product_result);
	?>
	<div class="container">
		<div class="row product pt-3">
			<div class="col-sm-6 product-img">
				<img class="img-thumbnail float-right" src="../<?php echo $product_row['pr_image'];?>" alt="Product Image">
			</div>
			<div class="p-5 pt-3 col-sm-6 product-desc">
				<div class="row border-bottom pb-2 text-dark product-name">
					<p class="h6"><?php echo $product_row['pr_name'];?></p>
					
				</div>
				<div class=" text-secondary pt-2 pb-2 product-offers">
					<p class="h6 sub-head">Offers</p>
					<b>
						<?php 
						if($product_row['pr_offers']!=0){
							echo $product_row['pr_offers'];
						}
						?>
					</b>
				</div>
				<div class="row product-price">
					<span class="bg-success p-2 rounded text-light actual-price">Rs.&nbsp; 
						<?php echo $product_row['pr_effective_price'];?>
					</span> <del class="p-2 old-price">Rs. <?php echo $product_row['pr_actual_price'];?></del><span class="p-2  text-danger percent-off"><?php echo $product_row['pr_discount'];?>% off</span>
				</div>
				<?php
					if($user_wallet_owner==1){
						if($product_row['pr_wallet_disc']!=0){
							echo "
								<div class='row wallet mt-2 p-3'>
									<img src='../sys_images/wallet.png' alt='Logo' style='width:20px;'>&nbsp;&nbsp;From Wallet&nbsp;&nbsp;<b>".$product_row['pr_wallet_disc']."</b>		
								</div>";
						}else{
							echo "";
						}
					}else{
						echo "
							<div class='row wallet mt-2 p-3'>
								<img src='../sys_images/wallet.png' alt='Logo' style='width:20px;'>&nbsp;&nbsp;Become a Diamond Member to get discount of extra Rs. ".$product_row['pr_wallet_disc']."
							</div>";
					}
				?>
				<div class="pt-3 text-dark border-bottom pb-3 text-dark product-delivery">
					<p class="h6 sub-head">Delivery</p>
					<b>By :  
					<?php 
					if($product_row['dlr_time'] =='0'){
						echo "Soon";
					}else{
						echo $product_row['dlr_time'];
					}
					?>
					<br/>
					<?php 
					if($product_row['dlr_charge'] == '0'){
						echo "Free Delivery - Limited Offer";
					}else{
						echo "Delivery Charge Rs. ".$product_row['dlr_charge']." Only";
					}	
					?></b>
					<br/>
					<br/>
					<p class="h6 sub-head">Returns</p>
					<b><?php 
					if($product_row['rt_time'] == '0'){
						echo "No Returns Available";
					}
					else{
						echo $product_row['rt_time'];
					}
					?></b>
				</div>
				<div class="row wallet mt-2 p-3">
					<?php
						if($user_wallet_owner==1 && $product_row['pr_wallet_disc']!=0){
							echo "Only Pay Rs. ".($product_row['pr_effective_price']-$product_row['pr_wallet_disc']);		
						}else{
							echo "Total Rs. ".$product_row['pr_effective_price'];
						}
					?>
				</div>
				<div class="pt-4 d-flex justify-content-start">
					<div class="product-buy">
						<a class="bg-warning btn p-1 pl-3 pr-3 h6 rounded" href="../order/direct-buy.php?pid=<?php echo $product_row['pr_id'];?>">
							<b id="notify">Buy Now</b>
						</a>
					</div>
					<div class="">
						&nbsp;&nbsp;&nbsp;&nbsp;
					</div>
					<div class="product-cart">
						<button id="add-cart" class="btn-warning btn p-1 pl-3 pr-3 h6 rounded">
							<b>Add to Cart</b>
						</button>
					</div>
				</div>
				<div class="rounded text-dark p-2 pt-4 pb-5 product-details">
					<p class="h6 sub-head">More Details</p>
					<?php 
					if($product_row['pr_desc']=='0'){
						echo "Details will be available soon.";
					}else
						echo $product_row['pr_desc'];
					?>
					<br/>
					<br/>
					<br/>
				</div>
			</div>
		</div>
	</div>
	<?php
		}
	?>
	<div class="pt-5"></div>
	<div class="p-2 whatsapp fixed-bottom">
		Have a query? Send Message <img src="../sys_images/whatsapp.png"> 1234567890
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	
	<script>
	$(document).ready(function () {
		$(document).on("click", "#notify", function(){
			document.getElementById("notify").innerHTML="Please Wait";
		});
		$(document).on("click", "#add-cart", function (){
			var pr_id = <?php echo $product_row['pr_id'];?>;
			$.ajax({
				url : "add-cart.php",
				method : "post",
				data : {
					pr_id : pr_id
				},
				success : function(response){
					alert("Added To Cart Successfully");
					document.getElementById("add-cart").disabled=true;
					$("#add-cart").html(response);
				}
			});
			
			
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
			  url: "../search/search-from-product.php",
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
			  url: "../search/search-from-product.php",
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
</body>
</html>