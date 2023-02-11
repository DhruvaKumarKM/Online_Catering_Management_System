<?php 
session_start();
include('../includes/dbcon.php');
	
	$id = $_POST['id'];
	$last = $_POST['last'];
	$first = $_POST['first'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$mode = $_POST['mode'];

	mysqli_query($con,"UPDATE reservation SET r_last='$last',r_first='$first',r_address='$address',r_contact='$contact',r_email='$email',modeofpayment='$mode' where rid='$id'") or die(mysqli_error($con)); 
	echo "<script>document.location='reservation.php'</script>";   
	
	
?>