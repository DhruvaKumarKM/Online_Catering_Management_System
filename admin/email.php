<?php

    ini_set( 'display_errors', 1 );
    
    error_reporting( E_ALL );
    
    $from = " carting@gmail.com";
    
    $to = "123@gmail.com";
    
    $subject = "Checking PHP mail";
    
    $message = "Delicious Food";
    
    $headers = "From:" . $from;
    
    mail($to,$subject,$message, $headers);
    
    echo "<script>
		alert('Check Your Email Inbox for the details');		
	  </script>";
   	header('location:http://catring@gmail.com');
     
?>
