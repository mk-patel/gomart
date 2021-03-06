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
	
	if(isset($_REQUEST["q"])){
		$text = $_REQUEST["q"];
	}
	
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
	.advertisement{
		text-align:center;
		width:100%;
		height:200px;
	}
	.advertisement img{
		width:auto;
		height:200px;
	}
	.categories-title{
		padding:10px;
		background:purple;
		color:white;
		font-size:15px;
		font-weight:500;
	}
	.categories{
		padding:10px;
	}
	.product{
		padding:10px;
		box-shadow:5px 5px 5px 5px rgba(0,0,0,0.05);
		background:white;
		text-align:center;
	}
	.product-img img{
		width: 250px; 
		height:250px;
	}
	.product-desc{
		text-align:center;
		margin-top:15px;
		font-size:12px;
		font-weight:500;
	}
	.product:hover{
		box-shadow:3px 3px 15px 2px lightblue;
	}
	.add-cart{
		font-size:12px;
		padding:5px;
		font-weight:600;
	}
	
	.whatsapp{
		width:100%;
		background:lightgreen;
		font-size:13px;
	}
	.whatsapp img {
		width:30px;
		height:30px;
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
		.advertisement img{
			width:100%;
			height:200px;
		}
		.product-img img{
			width: 200px; 
			height:200px;
		}
	}
	@media(max-width:700px){
		.product-img img{
			width: 120px; 
			height:120px;
		}
		h1{
			font-size:16px;
			margin-left:10px;
		}
	}
	.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		padding-top: 100px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	.modal-content {
	  background-color: #fefefe;
	  margin: auto;
	  padding: 20px;
	  border: 1px solid #888;
	  width: 80%;
	}

	.close {
	  color: #aaaaaa;
	  float: right;
	  font-size: 28px;
	  font-weight: bold;
	}

	.close:hover,
	.close:focus {
	  color: #000;
	  text-decoration: none;
	  cursor: pointer;
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
				<h1>Search Results</h1>
			</div>
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
	<div id="myModal" class="modal">
		<!-- Modal content -->
		<div class="modal-content">
			<span class="close">&times;</span>
			<p id="responseAlert"></p>
		</div>
	</div>
	<div class="advertisement">
		<img src="../sys_images/ads.jpg" width="auto" height="100%" alt="Self Advertisement"/>
	</div>
	<div class="categories-title">
	Results for : <?php echo $text; ?>
	</div>
	<div class="row categories">
		<?php
		
			// fetching some data of products.
			$product = "select pr_id, pr_name, pr_effective_price, pr_actual_price, pr_discount, pr_image from product 
			where ( pr_name like '%$text%' or pr_effective_price like '%$text%' or pr_discount like '%$text%') order by pr_id desc";
			$product_result = mysqli_query($conn, $product);
			if(mysqli_num_rows($product_result) <= 0)
				echo "<div class='p-3 bg-danger ml-4 text-center'>No Products, It will available soon.</div>";
			else{
				while($product_row = mysqli_fetch_assoc($product_result)){
		?>
		<div class="col mt-3">
			<div class="product">
				<a href="product-desc.php?pid=<?php echo $product_row['pr_id'];?>">
					<div class="product-img">
						<img src="../<?php echo $product_row['pr_image'];?>" alt="Product">
					</div>
				</a>
				<div class="product-desc p-2 mt-3">
					<a href="product-desc.php?pid=<?php echo $product_row['pr_id'];?>">
						<p><span class="p-1 text-dark"><?php echo $product_row['pr_name'];?></p>
						<p><span class="bg-success p-1 text-light rounded">Rs. <?php echo $product_row['pr_effective_price_1'];?></p>
						<p><span class="p-1 text-danger"><del>Rs. <?php echo $product_row['pr_actual_price'];?></del></span><span class="p-1 text-success h-6"><?php echo $product_row['pr_discount'];?> % Off</span></p>
					</a>
					<button id="add-cart" value="<?php echo $product_row['pr_id'];?>" class="btn btn-warning text-dark pl-3 pr-3 rounded add-cart">Add to Cart +</button>
				</div>
			</div>
		</div>
		<?php
			}
		}
		?>
	</div>
	<div class="pt-5"></div>
	<div class="p-2 whatsapp fixed-bottom">
		Have a query? Send Message <img src="../sys_images/whatsapp.png"> 6267221568
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	
	<script>
	$(document).ready(function () {
		$(document).on("click", "#add-cart", function (){
			var pr_id = $(this).val();
			$.ajax({
				url : "add-cart.php",
				method : "post",
				data : {
					pr_id : pr_id
				},
				success : function(response){
					var span = document.getElementsByClassName("close")[0];
					var modal = document.getElementById("myModal");
					$("#responseAlert").html(response);
					modal.style.display = "block";
					// When the user clicks on <span> (x), close the modal
					span.onclick = function() {
					  modal.style.display = "none";
					}
					// When the user clicks anywhere outside of the modal, close it
					window.onclick = function(event) {
					  if (event.target == modal) {
						modal.style.display = "none";
					  }
					}
				}
			});
			
			
		});
	});
	
	</script>
</body>
</html>