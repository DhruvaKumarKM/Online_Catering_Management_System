<?php 

include('../includes/dbcon.php');
	
	$team = $_POST['team'];
	$members = $_POST['members'];
	
	foreach ($members as $value)
	{
		mysqli_query($con,"INSERT INTO team_member(team_id,member_id) 
			VALUES('$team','$value')")or die(mysqli_error());  
	
	}
			echo "<script type='text/javascript'>alert('Successfully added new team!');</script>";
			echo "<script>document.location='team_members.php'</script>";   
?>