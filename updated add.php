<html>
    <link href="table.css" rel="stylesheet" type="text/css">
<body>
<?php
include('dbConnect.php');
if(isset($_POST['submit']))
{
$menu=mysqli_real_escape_string($conn,$_POST['menu']);
$price=mysqli_real_escape_string($conn,$_POST['price']);
$query1=mysqli_query($conn,"insert into admin_detail values('','$menu','$price')");

if($query1)
{
header("location:list.php");
}
}
?>
<fieldset style="width:300px;">
<form method="post" action="">
Menu: <input type="text" name="menu"><br>
Price:<input type="text" name="price">SEK<br>
<br>
<input type="submit" name="submit">
</form>
</fieldset>
</body>
</html>