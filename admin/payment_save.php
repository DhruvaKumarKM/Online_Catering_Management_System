<?php 

include('../includes/dbcon.php');
	
	$id = $_POST['id'];
	$amount = $_POST['amount'];
	$status = $_POST['status'];
	
	$date=date("Y-m-d");
	if ($amount<>0)
	{
		mysqli_query($con,"INSERT INTO payment(amount,rid,payment_date) 
			VALUES('$amount','$id','$date')")or die(mysqli_error($con));  
	}
		

		mysqli_query($con,"UPDATE reservation SET balance=balance-'$amount',r_status='$status' where rid='$id'")or die(mysqli_error($con)); 

$query = mysqli_query($con, "SELECT * FROM reservation natural join combo WHERE rid='$id'");
      $row=mysqli_fetch_array($query);
        $rcode=$row['r_code'];
        $first=$row['r_first'];
        $last=$row['r_last'];
        $contact=$row['r_contact'];
        $address=$row['r_address'];
        $date=$row['r_date'];
        $venue=$row['r_venue'];
        $balance=$row['balance'];
        $payable=number_format($row['payable'],2);
        $ocassion=$row['r_ocassion'];
        $status=$row['r_status'];
        $email=$row['r_email'];
        $motif=$row['r_motif'];
        $time=$row['r_time'];
        $time=$row['r_time'];
        $type=$row['r_type'];
        $cid=$row['combo_id'];
        $combo=$row['combo_name'];

        if ($status=='Approved'){
        	$msg="Please pay your remaining balance $balance, before the event. Thank you!";
        }
        if ($status=='Cancelled'){
        	$msg=" Sorry!";
        }


	ini_set( 'display_errors', 1 );
    
    error_reporting( E_ALL );
    
    $from = "cateringservices56@gmail.com";
    
    $to = "$email";
    
    $subject = "Reservation Status";
    
    $message = "Dear $first $last,

    Your reservation is $status. $msg


    Thanks,

    Yuvaraja's Catering Services
    	
    ";
    
    $headers = "From:" . $from;
    
    mail($to,$subject,$message, $headers);
    	
			echo "<script type='text/javascript'>alert('Successfully added new payment!');</script>";
			echo "<script>document.location='pending.php'</script>";   
	
	
?>