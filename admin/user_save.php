<?php 

include('../includes/dbcon.php');
	
	$name = $_POST['name'];
	$password = $_POST['password'];
	$username = $_POST['username'];
	$email=$_POST['email'];
	
		mysqli_query($con,"INSERT INTO user(full_name,username,password,code,status,email) 
			VALUES('$name','$username','$password','0','active','')")or die(mysqli_error($con));  
			echo "<script type='text/javascript'>alert('Successfully added new admin user!');</script>";
			echo "<script>document.location='user.php'</script>";   
	
	
?>