<?php
include('../includes/dbcon.php');

 if (isset($_POST['update']))
 { 
	$id = $_POST['id'];
	$last = $_POST['last'];
	$first = $_POST['first'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];	
	$status = $_POST['status'];	
	 
	 
	 mysqli_query($con,"UPDATE member SET member_last='$last',member_first='$first',member_contact='$contact',member_address='$address',member_status='$status' where member_id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Successfully updated member details!');</script>";
		echo "<script>document.location='members.php'</script>";
	
} 

