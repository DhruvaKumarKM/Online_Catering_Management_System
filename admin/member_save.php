<?php 

include('../includes/dbcon.php');
	
	$last = $_POST['last'];
	$first = $_POST['first'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	
	$result = mysqli_query($con,"SELECT member_last,member_first FROM member where member_last='$last' and member_first='$first'")or die(mysqli_error($con)); 
        $count = mysqli_num_rows($result);

        if ($count==0)
        {
			mysqli_query($con,"INSERT INTO member(member_last,member_first,member_contact,member_address,member_status) 
			VALUES('$last','$first','$contact','$address','active')")or die(mysqli_error($con));  
			echo "<script type='text/javascript'>alert('Successfully added new member!');</script>";
			echo "<script>document.location='members.php'</script>";   
		}
		else
		{
			echo "<script type='text/javascript'>alert('Member already added!');</script>";
			echo "<script>document.location='members.php'</script>";   	
		}
	
?>