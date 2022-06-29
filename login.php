<?php 
    error_reporting(0);
   session_start();
   if(isset($_SESSION['user']))
   {
      if($_SESSION['user']['role_id']==1)
      {
        header('location:admin/index.php');
      }
      elseif($_SESSION['user']['role_id']==2)
      {
        header('location:index.php');
      }
   }

 ?>

 <!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="Online Blogging Application in php and mysql">
    <meta name="description" content="Online Blogging Application in php and mysql">
    <title>Login Page</title>
    <!-- bootstrap Link -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <!-- cdn for font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>


    <style>
      input
      {
        margin: 10px;
      }
      input[type='submit']
      {
        width: 100px;
      }
    </style>
  </head>

  <body style="background:#4682B4;" >

    <?php 
     require_once('requires/navbar.php');

     ?>

      <div class="container" style="margin-top:6%">
        <div class="row justify-content-center" >
          <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <div class="row" >
                  <div class="col-lg-6 d-none d-lg-block" >
                    <img style="margin:30px; border-radius:20px;" src="images/login.webp" height='300px' alt="">        
                  </div>
                  <div class="col-lg-6">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4 fw-bold">Login Here!</h1>
                         <?php if(isset($_REQUEST['error_msg']))
                         {
                           ?>
                              <?=$_REQUEST['error_msg']?>
                            <?php
                          }
                       ?>
                      </div>
                       <form class="user" method="post" action="login-process.php" autocomplete="off">
                         <div class="form-group" >         
                            <input type="email" class="form-control form-control-user" id="email" name="email" required="true" placeholder="User Email ...">
                          </div>
                          <div class="form-group">
                              <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required="true">
                          </div>
                          <p> <input type="submit" class="btn btn-primary btn-user btn-block" name="login" value="login"></p>
                            <hr>
                        </form>
                          <p align="center" class="fw-bold"><a href="forgotpassword.php" style="text-decoration: none;">Forget Password</a></p>
                          <p align="center" class="fw-bold">Don't Have Account Yet <a href="user-registration.php" style="text-decoration: none;">Register</a></p>
                          <hr>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br><br><br><br>
      <?php 
         require_once('requires/footer.php');
      ?>
  </body>
</html>
