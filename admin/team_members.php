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
  <title>Members - <?php include('../includes/title.php');?></title>
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
      <a href="index.html" class="navbar-brand hidden-lg">Catering Services</a>
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
          <a href="#addModal" class="btn btn-info" data-toggle="modal">Add New Team</a>
        </h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="index.html"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Maintenance</a>
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Team Members</a>
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

    $query=mysqli_query($con,"select * from team natural join team_member group by team_id")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['team_id'];
        $team=$row['team_name'];
        $mid=$row['member_id'];
        $tid=$row['team_member_id'];
       
?>  
<!-- Modal -->
<div id="delete<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Delete Team</h4>
            </div>
            <div class="modal-body" style="height:140px">
              <!--start form-->
              <form class="form-horizontal" method="post">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
                  <div class="alert alert-danger">
                      Are you sure you want to delete <?php echo $team;?>?
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
              <h4 class="modal-title">Update Team Members</h4>
            </div>
            <div class="modal-body" style="height:200px">
              <!--start form-->
              <form class="form-horizontal" method="post" action="team_member_update.php" enctype='multipart/form-data'>
                  <!-- Title -->
                  <input type="hidden" name="id" value="<?php echo $id;?>">
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Team Name</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2" id="exampleSelect1" name="team" style="width: 100%;">
                          <option value="<?php echo $id;?>"><?php echo $team;?></option>";
                         
                        </select>
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="username">Members</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2 " id="exampleSelect1" name="members[]" multiple='multiple' style="width: 100%;height:200px" placeholder="Select multiple members">
                        <?php
                         $m = mysqli_query($con,"SELECT * FROM team_member natural join member where team_id='$id'"); 
                                  while ($rowm = mysqli_fetch_assoc($m)){  
                         ?>
                            <option selected value="<?php echo $rowm['member_id'];?>"><?php echo $rowm['member_first']." ,".$rowm['member_last'];?></option>
                         <?php           
                                  }
                        ?>  
                         <?php
                              $result = mysqli_query($con,"SELECT * FROM member where member_status='active' ORDER BY member_first"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option value="<?php echo $row['member_id'];?>"><?php echo $row['member_first']." ,".$row['member_last'];?></option>
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
                  <div class="pull-left"><?php echo $team;?></div>
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

    $query1=mysqli_query($con,"select * from team_member natural join member where team_id='$id'")or die(mysqli_error($con));
      while ($row1=mysqli_fetch_array($query1)){
        $mid=$row1['member_id'];
        $last=$row1['member_last'];
        $first=$row1['member_first'];
        $member=$last." ,".$first;
?>                        
                    <tr>
                      <td><?php echo $first." ,".$last;?></td>
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
              <h4 class="modal-title">Add New Team and Members</h4>
            </div>
            <div class="modal-body">
              <!--start form-->
              <form class="form-horizontal" method="post" action="team_member_save.php">
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Team Name</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2" id="exampleSelect1" name="team" style="width: 100%;">
                         <?php
                              $result = mysqli_query($con,"SELECT * FROM team ORDER BY team_name"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option value="<?php echo $row['team_id'];?>"><?php echo $row['team_name'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="username">Members</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2 " id="exampleSelect1" name="members[]" multiple='multiple' style="width: 100%;height:200px" placeholder="Select multiple members">
                         <?php
                              $result = mysqli_query($con,"SELECT * FROM member where member_status='active' ORDER BY member_first"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option value="<?php echo $row['member_id'];?>"><?php echo $row['member_first']." ".$row['member_last'];?></option>
                        <?php } ?>
                        </select>
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
  mysqli_query($con,"delete from team_member WHERE team_id='$id'")
  or die(mysqli_error($con));
  echo "<script>document.location='team_members.php'</script>";
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