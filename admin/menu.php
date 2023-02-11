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
  <title>Menu - <?php include('../includes/title.php');?></title>
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
      <a href="index.html" class="navbar-brand hidden-lg">Online Restaurant Management System</a>
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
          <a href="#" class="bread-current">Menu</a>
        </div>

      </div>
      <!-- Page heading ends -->



       <!-- Matter -->

      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                    <a href="#addModal" class="btn btn-info" data-toggle="modal">Add New Menu</a>
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
                        <th>Image</th>
                        <th>Menu Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
include('../includes/dbcon.php');

    $query=mysqli_query($con,"select * from menu natural join category order by menu_name")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['menu_id'];
        $menu=$row['menu_name'];
        $cat=$row['cat_name'];
        $desc=$row['menu_desc'];
        $price=$row['menu_price'];
        $pic=$row['menu_pic'];
?>                      
                      <tr>
                        <td><img style="height:50px;width:50px" src="..	/images/<?php echo $pic;?>"></td>
                        <td><?php echo $menu;?></td>
                        <td><?php echo $cat;?></td>
                        <td><?php echo $desc;?></td>
                        <td><?php echo $price;?></td>
                        <td>
                            
                              <a href="#update" class="btn btn-info" data-target="#update<?php echo $id;?>" data-toggle="modal">
                                <i class="fa fa-pencil"></i>
                              </a>
                            
                          
                        </td>
                      </tr>
<!-- Modal -->
<div id="update<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Update Menu</h4>
            </div>
            <div class="modal-body" style="height:300px">
              <!--start form-->
              <form class="form-horizontal" method="post" action="menu_update.php" enctype='multipart/form-data'>
                  <!-- Title -->
                  <input type="hidden" name="id" value="<?php echo $id;?>">
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Menu Name</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="menu" id="title" placeholder="Menu Name" value="<?php echo $menu;?>">
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Category</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2" id="exampleSelect1" name="cat">
                         <?php
                            include('../includes/dbcon.php');

                              $result = mysqli_query($con,"SELECT * FROM category ORDER BY cat_name"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                  </div> 
                  <!-- Title -->
                
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Description</label>
                      <div class="col-lg-8"> 
                        <textarea class="form-control" name="desc" id="title" placeholder="Description"><?php echo $desc;?></textarea>
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Price</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="price" id="title" placeholder="Price" value="<?php echo $price;?>">
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Image</label>
                      <div class="col-lg-8"> 
                        <input type="hidden" class="form-control" id="image" name="image1" value="<?php echo $pic;?>"> 
                        <input type="file" class="form-control" name="image" id="title">
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

<!-- Modal -->
<div id="delete<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Delete Menu</h4>
            </div>
            <div class="modal-body" style="height:140px">
              <!--start form-->
              <form class="form-horizontal" method="post">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
                  <div class="alert alert-danger">
                      Are you sure you want to delete the menu <?php echo $menu;?>?
                    </div>                     
                  <!-- Buttons -->
                  <div class="form-group">
                      <!-- Buttons -->
                      
                        <button type="submit" class="btn btn-sm btn-primary" name="del">Delete</button>
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
                        <input type="text" class="form-control" name="menu" id="title" placeholder="Menu Name" required>
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Category</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2" id="exampleSelect1" name="cat" required>
                         <?php
                            include('../includes/dbcon.php');

                              $result = mysqli_query($con,"SELECT * FROM category ORDER BY cat_name"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                  </div> 
                  <!-- Title -->
                 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Description</label>
                      <div class="col-lg-8"> 
                        <textarea class="form-control" name="desc" id="title" placeholder="Description" required></textarea>
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Price</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="price" id="title" placeholder="Price" required>
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
  mysqli_query($con,"delete from menu WHERE menu_id='$id'")
  or die(mysqli_error($con));
  echo "<script>document.location='menu.php'</script>";
    }
    ?>
<!-- JS -->
<?php include('../includes/js.php');?>  

</body>
</html>