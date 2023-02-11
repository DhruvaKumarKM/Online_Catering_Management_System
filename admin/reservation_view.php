<?php session_start();
if(empty($_SESSION['id'])):
header('Location:index.php');
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>View Reservations - <?php include('../includes/title.php');?></title>
  <style>
    .label{
      width:150px;
    }
    h4,h3{
      margin:0px;
    }
  </style>  
</head>

<body>
<h3 style="text-align:center">Philos Catering Services</h3>
<h4 style="text-align:center">Banimantap </h4>
<h4 style="text-align:center">Phone No. : 123456798</h4>
<h4 style="text-align:center">Gmail : Philos@gmail.com</h4>
<h4 style="text-align:center">Facebook : facebook.com/Philos Restaurant </h4>
<hr>

<table style="width:100%">
<?php
include('../includes/dbcon.php');
    $id=$_REQUEST['id'];
    $query=mysqli_query($con,"select * from reservation left join team on reservation.team_id=team.team_id where rid='$id'")or die(mysqli_error($con));
      $row=mysqli_fetch_array($query);
        $id=$row['rid'];
        $rcode=$row['r_code'];
        $first=$row['r_first'];
        $last=$row['r_last'];
        $contact=$row['r_contact'];
        $address=$row['r_address'];
        $date=$row['r_date'];
        $venue=$row['r_venue'];
        $balance=$row['balance'];
        $payable=$row['payable'];
        $type=$row['r_type'];
        $team=$row['team_name'];
        $status=$row['r_status'];
        $motif=$row['r_motif'];
?>                      
                      <tr>
                        <td class="label">RCode: </td>
                        <td><?php echo $rcode;?></td>
                        <td class="label">Reservation Date: </td>
                        <td><?php echo date("M d, Y",strtotime($date));?></td>
                      </tr>
                      <tr>  
                        <td class="label">Name: </td>
                        <td><?php echo $last." ,".$first;?></td>
                        <td class="label">Reservation Type: </td>
                        <td><?php echo $type;?></td>
                      </tr>
                      <tr>
                        <td class="label">Contact #: </td>
                        <td><?php echo $contact;?></td>
                        <td class="label">Venue for the Event: </td>
                        <td><?php echo $venue;?></td>
                      </tr> 
                      <tr>
                        <td class="label">Address: </td>
                        <td><?php echo $address;?></td>
                        <td class="label">Total Payable: </td>
                        <td><?php echo $payable;?></td>
                      </tr>   
                      <tr>  
                        <td class="label">Reservation Status: </td>
                        <td><?php echo $status;?></td>
                        <td class="label">Balance: </td>
                        <td><?php echo $balance;?></td>
                      </tr>  
                      <tr>  
                        <td class="label">Team Assigned: </td>
                        <td><?php echo $team;?></td>
                        <td class="label">Motif: </td>
                        <td><?php echo $motif;?></td>
                      </tr>  
</table>
<br>
<?php
    
    $query1=mysqli_query($con,"select * from r_details natural join combo where rid='$id'")or die(mysqli_error($con));
      while($row1=mysqli_fetch_array($query1))
      {
        $rid=$row1['r_details_id'];
?>
<div style="width:50%;float:left">
  <h4><?php echo $row1['combo_name'];?></h4>
  <span>No. of persons: <?php echo $row1['r_nop'];?> * <?php echo $row1['r_price'];?> = P <?php echo $row1['r_nop']*$row1['r_price'];?></span>
  <ul>
<?php
      $query2=mysqli_query($con,"select * from r_combo natural join menu where r_details_id='$rid'")or die(mysqli_error($con));
      while($row2=mysqli_fetch_array($query2))
      {
?>    
    <li><?php echo  $row2['menu_name'];?></li>
<?php }?>    
</div>
<?php }?>
</body>
</html>