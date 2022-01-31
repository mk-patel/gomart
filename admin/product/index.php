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
        body {
            font-family: poppins;
            margin: 0px;
            padding: 0px;
            font-family: poppins;
            background-color: #ffffff;
        }
        * {
            box-sizing: border-box;
        }
        a {
            text-decoration: none;
            color: black;
        }
        a:hover {
            text-decoration: none;
            color: black;
        }
        nav {
            width: 100%;
            box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.05);
            z-index: 100;
        }
        .navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px;
        }
        h1 {
            font-size: 18px;
            margin-left: 10px;
        }
        h2 {
            font-size: 16px;
        }
        h5 {
            font-size: 13px;
        }
        .logo {
            width: 200px;
            margin-left: 10px;
        }
        .logo img {
            height: 40px;
            width: 40px;
        }
        .right-menu a {
            margin: 0px 10px;
            font-size: 1.2rem;
            color: rgba(0, 0, 0, 0.7);
        }
        .right-menu a:hover {
            color: #0b9d8a;
            transition: all ease 0.3s;
        }
        .allpo {
			background-color: rgb(99, 167, 231);
			color: white;
			padding: 5px;
		}
        @keyframes fade {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
        .fix-nav {
            width: 100%;
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            left: 0px;
            background-color: #ffffff;
            box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.05);
            z-index: 102;
        }
        .product-img {
            text-align: center;
        }
        .product-img img {
            width: 90px;
            height: 90px;
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
		.search-bar{
			display:none;
		}
		.search-input{
			border: 2px solid #ffb5ea;
			width:400px;
		}
        @media(max-width:1000px) {
            nav {
                position: relative;
            }

            .navigation {
                height: 50px;
            }

            .fix-nav {
                height: 50px;
            }
            .menu {
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

            .fix-nav .menu {
                top: 50px;
            }

            .navigation.active .menu {
                display: block;
            }
        }

        @media(max-width:700px) {
            .product-img img {
                width: 90px;
                height: 90px;
            }
            h1 {
                font-size: 16px;
                margin-left: 10px;
            }
            h2 {
				font-size: 16px;
			}
			h3 {
				font-size: 13px;
			}
			.search-input{
				width:240px;
			}
        }
        .cart-body {
            background: #c9ffd1;
        }
		.imp-info{
			font-size:14px;
			font-weight:600;
		}
		.other-info{
			font-size:13px;
		}
		@media(max-width:550px){
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
                <a href="" class="logo"><img src="../../sys_images/logo.png" alt="logo"></a>
            </div>
            <div class="d-inline-block">
                <h1>All Products</h1>
            </div>
			<span class="p-1 ml-2 search-bar-header">
				<input class="rounded search-input" type="text" name="search-header" id="search" placeholder="&nbsp;&nbsp;Search Products">
			</span>
        </div>
        <!--right-menu----------->
        <div class="right-menu">
            <a href="../login/logout.php">
                <em class="fa fa-sign-out"> Log Out</em>
            </a>
        </div>
    </header>
	<div class="pt-1 search-bar">
		<input class="rounded search-input" type="text" name="search" id="search-header" placeholder="&nbsp;&nbsp;Search Products">
	</div>
	<div class="p-4 text-center add-n">
		<a href="new-product.php"><button class="btn btn-primary"><b>+</b> Add New Product </button></a>
	</div>
    <div class="container pt-4">
		<div class="row">
		<?php
			$product = "select pr_id, pr_name, pr_effective_price, pr_discount, pr_wallet_disc, pr_stock_count, pr_image from product order by pr_id desc";
			$product_result = mysqli_query($conn, $product);
			if(mysqli_num_rows($product_result)<=0)
				echo "<div class='text-center p-4'>No data.</div>";
			else{
				while($product_row=mysqli_fetch_assoc($product_result)){
		?>
			<div class="col-lg-6 col-md-6">
				<div class="card my_card">
					<div class="card-body">
						<div class="d-flex mb-3 NU">
							<img class="card-img-top" src="../../<?php echo $product_row['pr_image'];?>" alt="Card image cap">
							
							<h5 class="card-title pl-4 pt-4">ID:<?php echo $product_row['pr_id'];?></h5>
							<h5 class="card-title pl-4 pt-4"><?php echo $product_row['pr_name'];?></h5>
						</div>
						<div class="d-flex mb-3">
							<h5 class="card-title">Rs. <?php echo $product_row['pr_effective_price'];?></h5>
							<h5 class="card-title ml-5">Discount : <?php echo $product_row['pr_discount'];?></h5>
							<h5 class="card-title ml-5">From Wallet : <?php echo $product_row['pr_wallet_disc'];?></h5>
							<h5 class="card-title ml-5">Stock : <?php echo $product_row['pr_stock_count'];?></h5>
						</div>
						<div class="card-footer">
							 <div class="d-flex mb-1 buttoning">
								<div class="p-1 mr-auto">
									<a href="edit-product-interface.php?pid=<?php echo $product_row['pr_id'];?>"><button class="btn btn-sm btn-warning text-dark" id="left" style="color:white">
										Edit
									</button></a>
								</div>
								<div class="p-1">
									<a href="delete-product.php?pid=<?php echo $product_row['pr_id'];?>"><button class="btn btn-sm btn-danger" id="right" style="color:white">
										Delete
									</button></a>
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
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#search").keyup(function(){
				$('.row').html('')
			  $.ajax({
				type:'POST',
				url:'search-products.php',
				data:{
				  name:$("#search").val(),
				},
				success:function(data){
				  $(".row").html(data);
				}
			  });
			});
			$("#search-header").keyup(function(){
				$('.row').html('')
			  $.ajax({
				type:'POST',
				url:'search-products.php',
				data:{
				  name:$("#search-header").val(),
				},
				success:function(data){
				  $(".row").html(data);
				}
			  });
			});
		});
	</script>
</body>

</html>