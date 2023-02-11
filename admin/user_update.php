<?php
include('../includes/dbcon.php');

 if (isset($_POST['update']))
 { 
	 $id = $_POST['id'];
	 $name = $_POST['name'];
	 $username = $_POST['username'];
	 $password = $_POST['password'];
	 $status = $_POST['status'];
	 $email = $_POST['email'];
	 
	 mysqli_query($con,"UPDATE user SET full_name='$name',username='$username',password='$password',status='$status',email='$email' where user_id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Successfully updated user details!');</script>";
		echo "<script>document.location='user.php'</script>";
	
} 

