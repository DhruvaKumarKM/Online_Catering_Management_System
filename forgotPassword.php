<?php
session_start();
include_once 'dbConnect.php';
if (isset($_POST['submit'])) {
 $email = mysqli_real_escape_string($conn, $_POST['email']);
    if ($email == "email") {
        $errormsg = "Enter valid email";
    } else {
    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '" . $email . "'");

       if (mysqli_num_rows($result) > 0) {  

  $res=mysqli_fetch_array($result);
  $to=$res['email'];
  $password = "";
  $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  
  for($i = 0; $i < 8; $i++)
  {
     $random_int = mt_rand();
     $password .= $charset[$random_int % strlen($charset)];
 }
  $subject='Forgot password';
  $message='Use this password to login: '.$password; 
  $headers='From: karlsmat1995@gmail.com';
  $m=mail($to,$subject,$message,$headers);
  if($m)
  {
    $errormsg='Check your mail inbox';
    mysqli_query($conn,"update user set password='$password' where email='$email'");
  }
  else
  {
   $errormsg='mail is not send';
  }
 }
 else
 {
  $errormsg='You entered mail id is not present';
 }
}
}

?>

<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
           <link href="css/new.css" rel="stylesheet" type="text/css">
           
     <link href="css/home.css" rel="stylesheet" type="text/css">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
    </head>
<body class="background">
        <div>
        <a class="hiddenanchor" id="toregister"></a>
	<a class="hiddenanchor" id="tologin"></a>
	<div id="wrapper">
		<div id="login" class="animate form">
     
         <div id="settingLogin">
            <h1 style="top:-54%; position: absolute; left:15%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 40px;">Forgot Password</h1>
            <form action="" method="post" >
                <div>                               
                <label for="username"> Email </label>
                <input type="text" name="email" width="200px" size="37" class="username" placeholder="email" required> </div>
                <span><?php
                    if (isset($errormsg)) {
                        echo $errormsg;
                    }
                    ?></span><br>
                 <p class="login button"><input type="submit" name="submit" value="submit"/></p>
               
            </form>
         </div></div>
                </div>
        </div>
</body></html>

