<?php 
session_start();
include('includes/dbcon.php');
	
	$id = $_SESSION['id'];
	$menu = $_POST['menu'];
	$nop = $_POST['nop'];
	$i=0;		
	foreach ($nop as $value)
	{
		if ($value<>"")
		{
		
      $query=mysqli_query($con,"select * from menu where menu_id='$menu[$i]'")or die(mysqli_error($con));
   		  $row=mysqli_fetch_array($query);

   		  $price=$row['menu_price'];

   		  $total=$price*$value;
   		  $amount=$amount+$total;
      	

		mysqli_query($con,"INSERT INTO r_noncombo(rid,menu_id,serve) 
			VALUES('$id','$menu[$i]','$value')")or die(mysqli_error($con));  
	}
		$i++;	 


	}
	mysqli_query($con,"INSERT INTO r_details(rid,r_total) 
			VALUES('$id','$amount')")or die(mysqli_error($con));  
	echo "<script>document.location='summary.php'</script>";  

	mysqli_query($con,"UPDATE reservation SET payable='$amount',balance='$amount',r_status='Pending' where rid='$id'")
	 or die(mysqli_error($con));  
	
	
?>