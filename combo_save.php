<?php 
session_start();
include('includes/dbcon.php');
	
	$id = $_SESSION['id'];
	$cid = $_POST['combo_id'];
	$nop = $_POST['nop'];
	$price = $_POST['price'];
		
	$count = $_POST['count'];
	
	foreach ($cid as $value)
	{
		mysqli_query($con,"INSERT INTO r_details(rid,combo_id) 
			VALUES('$id','$value')")or die(mysqli_error($con));  

		 	$rid=mysqli_insert_id($con);

		for($i=0;$i<$count;$i++)
		{

			 if ($nop[$i]<>0)
			 {
			 	$total=$price[$i]*$nop[$i];

			 	mysqli_query($con,"UPDATE r_details SET r_nop='$nop[$i]',r_total='$total',r_price='$price[$i]' where r_details_id='$rid'")
		 or die(mysqli_error($con)); 
			 	
			 }
			

		}	
	}
	$query=mysqli_query($con,"select SUM(r_total) as total from r_details where rid='$id'")or die(mysqli_error($con));
      $row=mysqli_fetch_array($query);
        $total=$row['total'];

    	 mysqli_query($con,"UPDATE reservation SET payable='$total',balance='$total' where rid='$id'")
	 or die(mysqli_error($con)); 

			echo "<script>document.location='combo_details.php'</script>";   
	
	
?>