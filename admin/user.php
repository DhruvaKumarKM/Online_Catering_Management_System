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
  <title>Users - <?php include('../includes/title.php');?></title>
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
      <a href="index.html" class="navbar-brand hidden-lg">Catering Management System</a>
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
          <a href="#" class="bread-current">Maintenance</a>
          <span class="divider">/</span> 
          <a href="#" class="bread-current">User</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->



       <!-- Matter -->

      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
             
                    <a href="#addModal" class="btn btn-info" data-toggle="modal">Add New User</a>
                  </div>
                   
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
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>E-mail</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
include('../includes/dbcon.php');

    $query=mysqli_query($con,"select * from user order by full_name")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['user_id'];
        $name=$row['full_name'];
        $username=$row['username'];
        $status=$row['status'];
        $email=$row['email'];
        $password=$row['password'];

        if ($status=="active") $flag="success";else $flag="danger";
?>                      
                      <tr>
                        <td><?php echo $name;?></td>
                        <td><?php echo $username;?></td>
                        <td><?php echo $email;?></td>
                        <td><span class="label label-<?php echo $flag;?>"><?php echo $status;?></span></td>
                        <td>
                            <div class="col-md-2">
                              <a href="#myModal" class="btn btn-info" data-target="#update<?php echo $id;?>" data-toggle="modal">
                                <i class="fa fa-pencil"></i>
                              </a>
                            </div>
                        </td>
                      </tr>

<!-- Modal -->
<div id="update<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Update User Details</h4>
            </div>
            <div class="modal-body" style="height:250px">
              <!--start form-->
              <form class="form-horizontal" method="post" action="user_update.php">
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Full Name</label>
                      <div class="col-lg-10"> 
                        <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
                        <input type="text" class="form-control" name="name" id="title" placeholder="Write Full Name of User" value="<?php echo $name;?>">
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="username">Username</label>
                      <div class="col-lg-10"> 
                        <input type="text" class="form-control" name="username" id="username" value="<?php echo $username;?>" readonly>
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="password">Password</label>
                      <div class="col-lg-10"> 
                        <input type="password" class="form-control" name="password" id="password" placeholder="Write password" value="<?php echo $password;?>">
                      </div>
                  </div> 

                  <div class="form-group">
                      <label class="control-label col-lg-2" for="email">email</label>
                      <div class="col-lg-10"> 
                        <input type="email" class="form-control" name="email" id="email" placeholder="Write email" value="<?php echo $email;?>">
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="password">Status</label>
                      <div class="col-lg-10"> 
                        <select class="form-control" id="exampleSelect1" name="status">
                                <option><?php echo $status;?></option>
                                <option>active</option>
                                <option>inactive</option>
                        </select>
                      </div>
                  </div> 
                                                    
                  <!-- Buttons -->
                  <div class="form-group">
                      <!-- Buttons -->
                      <div class="col-lg-offset-2 col-lg-6">
                        <button type="submit" class="btn btn-sm btn-primary" name="update">Update</button>
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
              <h4 class="modal-title">Add New User</h4>
            </div>
            <div class="modal-body">
              <!--start form-->
              <form class="form-horizontal" method="post" action="user_save.php">
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Full Name</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="name" id="title" placeholder="Write Full Name of User" required>
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="username">Username</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="username" placeholder="Write Username" required>
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="password">Password</label>
                      <div class="col-lg-8"> 
                        <input type="password" class="form-control" name="password" id="password" placeholder="Write password" required>
                      </div>
                  </div> 
                    <!-- Title -->
                    <div class="form-group">
                      <label class="control-label col-lg-2" for="email">E-mail</label>
                      <div class="col-lg-8"> 
                        <input type="email" class="form-control" name="email" id="email" placeholder="Write email" required>
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
<!-- JS -->
<?php include('../includes/js.php');?>  

</body>
</html>