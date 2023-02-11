<?php
include('../includes/dbcon.php');

 if (isset($_POST['update']))
 { 
	 $id = $_POST['id'];
	 $name = $_POST['name'];
	 $price = $_POST['price'];
	 $menu = $_POST['menu'];
	 
	 mysqli_query($con,"delete from combo_details WHERE combo_id='$id' and menu_id NOT IN (".implode(',',$menu).")")or die(mysqli_error($con));
	 mysqli_query($con,"UPDATE combo SET combo_name='$name', combo_price='$price' where combo_id='$id'")
	 or die(mysqli_error($con)); 
	foreach ($menu as $value)
	{
		$query=mysqli_query($con,"select * from combo_details where combo_id='$id' and menu_id='$value'")or die(mysqli_error($con));
      		$count=mysqli_num_rows($query);

      		if ($count==0)
      		{
				mysqli_query($con,"INSERT INTO combo_details(combo_id,menu_id) VALUES('$id','$value')")or die(mysqli_error($con));  
			}	
	}	 	

		echo "<script type='text/javascript'>alert('Successfully updated combo meal details!');</script>";
		echo "<script>document.location='combo.php'</script>";
	
} 

