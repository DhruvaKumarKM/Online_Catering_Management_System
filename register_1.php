<!DOCTYPE html>
<?php
session_start();
include_once 'dbConnect.php';
$error = false;
if (isset($_POST['register'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $phone= mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address= mysqli_real_escape_string($conn, $_POST['address']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    if (preg_match("/^[a-zA-Z ]+$/", $firstname)) {
        $error = false;
        $fname_error = "*Firstname must contain only alphabets and space.";
    }
    if (preg_match("/^[a-zA-Z ]+$/", $lastname)) {
        $error = false;
        $lname_error = "*Lastname Name must contain only alphabets and space.";
    }
     if (preg_match("/^[0-9]+$/", $phone)) {
        $error = false;
     $lname_error = "*Phone number must contain only numbers.";}
    
    if (preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
        $error = false;
        $email_error = "*Please Enter Valid Email ID.";
    }
     if (preg_match("^[a-zA-Z ]+(\.[_a-z0-9-]+)$", $address)) {
        $error = false;
        $email_error = "*Please Enter Valid address";
    }
       if (strlen($password) < 8) {
        $error = true;
        $password_error = "*Password must be minimum of 6 characters.";
    }
    if ($password != $cpassword) {
        $error = true;
        $cpassword_error = "*Password and Confirm Password do not match.";
    }
    if (!$error) {
        if (mysqli_query($conn, "INSERT INTO user(email, firstName, lastName, phone, address, password) VALUES('" . $email . "', '" . $firstname . "', '" . $lastname . "','" . $phone . "','" . $address . "', '" . $password . "')")) {
            $successmsg = "You have signed in successfully. <a href='login.php'>Click here to login</a>.";
        } else {
            $errormsg = ".";
        }
    }
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
       <link href="css/home.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/new.css" rel="stylesheet" type="text/css">
    <header> </header>
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    </head>
    <body class="background">
        
        <a class="hiddenanchor" id="toregister"></a>
	<a class="hiddenanchor" id="tologin"></a>
	<div id="wrapper">
		<div id="login" class="animate form">
     
         <div id="setting">
                    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="registerform">
                        <h1>SignUp Here</h1>
                        <div>
                           First Name:<input type="text" width=200px class="text" name="firstname" size="37"placeholder="Enter First Name" required value="<?php if ($error) echo $firstname; ?>"  id="active"/>
                        <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($fname_error)) echo $fname_error; ?></p>
                        
                        
                            Last Name:<input type="text" width=200px  class="text" name="lastname" size="37" placeholder="Enter Last Name" required value="<?php if ($error) echo $lastname; ?>"/>
                            <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($lname_error)) echo $lname_error; ?></p>
                        
                       Email:<input type="text"  width=200px class="text" name="email" placeholder="Enter Valid Email" required value="<?php if ($error) echo $email; ?>"/>
                            <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($email_error)) echo $email_error; ?></p>
                            
                        
                             Phone Number:<input type="text"  width=200px class="text" name="phone" size="37" placeholder="Enter Phone Number" required value="<?php if ($error) echo $phone; ?>"/>
                             <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($phone_error)) echo $phone_error; ?></p>
                        
                             <div>  Address: <input type="text"  width=200px class="text" name="address" size="37" placeholder="Enter address" required value="<?php if ($error) echo $address; ?>"/>
                            <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($address_error)) echo $address_error; ?></p>
                             </div>
                        
                         Password:<input type="password"  width=200px class="text" name="password" size="37" placeholder="Enter Password" required>
                            <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($password_error)) echo $password_error; ?></p>
                             
                        Confirm Password:<input type="password" width=200px  class="text" size="37" name="cpassword" placeholder="Enter Confirm Passwords" required>
                            <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($cpassword_error)) echo $cpassword_error; ?> </p>
                        </div>
                        <p class="login button">  
                        <input type="submit"  style="font-size:20px; font-weight: bold; " name="register" value="Create"/>
                                        
                        </p>

                                    <div> 
                                        <span style="color: red;" ><?php
                                            if (isset($successmsg)) {
                                                echo $successmsg;
                                            }
                                            ?></span>
                                        <span style="color: #FF0000;"><?php
                                            if (isset($errormsg)) {
                                                echo $errormsg;
                                            }
                                            ?></span>
                                    </div>
                                    </form>
                                   
         </div></div></div>
        <div style="top:110%;position: absolute; left:49%; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; display: bold; font-size: 20px;">
            <a href="home.html"><b>Home</b></a>
        </div>
                                    </body>
                                    </html>
