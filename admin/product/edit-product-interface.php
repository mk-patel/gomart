<?php
	/*
	* This page Edits product details.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';

	if(isset($_REQUEST['pid'])){
		$pr_id = $_REQUEST['pid'];
	}
	else{
		header('location:../index.php');
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
    <link rel="shortcut icon" href="../../sys_images/logo.png" />
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
	/* .fa-shopping-cart{
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
	} */
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
	.lable-title{
		font-size:14px;
	}
	.order-book{
		background:lightblue;
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
				<a href="#" class="logo"><img src="../../sys_images/logo.png" alt="logo"></a>
			</div>
			<div class="d-inline-block">
				<h1>Edit Product</h1>
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
		<div class="pt-5">
			Note : Image size should be in <b>Square</b> and less then <b>200 kb</b>
		</div>
		<?php
			$product = "select pr_id, pr_name, pr_actual_price, pr_unit_actual, pr_effective_price, pr_unit_effective, pr_discount, pr_wallet_disc,
						pr_desc, pr_offers, pr_category, pr_returns, pr_status, pr_stock_count, pr_image from product where pr_id=$pr_id";
			$product_result = mysqli_query($conn, $product);
			if(mysqli_num_rows($product_result)<=0){
				echo "No data";
			}
			else{
				$product_row = mysqli_fetch_assoc($product_result);
				if($product_row['pr_status']==1)
					$pr_status="In Stock";
				else
					$pr_status="Out of Stock";
		?>
		<form id="add_new_products" autocomplete="on" enctype="multipart/form-data">
			<div class="address-body p-3 ">
				<div class="form-group pt-4">
					<label for="uname" class="lable-title"><b>Service Location *</b></label>
                    <select class="custom-select" name="pr_loc_id" id="pr_loc_id" required>
					<?php
						$select = "select loc_id,loc_name,loc_district,loc_state,loc_pincode from service_location";
						$select_result = mysqli_query($conn, $select);
						if(mysqli_num_rows($select_result)<= 0){
							echo "No categories yet.";
						}else{
							while($loc_row = mysqli_fetch_assoc($select_result)){
					?>
						<option value="<?php echo $loc_row['loc_id'];?>"> <?php echo $loc_row['loc_name'].", ".$loc_row['loc_district'].", ".$loc_row['loc_state'].", ".$loc_row['loc_pincode'];?> </option>
					<?php
							}
						}
					?>
					</select>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname" class="lable-title"><b>Category</b></label>
                    <select class="custom-select" name="pr_category" id="pr_category" required>
						<?php
							$select = "select ct_id, ct_name from categories where ct_id=".$product_row['pr_category'];
							$select_result = mysqli_query($conn, $select);
							$ct_row = mysqli_fetch_assoc($select_result)
						?>
							<option value="<?php echo $ct_row['ct_id'];?>" selected><?php echo $ct_row['ct_name'];?></option>
						<?php
							$select = "select ct_id, ct_name from categories";
							$select_result = mysqli_query($conn, $select);
							if(mysqli_num_rows($select_result)<= 0){
								echo "No categories yet.";
							}else{
								while($ct_row = mysqli_fetch_assoc($select_result)){
						?>
							<option value="<?php echo $ct_row['ct_id'];?>"> <?php echo $ct_row['ct_name'];?> </option>
						<?php
								}
							}
						?>
					</select>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname" class="lable-title"><b>Offers</b></label>
					<input type="text" class="form-control" id="pr_offers" placeholder="Buy 5 kg get 250 gram free" name="pr_offers" value="<?php echo $product_row['pr_offers'];?>" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group pt-4">
					<label for="uname" class="lable-title">Product Name</label>
					<input type="text" class="form-control" id="pr_name" placeholder="Product Name" name="pr_name" value="<?php echo $product_row['pr_name'];?>" required autofocus>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname" class="lable-title"> Actual Price in Rs. *</label>
					<div class="row">
                        <div class="col-lg-8">
							<input type="text" class="form-control" id="pr_actual_price" placeholder="40" name="pr_actual_price" value="<?php echo $product_row['pr_actual_price'];?>" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="col-lg-4">
							<select class="custom-select" id="pr_unit_actual" name="pr_unit_actual" required>
								<option selected value="<?php echo $product_row['pr_unit_actual'];?>"> <?php echo $product_row['pr_unit_actual'];?> </option>
								<option value="1 Kg"> 1 kg </option>
								<option value="500 grams"> 500 grams </option>
								<option value="250 grams"> 250 grams </option>
								<option value="1 packet"> 1 packet </option>
								<option value="1 piece"> 1 piece </option>
								<option value="1 dozen"> 1 dozen </option>
							</select>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                      </div>
				</div>
				<div class="form-group">
					<label for="uname" class="lable-title">Effective Price in Rs. *</label>
					<div class="row">
                        <div class="col-lg-8">
							<input type="text" class="form-control" id="pr_effective_price" placeholder="30" name="pr_effective_price" value="<?php echo $product_row['pr_effective_price'];?>" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="col-lg-4">
							<select class="custom-select" id="pr_unit_effective" name="pr_unit_effective" required>
								<option selected value="<?php echo $product_row['pr_unit_effective'];?>"> <?php echo $product_row['pr_unit_effective'];?> </option>
								<option value="1 Kg"> 1 kg </option>
								<option value="500 grams"> 500 grams </option>
								<option value="250 grams"> 250 grams </option>
								<option value="1 packet"> 1 packet </option>
								<option value="1 piece"> 1 piece </option>
								<option value="1 dozen"> 1 dozen </option>
							</select>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                      </div>
				</div>
                <div class="form-group">
					<label for="uname" class="lable-title">Discount in Percentage(%)</label>
					<input type="text" class="form-control" id="pr_discount" placeholder="25" name="pr_discount" value="<?php echo $product_row['pr_discount'];?>" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname" class="lable-title"><b>Wallet Discount</b></label>
					<input type="text" class="form-control" id="pr_wallet_disc" placeholder="4" name="pr_wallet_disc" value="<?php echo $product_row['pr_wallet_disc'];?>" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname" class="lable-title">Product Description</label>
					<textarea type="text" rows="3" class="form-control" id="pr_desc" placeholder="Product Description" name="pr_desc" required><?php echo $product_row['pr_desc'];?></textarea>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
                <div class="form-group">
					<label for="uname" class="lable-title">Returns</label>
					<input type="text" class="form-control" id="pr_returns" placeholder="Within 6 Hours" name="pr_returns" value="<?php echo $product_row['pr_returns'];?>" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				 <div class="form-group">
					<label for="uname" class="lable-title">Status</label>
					<select class="custom-select" name="pr_status" id="pr_status" required>
						<option value="<?php echo $product_row['pr_status'];?>" selected><?php echo $pr_status;?></option>
						<option value="1"> In Stock </option>
						<option value="0"> Out of Stock </option>
					</select>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<div class="form-group">
					<label for="uname" class="lable-title">Total Stock</label>
					<input type="number" class="form-control" id="pr_stock_count" placeholder="19" name="pr_stock_count" value="<?php echo $product_row['pr_stock_count'];?>" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
                <div class="form-group">
					<label for="uname" class="lable-title pt-3"><b>Image ( Leave empty if don't want to change image )</b></label>
					<div class="row align-items-center mt-4">
						<div class="img-container  col-4">
							<img src="../../<?php echo $product_row['pr_image'];?>" width="90%" height="90%">
						</div>
						<div class="upload-container col-8">
							<input type="file" class="form-control" id="pr_image" name="pr_image" required>
							<div class="valid-feedback">Valid.</div>
							<div class="invalid-feedback">Please fill out this field.</div>
						</div>
					</div>
				</div>
				<br/>
				<input type="hidden" class="form-control" id="pr_id" name="pr_id" value="<?php echo $product_row['pr_id'];?>" required>
				<button type="submit" id="submit" name="submit" class="btn btn-primary">Submit Product</button>
			</div>
		</form>
		<?php
			}
		?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script>
	$(document).ready(function (){
		$("#submit").click(function(event){
			event.preventDefault();
			var formdata = new FormData($("#add_new_products")[0]);
			document.getElementById("submit").disabled=true;
			document.getElementById("submit").innerHTML="Please Wait...";
			$.ajax({
				type : "post",
				url : "edit-product.php",
				processData : false,
				contentType : false,
				data : formdata,
				success : function(response){
					alert(response);
					document.getElementById("submit").disabled=false;
					document.getElementById("submit").innerHTML="Submit Product";
				},
			});
		});
	});
	</script>
</body>
</html>