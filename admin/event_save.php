<?php 

include('../includes/dbcon.php');
	
	$what = $_POST['what'];
	$where = $_POST['where'];
	$time = $_POST['time'];
	$date = $_POST['date'];
	
	
		mysqli_query($con,"INSERT INTO event(event_what,event_where,event_date,event_time) 
			VALUES('$what','$where','$date','$time')")or die(mysqli_error($con));  
			echo "<script type='text/javascript'>alert('Successfully added new event!');</script>";
			echo "<script>document.location='event.php'</script>";   
	
	
?>