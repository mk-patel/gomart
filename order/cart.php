<?php
	/*
	* This page displayes cart products.
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
				<h1>Cart</h1>
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
	
		<form class="form" action="address-interface.php" method="get">
			<div class="row">
			<?php
			
			//for delete request.
			if(isset($_REQUEST['delid'])){
				$delid = $_REQUEST['delid'];
				$delete = "delete from cart where (cart_id=$delid and cart_user_id=$user_id)";
				mysqli_query($conn, $delete);
				echo "<script> alert('Successfully Deleted');</script>";
			}
			
			// fetching pricing details of the product id.
			$cart = "select cart_id,pr_id, pr_name, pr_effective_price,pr_image from cart c 
					inner join product p where (cart_pr_id=pr_id and cart_user_id=$user_id)";
			$cart_result = mysqli_query($conn, $cart);
				if(mysqli_num_rows($cart_result) <= 0){
					echo "<div class='p-3 text-center'>Sorry, You have choosed nothing.</div>";
					$disable="disabled";
				}
				else{
					$disable="";
					while($cart_row = mysqli_fetch_assoc($cart_result)){
					
			?>

				<div class="col-lg-6 col-md-6 pt-4">
					<div class="card my_card">
						<div class="card-body">
							<div class="d-flex mb-3 NU">
								<img class="img-thumbnail card-img-top" src="../<?php echo $cart_row['pr_image'];?>" alt="Card image cap">
								
								<h5 class="card-title pl-4 pt-4 h6"><?php echo $cart_row['pr_name'];?></h5>
							</div>
							<div class="d-flex mb-3 product-price">
								<label class="form-control">Price/Quantity
									<select class="rounded" name="price[]">
										<?php
										echo "<option value='". $cart_row['pr_effective_price']."'> Rs. ".$cart_row['pr_effective_price']." </option>";
										?>
									</select>
								</label>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<label class="form-control">Quantity
									<select class="select-field rounded ml-2" name="quantity[]">
										<option value="1">&nbsp;&nbsp;1&nbsp;&nbsp;</option>
										<option value="2">&nbsp;&nbsp;2&nbsp;&nbsp;</option>
										<option value="3">&nbsp;&nbsp;3&nbsp;&nbsp;</option>
										<option value="4">&nbsp;&nbsp;4&nbsp;&nbsp;</option>
										<option value="5">&nbsp;&nbsp;5&nbsp;&nbsp;</option>
									</select>
								</label>
							</div>
							<div class="card-footer">
								 <div class="d-flex buttoning">
									<div class=" mr-auto">
										<input type="hidden" name="pr_id[]" value="<?php echo $cart_row['pr_id'];?>">
										<a href="cart.php?delid=<?php echo $cart_row['cart_id'];?>" class="btn btn-warning btn-delete">Delete</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
					}
				}
				?>	
			</div>
			<div class="pt-4"></div>
			<div class="cart-proceed mb-3">
				<button  <?php echo $disable;?> type="submit" name="submit" id="submit" class="cart-proceed btn btn-success text-light float-right">Proceed</button>
			</div>
		</form>
	</div>
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