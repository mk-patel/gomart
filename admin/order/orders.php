<?php
	/*
	* This page displayes all orders.
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

        .home-body-content,
        .default-body-content {
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .default-body-content .list-group .list-group-item h3 {
            font-size: 1.3em;
        }

        .default-body-content .list-group a {
            color: black;
            padding-top: 20px;
        }

        .home-body-content .my_card {
            margin-bottom: 25px;
            transition-duration: 0.4s;
        }

        .my_card:hover {
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.3);
            transition-duration: 0.4s;
        }

        .my_card {
            padding: 16px;
            margin: 12px;
        }

        .NU {
            margin: -7px;
            font-size: 13px;
        }

        .DG {
            margin: -7px;
            font-size: 12px;
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

            h1 {
                font-size: 16px;
                margin-left: 10px;
            }
			.search-input{
				width:240px;
			}
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
                <a href="#" class="logo"><img src="../../sys_images/logo.png" alt="logo"></a>
            </div>
            <div class="d-inline-block">
                <h1>Orders</h1>
            </div>
			<span class="p-1 ml-2 search-bar-header">
				<input class="rounded search-input" type="text" name="search-header" id="search" placeholder="&nbsp;&nbsp;Search Orders">
			</span>
        </div>
        <!--right-menu----------->
        <div class="right-menu">
            <a href="../login/logout.php" class="fa fa-sign-out">
                <span aria-hidden="true">Log Out</span>
            </a>
        </div>
    </header>
	<div class="pt-1 search-bar">
		<input class="rounded search-input" type="text" name="search" id="search-header" placeholder="&nbsp;&nbsp;Search Orders">
	</div>
    <!--Body----------->
    <section class="home-body-content">
        <div class="container">
            <div class="row">
			<?php
				$order_select = "select order_id, order_unique_id, order_product_id, order_quantity, order_pricing, order_address, order_date, order_user_status, order_status from orders order by order_id desc";
				$order_result = mysqli_query($conn, $order_select);
				if(mysqli_num_rows($order_result)<=0){
					echo "No orders yet.";
				}else{
					while($order_row = mysqli_fetch_assoc($order_result)){
						$status_id = $order_row['order_status'];
						$user_status_id = $order_row['order_user_status'];
						
						
						if($status_id==0){
							$button = '<div class="accept mr-auto">
                                    <a href="order-status.php?oid='.$order_row['order_id'].'&st=1"><button class="btn btn-sm btn-success" id="left" style="color:white">
                                        Accept
                                    </button></a>
                                </div>';
							$disable = "";
							$order_status="Order Placed.";
							$bg = "white";
						}
						else if($status_id==1){
							$button = '<div class="deliver mr-auto">
                                    <a href="order-status.php?oid='.$order_row['order_id'].'&st=11"><button class="btn btn-sm btn-success" id="left" style="color:white">
                                        Delivered
                                    </button></a>
                                </div>';
							$disable = "";
							$order_status="On The Way";
							$bg = "#ffffb5";
						}
						else if($status_id==11){
							$button = '';
							$disable = "disabled";
							$order_status="Delivered.";
							$bg = "#bbffb5";
						}
						else{
							$button='';
							$disable = "disabled";
							$order_status="Unable to deliver on this address.";
							$bg = "#ffb5b5";
						}
						if($user_status_id ==1){
							$order_user_status="Cancelled By User";
							$bg = "#ffb5b5";
							$button = '';
							$disable = "disabled";
						}
						else{
							$order_user_status="Not Cancelled";
						}
						
			?>
			<a href="order-details.php?oid=<?php echo $order_row['order_id'];?>">
                <div class="col-lg-4 col-md-4">
                    <div class="card my_card" style="background-color:<?php echo $bg;?>">
                        <div class="card-body">
                            <div class="d-flex mb-3 NU">
                                <div class="p-2 mr-auto">Order ID :<b> <?php echo $order_row['order_unique_id'];?></b></div>
                                <div class="p-2">SID :<b> <?php echo $order_row['order_id'];?></b></div>
                            </div>
                            <div class="d-flex mb-3">
                                <div class="p-2 mr-auto NU">Products :<b> <?php echo $order_row['order_quantity'];?></b></div>
                            </div>
							 <div class="d-flex mb-3">
                                <div class="p-2 mr-auto NU">Order Pricing :<b> <?php echo $order_row['order_pricing'];?></b></div>
                            </div>
                            <div class="d-flex mb-3 NU name">
                                <div class="p-2 mr-auto">Order Address :<b> <?php echo $order_row['order_address'];?></b></div>
                            </div>
                            <div class="d-flex mb-3 NU name">
                                <div class="p-2 mr-auto">Order Date :<b> <?php echo $order_row['order_date'];?></b></div>
                            </div>
                            <div class="d-flex mb-3 NU name">
                                <div class="p-2 mr-auto">User's Status :<b> <?php echo $order_user_status;?></b></div>
                            </div>
							<div class="d-flex mb-3 NU name">
                                <div class="p-2 mr-auto">Delivery Status :<b> <?php echo $order_status;?></b></div>
                            </div>
                            <div class="d-flex mb-3 buttoning">
								<?php
								echo $button;
								?>
                                <div class="pl-2">
                                    <a href="order-status.php?oid=<?php echo $order_row['order_id'];?>&st=10"><button <?php echo $disable;?> class="btn btn-sm btn-danger" id="right" style="color:white">
                                        Reject
                                    </button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</a>
			<?php
				}
			}
			?>
            </div>
        </div>
    </section>
    <!-- body content -->

		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#search").keyup(function(){
				$('.row').html('')
			  $.ajax({
				type:'POST',
				url:'search-orders.php',
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
				url:'search-orders.php',
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