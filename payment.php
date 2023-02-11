<?php session_start();
if(empty($_SESSION['id'])):
header('Location:index.php');
endif;
?>
<?php include 'header.php';?>

<body>
  <?php include 'navbar.php';?>
  <?php include 'menu-tab.php';?>
  
    <div class = "content">
      <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class = "col-md-9 col-lg-9">
          <div class="widget wgreen">
                
                <div class="widget-head">
                  <div class="pull-left">Payment Details</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">

                    <br>
                    <!-- Form starts.  -->
                     <form class="form-horizontal" role="form" action="payment_save.php" method="post">
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Package Details</label>
                                  <div class="col-lg-5">
<?php 
include('includes/dbcon.php');
$id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM reservation natural join combo WHERE rid='$id'");
      $row=mysqli_fetch_array($query);
        $cid=$row['combo_id'];
          echo "<b>".$row['combo_name']."</b>";
      $query1 = mysqli_query($con, "SELECT * FROM combo_details natural join menu WHERE combo_id='$cid'");
        while($row1=mysqli_fetch_array($query1))
        {


?>
                                    <?php   
                                      echo "<br>";
                                      echo $row1['menu_name'];
                                    ?>
         <?php }?>                           
                                  </div>
                                </div>    

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Payment Details</label>
                                  <div class="col-lg-5">
                                  <h4>
                                    <?php
                                      echo $row['pax'];
                                      echo " x ";
                                      echo number_format($row['price'],2);
                                      echo " = ";
                                      echo number_format($row['payable'],2);
                                    ?>
                                   </h4> 
                                  </div>
                                </div>


                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Mode of Payment</label>
                                  <div class="col-lg-5">
                                    <select class="form-control select2 " id="exampleSelect1" name="mode" placeholder="Select occasion" required>
                                     
                                      <option>Cash</option>
                                    </select>
                                  </div>
                                </div>  
                  
                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-6">
                                    <button type="reset" class="btn btn-sm btn-default">Clear</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Next</button>
                                    
                                  </div>
                                </div>
                              </form>
                  </div>
                </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
              </div>    
        </div>
        <?php include('right-sidebar.php');?>
        
      </div>  
    </div>
<?php include 'footer.php';?>   
<?php include 'script.php';?>
<script>
  $(function () {
  //Initialize Select2 Elements
    $(".select2").select2();
  })
$( "#datepicker" ).datepicker({ minDate: 0});


</script>
</body>
</html>



