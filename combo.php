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
                  <div class="pull-left">Select Combo/s</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content" style="height:650px">
                  <div class="padd">
                    <form class="form-horizontal" role="form" action="combo_save.php" method="post">
<?php
include('includes/dbcon.php');

    $query=mysqli_query($con,"select * from combo order by combo_name")or die(mysqli_error($con));
      $count=mysqli_num_rows($query);
      while ($row=mysqli_fetch_array($query)){
        $id=$row['combo_id'];
        $name=$row['combo_name'];
        $price=$row['combo_price'];

       
?>    
          <div class="col-md-4">
              <div class="widget">
                <!-- Widget title -->
                <div class="widget-head">
                  <div class="pull-left"><?php echo $name;?> - P<?php echo $price;?></div>
                  <div class="widget-icons pull-right">
                    
                    <input type="hidden" id="inlineCheckbox1" value="<?php echo $count;?>" name="count">
                    <input type="checkbox" id="inlineCheckbox1" value="<?php echo $id;?>" name="combo_id[]">
                    <input type="hidden" value="<?php echo $price;?>" name="price[]">
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content referrer">
                  <!-- Widget content -->
                  
                  <table class="table table-striped table-bordered table-hover">
                    <tbody>
                      <tr>
                      <td><input type="number" class="form-control" placeholder="No. of persons" name="nop[]"></td>
                    </tr> 
<?php

    $query1=mysqli_query($con,"select * from combo_details natural join category where combo_id='$id'")or die(mysqli_error($con));
      while ($row1=mysqli_fetch_array($query1)){
        $cid=$row1['combo_details_id'];
        $cat_id=$row1['cat_id'];
        $catname=$row1['cat_name'];
        
?>                        
                    <tr>
                      <td><?php echo $catname;?></td>
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
                  <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-6">
                                    <button type="reset" class="btn btn-sm btn-default">Clear</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Next</button>
                                    
                                  </div>
                                </div>
                </div>

              </div>		
          </form>
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



