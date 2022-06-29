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
     <body onload="show_all_user_information()">
         
        <!-- sidebar includes -->
        <?php 
            require_once('requires/sidebar.php');
        ?>

        <div class="container-fluid">
              <h4> <i class="fa-solid fa-circle-arrow-left"></i>&nbsp;<a href="index.php">Back to Home</a></h4>
            <!-- Content Row -->
            <div class="row " style="margin-top:2%">
                <h1 class="fw-bold ">USER MENU</h1>
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
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2" >
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <h5  class="fw-bold" onclick="add_new_user()">ADD NEW USER</h5>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2" onclick="show_all_user_information()">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                         <h5  class="fw-bold">VIEW ALL USERS</h5>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                         <h5 onclick="pending_users_request()" class="fw-bold">PENDING REQUEST</h5>

                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                         <h5 onclick="inactive_users_records()" class="fw-bold">INACTIVE USERS</h5>

                                    </div>

                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <div class="container-fluid" id="show-data">
             
         </div>


         <script type="text/javascript">
           
         </script>
         
        <script src="requires/navbar.js"></script>

        <?php 
            require_once('requires/footer.php');
         ?>

   </body>
</html>