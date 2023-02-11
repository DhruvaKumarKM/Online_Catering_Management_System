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
                  <div class="pull-left">Combo Details</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">
                    <form class="form-horizontal" role="form" action="r_details_save.php" method="post">
                      
<?php
$id=$_SESSION['id'];

include('includes/dbcon.php');

    $query=mysqli_query($con,"select * from r_details natural join combo where rid='$id'")or die(mysqli_error($con));
      while($row=mysqli_fetch_array($query)){
        $cid=$row['combo_id'];
        $rdid=$row['r_details_id'];

?>    
  <div class = "col-md-6 col-lg-6">
        <h3><?php echo $row['combo_name'];?></h3>
        <!-- Form starts.  -->
<?php

    $query1=mysqli_query($con,"select * from combo_details natural join category where combo_id='$cid'")or die(mysqli_error($con));
      while($row1=mysqli_fetch_array($query1)){
        $cat_id=$row1['cat_id'];

?>          
        <div class="form-group">
            <label class="control-label col-lg-4" for="username">Select <?php echo $row1['cat_name'];?></label>
            <div class="col-lg-8"> 
                <input type="hidden" value="<?php echo $rdid;?>" name="rdid[]">
                <select class="form-control select2 " id="exampleSelect1" name="menu[]" placeholder="Select multiple members">
                  <?php
                      $result = mysqli_query($con,"SELECT * FROM menu where cat_id='$cat_id'"); 
                          while ($row = mysqli_fetch_assoc($result)){
                  ?>
                          <option value="<?php echo $row['menu_id'];?>"><?php echo $row['menu_name'];?></option>
                  <?php } ?>
                </select>
            </div>
        </div> 
        <?php }?>
</div>       
                       <?php }?>
                

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
    </script>
</body>
</html>



