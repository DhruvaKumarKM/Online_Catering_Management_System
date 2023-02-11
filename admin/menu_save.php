<?php 

include('../includes/dbcon.php');
	
	$menu = $_POST['menu'];
	$cat = $_POST['cat'];
	$desc = $_POST['desc'];
	$price = $_POST['price'];

	$result = mysqli_query($con,"SELECT menu_name FROM menu where menu_name='$menu'"); 
        $count = mysqli_num_rows($result);

        if ($count==0)
        {

			$name = $_FILES["image"]["name"];
			if ($name=="")
			{
				$name="default.gif";
			}
			else
			{
				$name = $_FILES["image"]["name"];
				$type = $_FILES["image"]["type"];
				$size = $_FILES["image"]["size"];
				$temp = $_FILES["image"]["tmp_name"];
				$error = $_FILES["image"]["error"];
			
				if ($error > 0){
					die("Error uploading file! Code $error.");
					}
				else{
					if($size > 100000000000) //conditions for the file
						{
						die("Format is not allowed or file size is too big!");
						}
				else
				      {
					move_uploaded_file($temp, "../images/".$name);
				      }
					}
			}	
				mysqli_query($con,"INSERT INTO menu(menu_name,cat_id,menu_desc,menu_price,menu_pic) 
					VALUES('$menu','$cat','$desc','$price','$name')")or die(mysqli_error());  
					echo "<script type='text/javascript'>alert('Successfully added new menu!');</script>";
					echo "<script>document.location='menu.php'</script>";   
		}
		else
		{
					echo "<script type='text/javascript'>alert('Menu already added!');</script>";
					echo "<script>document.location='menu.php'</script>";  
		}	
?>