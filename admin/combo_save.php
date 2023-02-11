<?php 

include('../includes/dbcon.php');
	
	$name = $_POST['name'];
	$price = $_POST['price'];
	$menu = $_POST['menu'];
	
	mysqli_query($con,"INSERT INTO combo(combo_name,combo_price) 
			VALUES('$name','$price')")or die(mysqli_error($con));  
	$id=mysqli_insert_id($con);
	foreach ($menu as $value)
	{
		if ($value<>0)
		{
		mysqli_query($con,"INSERT INTO combo_details(combo_id,menu_id) 
			VALUES('$id','$value')")or die(mysqli_error($con));  
		}
	}
			echo "<script type='text/javascript'>alert('Successfully added new combo meal!');</script>";
			echo "<script>document.location='combo.php'</script>";   
?>