<?php
	/*
	* This page confirms wallet booking.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	
	if(isset($_REQUEST['wlt_id'])){
		$wlt_id = $_REQUEST['wlt_id'];
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
		.card img{
			width:50px;
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
                <a href="" class="logo"><img src="../sys_images/logo.png" alt="logo"></a>
            </div>
            <div class="d-inline-block">
                <h1>Confirm Booking</h1>
            </div>
        </div>
        <!--right-menu----------->
        <div class="right-menu">
            <a href="../login/logout.php">
                <em class="fa fa-sign-out"> Log Out</em>
            </a>
        </div>
    </header>
	<div class="p-4 add-n">
		Note: It is not cancellable.
	</div>
    <div class="container pt-4">
		<div class="row">
		<?php
			$wallet = "select wlt_id, wlt_rupees, wlt_amount from wallet where wlt_id=$wlt_id";
			$wallet_result = mysqli_query($conn, $wallet);
			if(mysqli_num_rows($wallet_result)<=0)
				echo "<div class='text-center p-4'>No Requests.</div>";
			else{
				while($wallet_row=mysqli_fetch_assoc($wallet_result)){
		?>
			<div class="col-lg-6 col-md-6">
				<div class="card my_card">
					<div class="card-body">
						<div class="d-flex mb-3 NU wltdata">
							<img class="card-img-top" src="../sys_images/wallet.png" alt="wallet">
							
							<h5 class="card-title pl-4 pt-4">On Rs. <b><?php echo $wallet_row['wlt_rupees'];?></b></h5>
							<h5 class="card-title pl-4 pt-4">You Will Get Wallet Cash Rs. <b><?php echo $wallet_row['wlt_amount'];?></b></h5>
						</div>
						<div class="card-footer">
							 <div class="d-flex mb-1 buttoning">
								<div class="p-1 mr-auto">
									<button id="cnfbk" value="<?php echo $wallet_row['wlt_id'];?>" class="btn btn-sm btn-warning text-dark" id="left" style="color:white">
										Confirm Your Booking
									</button>
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
	<script>
	$(document).ready(function(){
		$(document).on("click", "#cnfbk", function(){
			var wlt_id = $("#cnfbk").val();
					
			$.ajax({
				url:"book-wallet.php",
				method:"post",
				data:{
					wlt_id:wlt_id,
				},
				success:function(response){
					$("#cnfbk").html(response);
					document.getElementById("cnfbk").disabled=true;
				},
			});
		});
	});
	</script>
</body>
</html>