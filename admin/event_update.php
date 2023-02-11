<?php
include('../includes/dbcon.php');

 if (isset($_POST['update']))
 { 
	 $id = $_POST['id'];
	 $what = $_POST['what'];
	 $where = $_POST['where'];
	 $date = $_POST['date'];
	 $time = $_POST['time'];


	 mysqli_query($con,"UPDATE event SET event_what='$what',event_where='$where',event_date='$date',event_time='$time' where event_id='$id'") or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Successfully updated event details!');</script>";
		echo "<script>document.location='event.php'</script>";
	
 }
