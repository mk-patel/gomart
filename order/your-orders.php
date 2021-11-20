<?php
	/*
	* This page displayes orders.
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
	.product-desc{
		background-image:linear-gradient(to bottom,  #ffb5ea , white);
	}
	.product-name{
		font-size:14px;
		font-weight:500;
	}
	.details{
		font-size:12px;
		color:purple;
	}
	.cancel-button{
		font-size:13px;
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
				<h1>Your Orders</h1>
			</div>
		</div>
        <!--right-menu----------->
        <div class="right-menu">
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
	<div class="container">
	<?php
	
	// fetching pricing details of the product id.
	$order = "select order_id, order_unique_id, order_pricing, order_quantity, order_date, order_user_status, order_status from orders where order_user_id=$user_id order by order_id desc";
	$order_result = mysqli_query($conn, $order);
	$disable="";
	$msg = "Cancel Order";
		if(mysqli_num_rows($order_result) <= 0){
			echo "<div class='p-3 bg-danger text-center'>Sorry, You don't have any orders.</div>";
			$disable="disabled";
		}
		else{
			$disable="";
			while($order_row = mysqli_fetch_assoc($order_result)){
				if($order_row['order_user_status']==1){
					$disable="disabled";
					$msg = "Cancelled";
				}
				else{
					$disable="";
					$msg = "Cancel Order";
				}
	?>
		<div class="row d-flex justify-content-center cart-body p-3 border-bottom">
			<div class="p-5 product-desc rounded">
				<a href="order-details.php?oid=<?php echo $order_row['order_id']; ?>">
					<div class="pb-1 text-dark product-name">
						<p class="details text-">Order ID : <?php echo $order_row['order_unique_id']; ?></p>
						<p class="h6">Order Date : <?php echo $order_row['order_date']; ?></p>
						<p class="details">Pricing  : <?php echo $order_row['order_pricing']; ?></p>
						<p class="details">Quantity  : <?php echo $order_row['order_quantity']; ?></p>
						<p class="bg-secondary text-light p-2 ">Status  : <?php echo $order_row['order_status']; ?></p>
					</div>
				</a>
				<div class="row text-light product-action">
					<button <?php echo $disable;?> id="cancel" value="<?php echo $order_row['order_id']; ?>" class="btn btn-warning cancel-button"><?php echo $msg;?></button>
				</div>
			</div>
		</div>
		<?php
			}
		}
		?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script>
	$(document).ready(function () {
		$(document).on("click", "#cancel", function (){
			var order_id = $(this).val();
			$.ajax({
				url : "cancel-order.php",
				method : "post",
				data : {
					order_id : order_id
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
					location.reload();
				}
			});
			
			
		});
	});
	
	</script>
</body>
</html>