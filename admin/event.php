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
  <title>Events - <?php include('../includes/title.php');?></title>
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
      <a href="index.html" class="navbar-brand hidden-lg"> Catering Service</a>
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
          <a href="#" class="bread-current">Event</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->



       <!-- Matter -->

      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left"> Events
                    <a href="#addModal" class="btn btn-info" data-toggle="modal">Add New Event</a>
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
                        <th>What</th>
                        <th>Where</th>
                        <th>When</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
include('../includes/dbcon.php');

    $query=mysqli_query($con,"select * from event order by event_date,event_time desc")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['event_id'];
        $what=$row['event_what'];
        $where=$row['event_where'];
        $date=$row['event_date'];
        $time=$row['event_time'];

?>                      
                      <tr>
                        <td><?php echo $what;?></td>
                        <td><?php echo $where;?></td>
                        <td><?php echo date("M d, Y",strtotime($date))." ".date("h:i s a",strtotime($time));?></td>
                        <td>
                            
                              <a href="#update" class="btn btn-info" data-target="#update<?php echo $id;?>" data-toggle="modal">
                                <i class="fa fa-pencil"></i>
                              </a>
                            
                            <a href="#delete" class="btn btn-danger" data-target="#delete<?php echo $id;?>" data-toggle="modal">
                                <i class="fa fa-times"></i>
                              </a>
                        </td>
                      </tr>
<!-- Modal -->
<div id="update<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Update Event Details</h4>
            </div>
            <div class="modal-body" style="height:200px">
              <!--start form-->
              <form class="form-horizontal" method="post" action="event_update.php">
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">What</label>
                      <div class="col-lg-10"> 
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="text" class="form-control" name="what" id="title" placeholder="Description of event" value="<?php echo $what;?>">
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="username">Where</label>
                      <div class="col-lg-10"> 
                        <input type="text" class="form-control" name="where" id="username" placeholder="Location of the event" value="<?php echo $where;?>">
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="password">Date</label>
                      <div class="col-lg-10"> 
                        <div id="datetimepicker1" class="input-append input-group dtpicker">
                          <input data-format="yyyy-MM-dd" type="text" class="form-control datepicker" name="date" value="<?php echo $date;?>">
                          <span class="input-group-addon add-on">
                            <i data-time-icon="fa fa-times" data-date-icon="fa fa-calendar" class="fa fa-calendar"></i>
                          </span>
                        </div>
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="password">Time</label>
                      <div class="col-lg-10"> 
                        <div id="datetimepicker2" class="input-append input-group dtpicker">
                          <input data-format="hh:mm" class="form-control" type="text" name="time" value="<?php echo $time;?>">
                          <span class="input-group-addon add-on">
                            <i data-time-icon="fa fa-clock-o" data-date-icon="fa fa-calendar" class="fa fa-clock-o"></i>
                          </span>
                        </div>
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

<!-- Modal -->
<div id="delete<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Delete Event</h4>
            </div>
            <div class="modal-body" style="height:140px">
              <!--start form-->
              <form class="form-horizontal" method="post">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
                  <div class="alert alert-danger">
                      Are you sure you want to delete the event <?php echo $what;?>?
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
                      <tr>
                        <th>What</th>
                        <th>Where</th>
                        <th>When</th>
                        <th>Action</th>
                      </tr>
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
<script>
      $(document).on("click", ".modal-body", function () {
       $("#datepicker").datepicker({
         dateFormat: 'yy-mm-dd'                                    
         });
          });  
    </script> 
<!-- Modal -->
<div id="addModal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Add New Event</h4>
            </div>
            <div class="modal-body">
              <!--start form-->
              <form class="form-horizontal" method="post" action="event_save.php">
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">What</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="what" id="title" placeholder="Description of event" required>
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="username">Where</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="where" id="username" placeholder="Location of the event" required>
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="password">Date</label>
                      <div class="col-lg-8"> 
                        <div id="datetimepicker1" class="input-append input-group dtpicker">
                          <input type="date" class="form-control" name="date" id="datepicker" required>
                          <span class="input-group-addon add-on">
                            <i data-time-icon="fa fa-times" data-date-icon="fa fa-calendar" class="fa fa-calendar"></i>
                          </span>
                        </div>
                      </div>
                  </div> 
                  <!-- Title -->
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="password">Time</label>
                      <div class="col-lg-8"> 
                        <div id="datetimepicker2" class="input-append input-group dtpicker">
                                      <input data-format="hh:mm" class="form-control" type="time" name="time" id="datepicker" required>
                                      <span class="input-group-addon add-on">
                                        <i data-time-icon="fa fa-clock-o" data-date-icon="fa fa-calendar" class="fa fa-clock-o"></i>
                                      </span>
                                    </div>
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
  mysqli_query($con,"delete from event WHERE event_id='$id'")
  or die(mysqli_error($con));
  echo "<script>document.location='event.php'</script>";
    }
    ?>
<!-- JS -->
<?php include('../includes/js.php');?>  

</body>
</html>