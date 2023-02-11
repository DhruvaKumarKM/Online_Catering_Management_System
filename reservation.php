<?php include 'header.php';?>

<body>
  <?php include 'navbar.php';?>
  <?php include 'menu-tab.php';?>
  
    <div class = "content">
      <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class = "col-md-9 col-lg-9">
          <div class="widget wgreen">
                
                <div class="widget-head">
                  <div class="pull-left">Create Reservation</div>
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
                     <form class="form-horizontal" role="form" action="reservation_save.php" method="post">
                              
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">First Name</label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="First Name" name="first" required>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Last Name</label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Last Name" name="last" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Address</label>
                                  <div class="col-lg-5">
                                    <textarea class="form-control" rows="5" placeholder="Complete Address" name="address" required></textarea>
                                  </div>
                                </div>    


                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Contact #</label>
                                  <div class="col-lg-5">
                                    <input type="number" class="form-control" placeholder="Contact #" name="contact" required>
                                  </div>
                                </div>
                                
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Email Address</label>
                                  <div class="col-lg-5">
                                    <input type="email" class="form-control" placeholder="Email Address" name="email">
                                  </div>
                                </div>
                 <div class="form-group">
                                  <label class="col-lg-2 control-label"></label>
                                  <div class="col-lg-5">
                                    <label class="checkbox-inline">
                                      <input type="checkbox" id="inlineCheckbox1" value="option1" required> I agree to the <a href="#facilities" data-toggle="modal">terms and condtion</a> of the Online Catering Management System
                                    </label>
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
    </script>
</body>
</html>



