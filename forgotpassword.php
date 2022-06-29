<?php 
    error_reporting(0);
   session_start();
   if(isset($_SESSION['user']))
   {
      if($_SESSION['user']['role_id']==1)
      {
         header('location:admin/index.php');
      }
   }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- cdn for font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <script src="admin/js/check-email-exist.js"></script>
    <script type="text/javascript" src="admin/js/javascript-ajax.js"></script>


</head>
<body >
   <?php 
     require_once('requires/navbar.php');
    ?>
<div class="container " style="margin-top:8%;">
    <div class="card shadow-lg bg-white p-2" style="width:50%; margin: auto;">
      <div class="card-body ">
        <h4 align="center" >ONLINE BLOGGING APPLICATION</h4>  
        <h6 align="center" style="text-transform: uppercase; color: #85929E;">Forget Password</h6>
        <hr/>
        <form action="database-process.php" method="POST" id="form">
          <div class="form-group mb-2">
            <strong>Email Address <span class="text-danger" >*</span></strong>
            <input type="email" minlength="5" id="email" maxlength="40" onblur="forget_password_email()" name="email" placeholder="Enter your email address" required class="form-control">
            <p style="font-size: 14px;" class="text-success" id="email_msg">please provide your registered email</p>
          </div>

          <div class="form-group mb-2">
            <center>
              <a href="login.php" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Back to Login</a>
              <button name="forgotpassword" class="btn btn-dark" type="submit" class="form-control"><i class="fa fa-check"></i>  Verify</button>
            </center>

          </div>
        </form>
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>


      <?php 
        require_once('requires/footer.php');
       ?>
  </body>
  </html>