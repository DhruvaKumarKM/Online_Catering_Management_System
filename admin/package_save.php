<?php 

include('dbcon.php');
	
	$name = $_POST['name'];
	$price = $_POST['price'];
	$select1 = $_POST['select1'];
	$select2 = $_POST['select2'];
	$select3 = $_POST['select3'];
	$select4 = $_POST['select4'];
	
	mysqli_query($con,"INSERT INTO package(package_name,package_price) 
			VALUES('$name','$price')")or die(mysqli_error($con));  
	
	$id=mysqli_insert_id($con);
	
	foreach ($select1 as $value1)
	{
		mysqli_query($con,"INSERT INTO package_details(package_id,cat_id,group_id) 
			VALUES('$id','$value','1')")or die(mysqli_error($con));  
	}
	foreach ($select2 as $value2)
	{
		mysqli_query($con,"INSERT INTO package_details(package_id,cat_id,group_id) 
			VALUES('$id','$value','2')")or die(mysqli_error($con));  
	}
	foreach ($select3 as $value3)
	{
		mysqli_query($con,"INSERT INTO package_details(package_id,cat_id,group_id) 
			VALUES('$id','$value','3')")or die(mysqli_error($con));  
	}
	foreach ($select4 as $value4)
	{
		mysqli_query($con,"INSERT INTO package_details(package_id,cat_id,group_id) 
			VALUES('$id','$value','4')")or die(mysqli_error($con));  
	}
			echo "<script type='text/javascript'>alert('Successfully added new package!');</script>";
			echo "<script>document.location='package.php'</script>";   
?>