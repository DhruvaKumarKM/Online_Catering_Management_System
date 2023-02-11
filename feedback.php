<?php
session_start();
include_once 'dbConnect.php';
$error = false;
if (isset($_POST['feedback'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $feedback= mysqli_real_escape_string($conn, $_POST['feedback']);
   
    if (preg_match("^[a-zA-Z ]+$", $firstname)) {
        $error = false;
        $fname_error = "*Firstname must contain only alphabets and space.";
    }
    
    if (preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
        $error = false;
        $email_error = "*Please Enter Valid Email ID.";
    }
     if (preg_match("/^[a-zA-Z ]+ [_a-z0-9-]+$/", $feedback)) {
        $error = false;
        $feedback_error = "*Please Enter feedback";
    }
    
    if (!$error) {
        if (mysqli_query($conn, "INSERT INTO feedback(firstName, email, feedback) VALUES('" . $firstname . "', '" . $email . "','" . $feedback . "')")) {
            $successmsg = "Thank you for your feedback. Welcome agian";
           
        } else {
            $errormsg = "error";
        }
    }
}
?>

<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Feedback</title>
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
     
                    <div id="settingLogin" style="top:370%">
            <h1>FeedBack</h1>
           
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div>
                   <label> Name </label>
                <input type="text" name="firstname" width="200px" size="37" placeholder="name" required value="<?php if ($error) echo $firstname; ?>"/> 
                 <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($fname_error)) echo $fname_error; ?></p></div>
                <div>                               
                <label> Email </label>
                <input type="text" name="email" width="200px" size="37" placeholder="email" required value="<?php if ($error) echo $email; ?>"/> 
                 <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($email_error)) echo $email_error; ?></p> </div>
                 <div>
                     <label>Provide Feedback </label><br>
                     <textarea type="text" name="feedback" rows="5" cols="63" required value="<?php if ($error) echo $feedback; ?>"></textarea><br><br> 
                    <p style="color: #FF0000; font-weight: bold; font-size: 24px"><?php if (isset($feedback_error)) echo $feedback_error; ?></p>
                </div>                
         
                    <p class="login button"><input type="submit" name="submit" value="Submit"/></p>
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
              <div style=" position: absolute; left:44%; display: bold; font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif; font-size: 20px;">
                  <a href="home.html"><b>Home</b></a></div>
        </div>
                    
                    
        </div></div>
    </body>
                </html>
