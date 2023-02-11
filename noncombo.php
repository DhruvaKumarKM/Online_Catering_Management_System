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
                    <form class="form-horizontal" role="form" action="noncombo_save.php" method="post">
<?php
include('includes/dbcon.php');

   for($i=1;$i<=10;$i++)
    {       
?>    
          <div class="col-md-4">
              <div class="widget">
                <!-- Widget title -->
                <div class="widget-head">
                  <div class="pull-left">Non Combo Meal</div>
                  <div class="widget-icons pull-right">
                  </div>  
                  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content referrer">
                  <!-- Widget content -->
                  
                  <table class="table table-striped table-bordered table-hover">
                    <tbody>
                      <tr>
                      <td><input type="number" class="form-control" placeholder="No. of order/s" name="nop[]"></td>
                    </tr> 
                    <tr>
                      <td>

               
                <select class="form-control select2 " id="exampleSelect1" name="menu[]" placeholder="Select multiple members">
                  <option value="0">--Select Menu--</option>
                  <?php
                      $result = mysqli_query($con,"SELECT * FROM menu"); 
                          while ($row = mysqli_fetch_assoc($result)){
                  ?>
                          <option value="<?php echo $row['menu_id'];?>"><?php echo $row['menu_name'];?></option>
                  <?php } ?>
                </select>
                      </td>
                    </tr>  
               
                    
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



