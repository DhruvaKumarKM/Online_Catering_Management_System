<?php include 'header.php';?>


<body class = "admin_body" style = "background-image: url('../img/restaurant.jpg');background-repeat: no-repeat;background-size: cover;">

<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    
    <a style = "color:white;" href="../index.php">Administrator</a>
  </div><br>
  <!-- User name -->
 

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
     <div class="lockscreen-image">
      <img src="../img/key.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" action = "login.php"method = "POST">
      <div class="input-group">
     <br>   <input type="username" name = "username" class="form-control" placeholder="username" ><br>
       <br> <input type="password" name = "password" class="form-control" placeholder="password" autofocus><br>
       <br> <button name = "login"class="btn"><i class=""></i>Login</button></br>
       <a href="./forgot1/forgot-password.php" >forgot password?</a>



       <br> <div class="input-group-btn">
       
      </div>
    </form>
  
  
  
    <!-- /.lockscreen credentials -->

  </div>
  
    

<!-- JS -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>