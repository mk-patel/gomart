<?php
	/*
	* This page updates recharge request into database.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	if(isset($_REQUEST['identity'])){
		$identity = $_REQUEST['identity'];
		if($identity==1){
			if(isset($_REQUEST['sb_id']) && isset($_REQUEST['wlt_rupees']) && isset($_REQUEST['wlt_amount']) && isset($_REQUEST['user_id'])){
				$sb_id = $_REQUEST['sb_id'];
				$wtrsn_rupees = $_REQUEST['wlt_rupees'];
				$wtrsn_amount = $_REQUEST['wlt_amount'];
				$wtrsn_user_id = $_REQUEST['user_id'];
				
				// Setting up the timezone.
				date_default_timezone_set('Asia/Calcutta');
				$date=date("d M Y")." ".date("H:i A");
				$futuredate=date("d M Y", strtotime('+1 year'))." ".date("H:i A");
				$transaction = "insert into wallet_transaction (wtrsn_amount, wtrsn_date,wtrsn_type, wtrsn_user_id) values ('+$wtrsn_amount', '$date', 'recharge', '$wtrsn_user_id')";
				if(mysqli_query($conn, $transaction)){
					$user_wallet = "update user set user_wallet=user_wallet+$wtrsn_amount, user_wallet_owner=1, user_wallet_expiry='$futuredate' where user_id=$wtrsn_user_id";
					if(mysqli_query($conn, $user_wallet)){
						
						$select_transaction = "select sb_status from subscription_request where sb_id=$sb_id";
						$transaction_result = mysqli_query($conn, $select_transaction);
						$transaction_row = mysqli_fetch_assoc($transaction_result);
						if($transaction_row['sb_status']==0){
							$request = "update subscription_request set sb_status=1 where sb_id=$sb_id";
							if(mysqli_query($conn, $request)){
								$wallet_recharges = "insert into wallet_recharges (wr_rupees, wr_amount, wr_user_id, wr_date) values ('$wtrsn_rupees', '$wtrsn_amount', '$wtrsn_user_id','$date')";
								if(mysqli_query($conn, $wallet_recharges)){
									echo "Confirmed and Amount Added To User's Account";
									echo "
									<script>
										alert('Confirmed and Amount Added To User's Account');
										window.location.href='wallet-recharge-request.php';
									</script>";
								}else{
									echo "Not Confirmed, WR";
									echo "
									<script>
										alert('Not Confirmed, WR');
										window.location.href='wallet-recharge-request.php';
									</script>";
								}
							}else{
								echo "Not Confirmed, SBR";
								echo "
								<script>
									alert('Not Confirmed, SBR');
									window.location.href='wallet-recharge-request.php';
								</script>";
							}
						}else{
							echo "Already Done";
							echo "
							<script>
								alert('Already Done');
								window.location.href='wallet-recharge-request.php';
							</script>";
						}
					}else{
						echo "Not Confirmed, UW";
						echo "
						<script>
							alert('Not Confirmed, UW');
							window.location.href='wallet-recharge-request.php';
						</script>";
					}
				}else{
					echo "Not Confirmed, WT";
					echo "
					<script>
						alert('Not Confirmed, Try Again, WT');
						window.location.href='wallet-recharge-request.php';
					</script>";
				}
			}else{
				echo "INVALID";
				echo "
				<script>
					alert('Invalid Activity');
					window.location.href='wallet-recharge-request.php';
				</script>";
			}
		}else{
			if(isset($_REQUEST['sb_id'])){
				$sb_id = $_REQUEST['sb_id'];
				$request = "update subscription_request set sb_status=2 where sb_id=$sb_id";
				if(mysqli_query($conn, $request)){
					echo "REJECTED";
					echo "
					<script>
						alert('Rejected');
						window.location.href='wallet-recharge-request.php';
					</script>";
				}else{
					echo "Unable To Reject, Try Again";
					echo "
					<script>
						alert('Unable To Reject, Try Again');
						window.location.href='wallet-recharge-request.php';
					</script>";
				}
			}
		}
	}else{
		echo "INVALID";
		echo "
		<script>
			alert('Invalid Activity');
			window.location.href='wallet-recharge-request.php';
		</script>";
	}
?>