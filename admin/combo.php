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
  <title>Combo Meals - <?php include('../includes/title.php');?></title>
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
      <a href="index.html" class="navbar-brand hidden-lg">Catering Service</a>
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
        <h2 class="pull-left"><i class="fa fa-home"></i> Dashboard
          <a href="#addModal" class="btn btn-info" data-toggle="modal">Add New Combo Meals</a>
        </h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="index.html"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Maintenance</a>
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Combo Meals</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->



       <!-- Matter -->

      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                
<?php
include('../includes/dbcon.php');

    $query=mysqli_query($con,"select * from combo order by combo_name")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['combo_id'];
        $name=$row['combo_name'];
        $price=$row['combo_price'];
       
?>  
<!-- Modal -->
<div id="delete<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Delete Combo Meals</h4>
            </div>
            <div class="modal-body" style="height:140px">
              <!--start form-->
              <form class="form-horizontal" method="post">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
                  <div class="alert alert-danger">
                      Are you sure you want to delete <?php echo $name;?>?
                    </div>                     
                  <!-- Buttons -->
                  
                      
                        <button type="submit" class="btn btn-sm btn-primary" name="del">Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                      
                 
              </form>
              <!--end form-->
            </div>
           
        </div><!--modal content-->
    </div><!--modal dialog-->
</div>
<!--end modal-->   
<!-- Modal -->
<div id="update<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Update Combo Meals</h4>
            </div>
            <div class="modal-body" style="height:300px">
              <!--start form-->
              <form class="form-horizontal" method="post" action="combo_update.php" enctype='multipart/form-data'>
                  <!-- Title -->
                  <input type="hidden" name="id" value="<?php echo $id;?>">
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Combo Name</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="name" id="title" placeholder="Combo Name" value="<?php echo $name;?>">
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Price</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="price" id="title" placeholder="Price of Combo Meal" value="<?php echo $price;?>">
                      </div>
                  </div> 
                  <!-- Title -->
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="username">Menu</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2 " id="exampleSelect1" name="menu[]" multiple='multiple' style="width: 100%;height:200px" placeholder="Select multiple members">
                        <?php
                         $m = mysqli_query($con,"SELECT * FROM combo_details natural join menu where combo_id='$id'"); 
                                  while ($rowm = mysqli_fetch_assoc($m)){  
                         ?>
                            <option selected value="<?php echo $rowm['menu_id'];?>"><?php echo $rowm['menu_name'];?></option>
                         <?php           
                                  }
                        ?>  
                         <?php
                              $result = mysqli_query($con,"SELECT * FROM menu"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option value="<?php echo $row['menu_id'];?>"><?php echo $row['menu_name'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                  </div> 
                              
                  <!-- Buttons -->
                  <div class="col-lg-offset-4 col-lg-6">
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
              <div class="col-md-4">
              <div class="widget">
                <!-- Widget title -->
                <div class="widget-head">
                  <div class="pull-left"><?php echo $name;?> - P<?php echo $price;?></div>
                  <div class="widget-icons pull-right">
                    <a href="#update" data-target="#update<?php echo $id;?>" data-toggle="modal"><i class="fa fa-pencil "></i></a>
                    <a href="#delete" data-target="#delete<?php echo $id;?>" data-toggle="modal"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content referrer">
                  <!-- Widget content -->
                  
                  <table class="table table-striped table-bordered table-hover">
                    <tbody>
<?php

    $query1=mysqli_query($con,"select * from combo_details natural join menu where combo_id='$id'")or die(mysqli_error($con));
      while ($row1=mysqli_fetch_array($query1)){
        $cid=$row1['combo_details_id'];
        $menu_id=$row1['menu_id'];
        $menu_name=$row1['menu_name'];
        
?>                        
                    <tr>
                      <td><?php echo $menu_name;?></td>
                    </tr> 
                   
                
<?php }?>                    
                    
                  </tbody></table>

                  <div class="widget-foot">
                  </div>
                </div>
              </div>

            </div>
              <!--end widget-->
            <?php }?>  
            </div>
          </div>
        </div>
      </div>
      <div id="dynamicInput">
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
<div id="addModal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Add New Combo Meal</h4>
            </div>
            <div class="modal-body">
              <!--start form-->
              <form class="form-horizontal" method="post" action="combo_save.php">
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-3" for="title">Combo Name</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="name" id="title" placeholder="Combo Name">
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-3" for="title">Price</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="price" id="title" placeholder="Price of Combo Meal">
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-3" for="username">Menu</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2 " id="exampleSelect1" name="menu[]" multiple='multiple' style="width: 100%;height:200px" placeholder="Select multiple members">
                       
                         <?php
                              $result = mysqli_query($con,"SELECT * FROM menu"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option value="<?php echo $row['menu_id'];?>"><?php echo $row['menu_name'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                  </div>                                      
                  <!-- Buttons -->
                  <div class="form-group">
                      <!-- Buttons -->
                      <div class="col-lg-offset-3 col-lg-6">
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
  mysqli_query($con,"delete from combo WHERE combo_id='$id'")
  or die(mysqli_error($con));
  echo "<script>document.location='combo.php'</script>";
    }
    ?> 
<!-- JS -->
<?php include('../includes/js.php');?>  
<script>
         $(function () {
         //Initialize Select2 Elements
         $(".select2").select2();
         

     })
    </script>
    
  
</body>
</html>