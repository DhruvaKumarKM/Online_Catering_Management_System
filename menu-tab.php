<!-- Header starts -->
  <header>
    <div class="container">
      <div class="row">
        <!-- Logo section -->
        <div class="col-md-4">
          <!-- Logo. -->
          <div class="logo">
           <a href="index.php"> <h2 class = "logo-text" style="font-family:American Typewriter, serif"><span class="bold">Catering Service</span></h2></a>	
           
          </div>
          <!-- Logo ends -->
        </div>
        <!-- Button section -->
        <div class="col-md-7">
          <!-- Buttons -->
          <ul class="nav nav-tabs">
            <!-- Comment button with number of latest comments count -->          

            <!-- Message button with number of latest messages count-->
			<li class="dropdown dropdown-big">
              <a  href="index.php">
                <i class="fa fa-home"></i> Home
              </a>                
            </li>
			
			
            <li class="dropdown dropdown-big">
              <a href="menu.php">
                <i class="fa fa-cutlery"></i> Menu
              </a>                
            </li>
			
	
            <!-- Members button with number of latest members count -->
            <li class="dropdown dropdown-big">
                         <a href="reservation.php">
                <i class="fa fa-pencil"></i> Schedule of Reservation 
              </a>                
            </li> 
			<!-- Members button with number of latest members count -->
            <li class="dropdown dropdown-big">
              <a class="dropdown-toggle" href="messages.php">
                <i class="fa fa-comment"></i> Messages 
              </a>                
            </li> 
   
      
       


        <!-- Data section -->
         
         
		<?php include 'login_modal.php'; ?>
		<?php include 'details_modal.php'; ?>		
	  <?php include 'reservation_modal.php'; ?>
	  <?php include 'facilities_modal.php'; ?>
	  <?php include 'culinary_modal.php'; ?>
    
  </header>
  