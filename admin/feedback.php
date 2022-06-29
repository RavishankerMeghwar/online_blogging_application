  <?php 
      error_reporting(0);
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
     <body onload="show_all_feedback()">
         
        <!-- sidebar includes -->
        <?php 
            require_once('requires/sidebar.php');
        ?>

        <div class="container-fluid">
            <!-- Content Row -->
             <h4> <i class="fa-solid fa-circle-arrow-left"></i>&nbsp;<a href="index.php">Back to Home</a></h4>
            <div class="row " style="margin-top:%">
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
                </div>

         <div class="container" id="show-data">
             
         </div>

        <script src="requires/navbar.js"></script>
        <br>
        <br>
          
        <?php 
            require_once('requires/footer.php');
         ?>

   </body>
</html>