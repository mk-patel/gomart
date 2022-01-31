<?php
	/*

	* This page searches for user.
	*/

	/**
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	
	$user = "select user_id, user_full_name, mobile_number, user_dob, user_gender from user where user_full_name LIKE '%".$_POST['name']."%' or mobile_number LIKE '%".$_POST['name']."%' order by user_id desc";
	$user_result = mysqli_query($conn, $user);
	if(mysqli_num_rows($user_result)<=0)
		echo "<div class='text-center p-4'>No Users.</div>";
	else{
		while($user_row=mysqli_fetch_assoc($user_result)){
?>
	<div class="col-lg-4 col-md-4">
		<a href="#"></a>
		<div class="card my_card">
			<div class="card-body">
				<div class="d-flex mb-3 NU">
					<div class="p-2 mr-auto"><b><?php echo $user_row['user_full_name'];?></b></div>
					<div class="p-2">ID : <?php echo $user_row['user_id'];?></div>
				</div>
				<div class="d-flex mb-3">
					<div class="p-2 mr-auto NU">Mo. <?php echo $user_row['mobile_number'];?></div>
				</div>
				<div class="d-flex mb-3 DG name">
					<div class="p-2 mr-auto text-muted">DOB : <?php echo $user_row['user_dob'];?></div>
					<div class="p-2 text-muted">Gender : <?php echo $user_row['user_gender'];?></div>
				</div>
				 <div class="d-flex mb-3 buttoning">
					<div class="p-2 mr-auto">
						<a href="update-pass-interface.php?uid=<?php echo $user_row['user_id'];?>&mno=<?php echo $user_row['mobile_number'];?>"><button class="btn btn-sm btn-warning" id="left" style="color:white">
							Update
						</button></a>
					</div>
					<div class="p-2">
						<a href="delete-account.php?uid=<?php echo $user_row['user_id'];?>"><button class="btn btn-sm btn-danger" id="right" style="color:white">
							Delete
						</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
		}
	}
?>