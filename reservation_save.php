<?php 
session_start();
include('includes/dbcon.php');
	
	$last = $_POST['last'];
	$first = $_POST['first'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$date = date("Y-m-d");

	$string="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$code="";
	$limit=10;
	$i=0;
	while($i<=$limit)
	{
		$rand=rand(0,61);
		$code.=$string[$rand];
		$i++;
	}

		mysqli_query($con,"INSERT INTO reservation(r_code,r_last,r_first,r_address,r_contact,r_email,date_reserved) 
			VALUES('$code','$last','$first','$address','$contact','$email','$date')")or die(mysqli_error($con));  

			$id=mysqli_insert_id($con);
			$_SESSION['id']=$id;
			echo "<script>document.location='details.php'</script>";   
	
	
?>