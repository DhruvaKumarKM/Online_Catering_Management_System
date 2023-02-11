<?php 
session_start();
include('includes/dbcon.php');
	
	$id = $_SESSION['id'];
	$menu = $_POST['menu'];
	$rdid = $_POST['rdid'];
	
	$i=0;
	foreach ($rdid as $value)
	{

		mysqli_query($con,"INSERT INTO r_combo(menu_id,r_details_id) 
			VALUES('$menu[$i]','$value')")or die(mysqli_error($conn));  
			 
			$i++;
	}	
	
	mysqli_query($con,"UPDATE reservation SET r_status='Pending' where rid='$id'")
	 or die(mysqli_error($con)); 
			echo "<script>document.location='summary.php'</script>";   
	
	
?>