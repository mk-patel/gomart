
<?php
	/*
	* This page returns searched products values.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
	$query=$_POST['query'];
	echo "<a href='product/search-result.php?q=".$query."' id='sr' class='list-group-item list-group-item-action pl-2 pr-2 pt-1 pb-1'>".$_POST['query']."</a>";
	$search_query = "select pr_name,pr_discount,pr_effective_price_1,pr_effective_price_2,pr_effective_price_3,pr_effective_price_4 from product 
					 where (pr_name LIKE '%".$_POST['query']."%' or pr_discount LIKE '%".$_POST['query']."%' 
                     or pr_effective_price_1 LIKE '%".$_POST['query']."%' or pr_effective_price_2 LIKE '%".$_POST['query']."%' 
                     or pr_effective_price_3 LIKE '%".$_POST['query']."%' or pr_effective_price_4 LIKE '%".$_POST['query']."%')";
	$search_query_result = mysqli_query($conn, $search_query);
	if(mysqli_num_rows($search_query_result)>0){
		while($row=mysqli_fetch_array($search_query_result)){
?>
	<a href="product/search-result.php?q=<?php echo $row['pr_name'];?>" id="sr" class="list-group-item list-group-item-action pl-2 pr-2 pt-1 pb-1"><?php echo $row['pr_name'];?></a>

<?php
		}
	}
?>