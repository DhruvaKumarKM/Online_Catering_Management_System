<?php
session_start();
include ('dbConnect.php');
if (isset($_POST['submit'])) {
 $email = mysqli_real_escape_string($conn, $_POST['email']);
 
    if ($email == "email") {
        $errormsg = "Email is not entered";
    } else { 
        $result = mysqli_query($conn, "select * from user WHERE email = '" . $email . "'");
        $result1 = mysqli_query($conn, "select * from res_owner WHERE email = '" . $email . "'");
        
 if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['email'] = $row['email'];
                $email = $row["email"];
    header("location:setPassword.php");
    }
    }
    else if (mysqli_num_rows($result1) > 0) {
                while ($row = mysqli_fetch_assoc($result1)) {
                    $_SESSION['email'] = $row['email'];
                $email = $row["email"];
    header("location:setPassword.php");
    }
    }
 else {
    $errormsg="Enter valid email";    
    }
                }
}
?>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Reset password</title>
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
            <h1 style="top:-54%; position: absolute; left:15%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 40px;">Reset Password</h1>
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
         </div>
                <div style="top:380%; position: absolute; left:49%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 20px;">
                         <a href="home.html"><b>Home</b></a>
                     </div>
  </div>
                </div>
        </div>
</body></html>

