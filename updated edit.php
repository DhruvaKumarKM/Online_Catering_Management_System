<html>
    <link href="table.css" rel="stylesheet" type="text/css">
<body>
<?php
include('dbConnect.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
if(isset($_POST['submit']))
{
$menu=$_POST['menu'];
$price=$_POST['price'];
$query3=mysqli_query($conn,"update admin_detail set menu='$menu', price='$price' where id='$id'");
if($query3)
{
header('location:list.php');
}
}
$query1=mysqli_query($conn, "select * from admin_detail where id='$id'");
$query2=mysqli_fetch_array($query1);
?>
<form method="post" action="">
Menu:<input type="text" name="menu" value="<?php echo $query2['menu']; ?>" /><br />
Price:<input type="text" name="price" value="<?php echo $query2['price']; ?>" />SEK<br /><br />
<br />
<input type="submit" name="submit" value="update" />
</form>
<?php
}
?>
</body>
</html>