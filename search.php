<?php
	include('includes/dbcon.php');
	
	$rcode=$_POST['rcode'];

	$query=mysqli_query($con,"select r_code from reservation WHERE r_code = '$rcode'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query);

		if ($count>0)
		{
			echo "<script>document.location='reservation_status.php?rcode=$rcode'</script>";  
		}
		else
		{
			echo "<script type='text/javascript'>alert('No reservation found!');</script>";
			echo "<script>document.location='index.php'</script>";  
		}	
?>   