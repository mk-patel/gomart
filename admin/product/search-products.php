<?php
	/*
	* This page searches for products into database.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	
	$product = "select pr_id, pr_name, pr_effective_price, pr_discount, pr_wallet_disc, pr_image from product where pr_id LIKE '%".$_POST['name']."%' or pr_name LIKE '%".$_POST['name']."%' or pr_effective_price LIKE '%".$_POST['name']."%' or pr_discount LIKE '%".$_POST['name']."%' order by pr_id desc";
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
						<h5 class="card-title">Price : <?php echo $product_row['pr_effective_price'];?></h5>
						<h5 class="card-title ml-5">Discount : <?php echo $product_row['pr_discount'];?></h5>
						<h5 class="card-title ml-5">From Wallet : <?php echo $product_row['pr_wallet_disc'];?></h5>
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