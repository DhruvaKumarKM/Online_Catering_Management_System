<?php
session_start();
include ('dbConnect.php');

    $email=$_SESSION["email"];
echo $email;
$error = false;
		if (isset($_POST['submit']))
		{
                
                $opassword = mysqli_real_escape_string($conn, $_POST['opassword']);
                $npassword = mysqli_real_escape_string($conn, $_POST['npassword']);
                $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
		if (strlen($opassword) < 6) {
                $error = true;
                $opassword_error = "*Password must be minimum of 6 characters.";
                }
                if (strlen($npassword) < 6) {
                $error = true;
                $npassword_error = "*Password must be minimum of 6 characters.";
                }
                if ($npassword != $cpassword) {
                $error = true;
                $cpassword_error = "*Password and Confirm Password do not match.";
                }
                $result = mysqli_query($conn, "select * from user WHERE email = '" . $email . "'and password = '" . $opassword . "'");
                $result1 = mysqli_query($conn, "select * from res_owner WHERE email = '" . $email . "'and password = '" . $opassword . "'");
                if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                $opassworddb = $row['password'];
                if ($opassword==$opassworddb)
		{
		
		if ($npassword==$cpassword)
		{
		
		$querychange = mysqli_query($conn, "update user set password='".$cpassword."' where email='" . $email . "'");
				
				$successmsg = "You have changed password successfully"; 
		
		}
		}
                }
                } else if (mysqli_num_rows($result1) > 0) {
                 while ($row = mysqli_fetch_assoc($result1)) {
                 $opassworddb1 = $row["password"];
                 if($opassword==$opassworddb1)
                   {
		
		if ($npassword==$cpassword)
		{
		
		$querychange1 = mysqli_query($conn, "update res_owner set password='".$cpassword."' where email='" . $email . "'");
				
				$successmsg = "You have changed password successfully"; 
		
		}
		} 
                 }
                 } else
                $errormsg = "Password does'nt match";
                }
	
?>

<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>activity</title>
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
             <h1 style="top:19%; position: absolute; left:20%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 40px;">Change Password</h1>
             <br>
             <br>
             <br>
             <br>
             <br>
             <br>
             <br><form action="" method="post">
                 
               <div>
                   Old Password:<input type="password" width=200px class="text" name="opassword" size="37"placeholder="Old password" required value="<?php if ($error) echo $opassword; ?>"  id="active"/>
                        <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($opassword_error)) echo $opassword_error; ?></p> 
                        </div>
                        <div>
                            New Password:<input type="password" width=200px  class="text" name="npassword" size="37" placeholder="New passowrd" required value="<?php if ($error) echo $npassword; ?>"/>
                            <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($npassword_error)) echo $npassword_error; ?></p>
                        </div>
                        <div>
                       Confirm Password:<input type="password"  width=200px class="text" name="cpassword" placeholder="Conform password" required value="<?php if ($error) echo $cpassword; ?>"/>
                       <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></p></div>
                <br>
                <p class="login button"><input type="submit" name="submit" value="Submit"/></p>
                 <div> 
                                        <span style="color: red;" ><?php
                                            if (isset($successmsg)) {
                                                echo $successmsg;
                                            }
                                            ?></span>
                                        <span style="color: red;"><?php
                                            if (isset($errormsg)) {
                                                echo $errormsg;
                                            }
                                            ?></span>
</div>
                </form>  
        </div>
                   
                     <div style="top:660%; position: absolute; left:49%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 20px;">
                         <a href="home.html"><b>Home</b></a>
                     </div>
  
                    <div >  
                     

                    </div>
</form>
        </div></div>
    </body>
                </html>