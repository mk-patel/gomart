<?php	
	/*
	* This page searches for order.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	
	$order_select = "select order_id, order_unique_id, order_product_id, order_quantity, order_pricing, order_address, order_date, order_user_status, order_status from orders where order_unique_id LIKE '%".$_POST['name']."%' or order_address LIKE '%".$_POST['name']."%' order by order_id desc";
	$order_result = mysqli_query($conn, $order_select);
	if(mysqli_num_rows($order_result)<=0){
		echo "No orders.";
	}else{
		while($order_row = mysqli_fetch_assoc($order_result)){
			$status_id = $order_row['order_status'];
			
			$order_status="Order Placed.";
			$bg = "white";
			
			if($status_id === '1'){
				$order_status="On The Way";
				$bg = "#ffffb5";
			}
			if($status_id ==='01'){
				$order_status="Unable to deliver on this address.";
				$bg = "#ffb5b5";
			}
			if($status_id==='11'){
				$order_status="Delivered.";
				$bg = "#bbffb5";
			}
			
			if($status_id==0){
				$button = '<div class="accept mr-auto">
						<a href="order-status.php?oid='.$order_row['order_id'].'&st=1"><button class="btn btn-sm btn-success" id="left" style="color:white">
							Accept
						</button></a>
					</div>';
				$disable = "";
			}
			else if($status_id==1){
				$button = '<div class="deliver mr-auto">
						<a href="order-status.php?oid='.$order_row['order_id'].'&st=11"><button class="btn btn-sm btn-success" id="left" style="color:white">
							Delivered
						</button></a>
					</div>';
				$disable = "";
			}
			else{
				$button='';
				$disable = "disabled";
			}
?>
<a href="order-details.php?oid=<?php echo $order_row['order_id'];?>">
	<div class="col-lg-4 col-md-4">
		<div class="card my_card" style="background-color:<?php echo $bg;?>">
			<div class="card-body">
				<div class="d-flex mb-3 NU">
					<div class="p-2 mr-auto">Order ID :<b> <?php echo $order_row['order_unique_id'];?></b></div>
					<!-- <div class="p-2">UID</div> -->
				</div>
				<div class="d-flex mb-3">
					<div class="p-2 mr-auto NU">Products :<b> <?php echo $order_row['order_quantity'];?></b></div>
				</div>
				 <div class="d-flex mb-3">
					<div class="p-2 mr-auto NU">Order Pricing :<b> <?php echo $order_row['order_pricing'];?></b></div>
				</div>
				<div class="d-flex mb-3 NU name">
					<div class="p-2 mr-auto">Order Address :<b> <?php echo $order_row['order_address'];?></b></div>
					<!-- <div class="p-2">Gender</div> -->
				</div>
				<div class="d-flex mb-3 NU name">
					<div class="p-2 mr-auto">Order Date :<b> <?php echo $order_row['order_date'];?></b></div>
					<!-- <div class="p-2">Gender</div> -->
				</div>
				<div class="d-flex mb-3 NU name">
					<div class="p-2 mr-auto">User's Status :<b> <?php echo $order_row['order_user_status'];?></b></div>
					<!-- <div class="p-2">Gender</div> -->
				</div>
				<div class="d-flex mb-3 NU name">
					<div class="p-2 mr-auto">Delivery Status :<b> <?php echo $order_status;?></b></div>
					<!-- <div class="p-2">Gender</div> -->
				</div>
				<div class="d-flex mb-3 buttoning">
					<?php
					echo $button;
					?>
					<div class="pl-2">
						<a href="order-status.php?oid=<?php echo $order_row['order_id'];?>&st=01"><button <?php echo $disable;?> class="btn btn-sm btn-danger" id="right" style="color:white">
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