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
  <title>Finished Reservations - <?php include('../includes/title.php');?></title>
  <?php include('../includes/links.php');?>
  
</head>

<body>

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
  
    <div class="conjtainer">
      <!-- Menu button for smallar screens -->
      <div class="navbar-header">
      <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
      <span>Menu</span>
      </button>
      <!-- Site name for smallar screens -->
      <a href="index.html" class="navbar-brand hidden-lg">Philos Catering</a>
    </div>
      
      <?php include('../includes/topbar.php');?>
    

    </div>
  </div>



<!-- Main content starts -->

<div class="content" style="margin-top:10px">

    <!-- Sidebar -->
    <?php include('../includes/sidebar.php');?>

    <!-- Sidebar ends -->

        <!-- Main bar -->
    <div class="mainbar">
      
      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-home"></i> Dashboard</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="index.html"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Reservations</a>
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Finished</a>
        </div>

        <div class="clearfix"></div>

     
      <!-- Page heading ends -->



       <!-- Matter -->

      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left"> Finished Reservations
                  </div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
                    
              <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                    <thead>
                      <tr>
                        <th>RCode</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Contact</th>
                        <th>Event</th>
                        <th>Date</th>
                        <th>Venue</th>
                        <th>Balance</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
include('../includes/dbcon.php');

    $query=mysqli_query($con,"select * from reservation where r_status='Finished'")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['rid'];
        $rcode=$row['r_code'];
        $first=$row['r_first'];
        $last=$row['r_last'];
        $contact=$row['r_contact'];
        $address=$row['r_address'];
        $date=$row['r_date'];
        $venue=$row['r_venue'];
        $balance=$row['balance'];
        $type=$row['r_type'];
?>                      
                      <tr>
                        <td><?php echo $rcode;?></td>
                        <td><?php echo $last;?></td>
                        <td><?php echo $first;?></td>
                        <td><?php echo $contact;?></td>
                        <td><?php echo $type;?></td>
                        <td><?php echo $date;?></td>
                        <td><?php echo $venue;?></td>
                        <td><?php echo $balance;?></td>
                        <td>
                            <a href="#update" class="btn btn-default" data-target="#update<?php echo $id;?>" data-toggle="modal">
                                <i class="fa fa-money bgreen"></i>
                              </a>
                              <a href="reservation_view.php?id=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-eye"></i>
                              </a>
                             
                             
                            
                        </td>
                      </tr>
<!-- Modal -->
<div id="update<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Add Payment</h4>
            </div>
            <div class="modal-body" style="height:120px">
              <!--start form-->
              <form class="form-horizontal" method="post" action="payment_save.php" enctype='multipart/form-data'>
                  <!-- Title -->
                  <input type="hidden" name="id" value="<?php echo $id;?>">
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Payment</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="amount" id="title" placeholder="Enter Amount">
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Status</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2" id="exampleSelect1" name="status">
                                <option>Approved</option>
                                <option>Finished</option>
                                <option>Cancelled</option>
                        </select>
                      </div>
                  </div> 
                  
                              
                  <!-- Buttons -->
                  <div class="col-md-4">
                  </div>  
                  <div class="col-md-8">
                        <button type="submit" class="btn btn-sm btn-primary" name="update">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                  </div>  
              </form>
              <!--end form-->
            </div>
           
        </div><!--modal content-->
    </div><!--modal dialog-->
</div>
<!--end modal-->  
         
<?php }?>
                    </tbody>
                    <tfoot>
                     
                    </tfoot>
                  </table>
                  <div class="clearfix"></div>
                </div>
                </div>
              </div>

          
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>  
              
            </div>
          </div>
        </div>
      </div>

    <!-- Matter ends -->


    </div>

   <!-- Mainbar ends -->
   <div class="clearfix"></div>

</div>
<!-- Content ends -->

<!-- Footer starts -->
<?php include('../includes/footer.php');?>  

<!-- Footer ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 

<!-- Modal -->
<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Add New Menu</h4>
            </div>
            <div class="modal-body">
              <!--start form-->
              <form class="form-horizontal" method="post" action="menu_save.php" enctype='multipart/form-data'>
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Menu Name</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="menu" id="title" placeholder="Menu Name">
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Category</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2" id="exampleSelect1" name="cat">
                         <?php
                            include('../includes/dbcon.php');

                              $result = mysqli_query($con,"SELECT * FROM category ORDER BY cat_name"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option><?php echo $row['cat_name'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Subcategory</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2" id="exampleSelect1" name="subcat">
                         <?php

                              $result = mysqli_query($con,"SELECT * FROM subcategory ORDER BY subcat_name"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option><?php echo $row['subcat_name'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Description</label>
                      <div class="col-lg-8"> 
                        <textarea class="form-control" name="desc" id="title" placeholder="Description"></textarea>
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Price</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="price" id="title" placeholder="Price">
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Image</label>
                      <div class="col-lg-8"> 
                        <input type="file" class="form-control" name="image" id="title">
                      </div>
                  </div> 

                  <!-- Buttons -->
                  <div class="form-group">
                      <!-- Buttons -->
                      <div class="col-lg-offset-2 col-lg-6">
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                       </div>
                  </div>
              </form>
              <!--end form-->
            </div>
            
        </div><!--modal content-->
    </div><!--modal dialog-->
</div>
<!--end modal-->  
<?php
    if (isset($_POST['del']))
    {
    $id=$_POST['id'];

  // sending query
  mysqli_query($con,"delete from reservation WHERE rid='$id'")
  or die(mysqli_error($con));
  echo "<script>document.location='pending.php'</script>";
    }
    ?>
<!-- JS -->
<?php include('../includes/js.php');?>  

</body>
</html>