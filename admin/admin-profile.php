<?php 
    session_start();
    if(isset($_SESSION['user']))
    {
        if($_SESSION['user']['role_id']==2)
        {
            header("location:../index.php");
        }
    }
    else
    {
        header('location:../login.php?error_msg='.'<div class="alert alert-danger" role="alert">Please Login First!</div>');
         die();
    }
    require_once('database.php');
    require_once('requires/connection.php');
    require_once('send-mail-class.php');
   

 ?>
 <!DOCTYPE html>
     <html>
     <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Home Page</title>
        
        <script type="text/javascript" src="js/form-validation.js"></script>
        <script type="text/javascript" src="js/update-form-validation.js"></script>
        <script type="text/javascript" src="js/javascript-ajax.js"></script>
     
        <script src="js/check-email-exist.js"></script>

         <style>
            
             h5:hover
             {
                cursor: pointer;
             }
                 .span
                 {
                   color: red;
                 }
                 ul li
                 {
                   color: red;
                   list-style: none;
                 }
               
         </style>
     </head>
     <body >
         
        <!-- sidebar includes -->
        <?php 
            require_once('requires/sidebar.php');
        ?>

        <div class="container-fluid">
              <h4> <i class="fa-solid fa-circle-arrow-left"></i>&nbsp;<a href="index.php">Back to Home</a></h4>
            <!-- Content Row -->
            <div class="row " style="margin-top:2%">
                <h1 class="fw-bold text-center">PROFILE DETAILS</h1>
                <hr />
                
                 <?php if(isset($_REQUEST['error_msg']))
                    {
                      ?>
                      <ul>
                        <?=$_REQUEST['error_msg']?>
                      </ul>
                      <?php
                    }
                  ?>
                <!--  Show Message-->
                <h3 id="show_msg"></h3>
                <div class="col-md-2"></div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2" >
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <?php
                                      $user_id=$_SESSION['user']['user_id']??'';
                                      $obj=new database();
                                      $result = $obj->view_profile($user_id);
                                      $row=mysqli_fetch_assoc($result);
                                     ?>
                                        <h5  class="fw-bold" onclick="view_profile(<?php echo $row['user_id']?>)">View Your Profile</h5>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-address-card fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2" onclick="change_password_form()">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                         <h5  class="fw-bold">CHANGE PASSWORD</h5>

                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-lock fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


         <div class="container-fluid" id="show-data">
          
          <img src="https://iotvnaw69daj.i.optimole.com/AXVzL2w.n2y9~6666f/w:auto/h:auto/q:mauto/f:avif/https://www.codeinwp.com/wp-content/uploads/2022/01/Best-Admin-Dashboard-Templates.jpg" style="height:450px; width: 71%; margin-left:15%; border-radius:30px">
             
         </div>


         <script type="text/javascript">
           
         </script>
         
        <script src="requires/navbar.js"></script>

        <?php 
            require_once('requires/footer.php');
         ?>

   </body>
</html>