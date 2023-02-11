<?php session_start();
if(empty($_SESSION['id'])):
header('Location:index.php');
endif;
?>

<!DOCTYPE html>
<html>
<head>
<?php include 'header.php';?>
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid blue;
  border-right: 16px solid green;
  border-bottom: 16px solid red;
  border-left: 16px solid pink;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
  margin:auto;
  
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>
<div style="width:100%;text-align:center;vertical-align:bottom">
		<div class="loader"></div>
<?php

	session_destroy();
	
 echo '<meta http-equiv="refresh" content="2;url=index.php">';
 
 echo'<span class="itext">Finishing Reservation. Redirecting to home page. Please wait!...</span>';
?>
</div>
</body>
</html>
