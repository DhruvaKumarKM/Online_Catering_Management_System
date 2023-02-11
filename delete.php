<html>
    <link href="table.css" rel="stylesheet" type="text/css">
<body>
<?php
include('dbConnect.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysqli_query($conn,"delete from admin_detail where id='$id'");
if($query1)
{
header('location:list.php');
}
}
?>
</body>
</html>
 