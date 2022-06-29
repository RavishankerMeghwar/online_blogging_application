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
     <body onload="show_posts()">
         
        <!-- sidebar includes -->
        <?php 
            require_once('requires/sidebar.php');
        ?>

        <div class="container-fluid">
            <!-- Content Row -->
             <h4> <i class="fa-solid fa-circle-arrow-left"></i>&nbsp;<a href="index.php">Back to Home</a></h4>
            <div class="row " style="margin-top:%">
                <h1 class="fw-bold text-center">POST SECTION</h1>
                
                <?php if(isset($_REQUEST['error_msg']))
                   {
                     ?>
                     <ul>
                       <?=$_REQUEST['error_msg']?>
                     </ul>
                     <?php
                   }
                 ?>
                <p id="show_msg"></p>
                <hr />

                <!--  -->
                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2" >
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <h5  class="fw-bold" onclick="post_form()" >CREATE NEW POST</h5>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-blog fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2" onclick="show_posts()">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                         <h5  class="fw-bold">VIEW ALL POSTS</h5>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-blog fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2" onclick="show_post_attachment()">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                         <h5  class="fw-bold">POST ATTACHMENTS</h5>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-blog fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

               
                <div class="col-xl-1 col-md-6 mb-4"></div>
            </div>
        </div>

         <div class="container" id="show-data">
             
         </div>


         <script type="text/javascript">
            
         </script>
         
        <script src="requires/navbar.js"></script>
        <br>
        <br>
          
        <?php 
            require_once('requires/footer.php');
         ?>

   </body>
</html>