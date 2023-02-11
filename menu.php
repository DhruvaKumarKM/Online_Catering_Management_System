4
<!DOCTYPE html>
<html lang="en">
<?php include 'header.php';?>

<body>

<?php include 'navbar.php';?>
<?php include 'menu-tab.php';?>
<!-- Main content starts -->

<div class="content">

    
      <!-- Matter -->

      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Menu</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
<?php
  include('includes/dbcon.php');
  $query=mysqli_query($con,"select * from subcategory")or die(mysqli_error($con));
    while ($row=mysqli_fetch_array($query)){
      $subcat_id=$row['subcat_id'];
      $subcat_name=$row['subcat_name'];
?>   

                <div class="widget-content">
                  <div class="padd">
                    <h3><?php echo $subcat_name;?></h3>
                    <div class="gallery">
                      <!-- Full size image link in anchor tag. Thumbnail link in image tag. -->
<?php
            
              $querym=mysqli_query($con,"select * from menu natural join subcategory where subcat_id='$subcat_id' order by menu_name")or die(mysqli_error($con));
              while ($rowm=mysqli_fetch_array($querym)){
                $mid=$rowm['menu_id'];
                $menu=$rowm['menu_name'];
                /* $cat=$rowm['cat_name']; */
                $subcat=$rowm['subcat_name'];
                $desc=$rowm['menu_desc'];
                $price=$rowm['menu_price'];
                $pic=$rowm['menu_pic'];
?>                        
                   <div class="col-md-3">
                     <div class="panel panel-default">
                    <div class="panel-heading text-center">
                      <b><?php echo $menu=$rowm['menu_name']; ?></b>
                    </div>
                    <div class="panel-body  text-center">
                        <img src="images/<?php echo $pic;?>"   else{echo $rowm['photo'];} "  height="150px;" width="100%">
                    </div>
                    <div class="panel-footer text-center">
                    <?php echo number_format($price=$rowm['menu_price'], 2); ?>
                    </div>
                  </div>
                </div>
                     <?php }?>
                    </div>

                  </div><!--pad-->
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div><!--widget-->
<?php }?>                
              </div>  
              
            </div>


            <div class="col-md-4">
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Combo</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
<?php
  include('includes/dbcon.php');
  $query=mysqli_query($con,"select * from combo")or die(mysqli_error($con));
    while ($row=mysqli_fetch_array($query)){
      $combo_id=$row['combo_id'];
      $combo_name=$row['combo_name'];
      $price=$row['combo_price'];
?>   

                <div class="widget-content">
                  <div class="padd">
                    <h2><?php echo $combo_name." - <span class='label label-primary'>P".$price."</span>";?></h2>
                    
                      <!-- Full size image link in anchor tag. Thumbnail link in image tag. -->
        <h1>  <?php
              $querym=mysqli_query($con,"select * from combo_details natural join menu where combo_id='$combo_id' group by menu_id")or die(mysqli_error($con));
              while ($rowm=mysqli_fetch_array($querym)){
                
                $menu_name=$rowm['menu_name'];
?>   </h1>                     
                    <!-- Widget content -->
                  <!-- activity starts -->
                 

                    <li>
                      <!-- Icon with avtivity  -->
                      <?php echo $menu_name;?>
                    </li>

              

                     <?php }?>
                    

                  </div><!--pad-->
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div><!--widget-->
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

<?php include 'footer.php';?> 
<?php include 'script.php';?>
</body>
</html>