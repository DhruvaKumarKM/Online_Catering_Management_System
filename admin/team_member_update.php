<?php
include('../includes/dbcon.php');

 if (isset($_POST['update']))
 { 
	 $id = $_POST['id'];
	 $team = $_POST['team'];
	 $members = $_POST['members'];
	 
	 mysqli_query($con,"delete from team_member WHERE team_id='$id' and member_id NOT IN (".implode(',',$members).")")or die(mysqli_error($con));

	foreach ($members as $value)
	{
		$query=mysqli_query($con,"select * from team_member where team_id='$id' and member_id='$value'")or die(mysqli_error($con));
      		$count=mysqli_num_rows($query);

      		if ($count==0)
      		
      		{
				mysqli_query($con,"INSERT INTO team_member(team_id,member_id) VALUES('$team','$value')")or die(mysqli_error($con));  
			}	
	}	 	

		echo "<script type='text/javascript'>alert('Successfully updated team details!');</script>";
		echo "<script>document.location='team_members.php'</script>";
	
} 

