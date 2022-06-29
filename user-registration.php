<?php 
    error_reporting(0);
  session_start();
  if(isset($_SESSION['user']))
  {
     if($_SESSION['user']['role_id']==1)
     {
        header('location:admin/index.php');
     }
     if($_SESSION['user']['role_id']==2)
     {
        session_destroy();
        header('location:login.php?error_msg='.'<div class="alert alert-success" role="alert">Logout Successfully!</div>');
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


    <!-- form-validation link -->
    <script src="./admin/js/form-validation.js"></script>
    <script src="./admin/js/check-email-exist.js"></script>

   <style>
     .span
     {
      color: red;
     }
   </style>
  </head>

  <body style="background:#4682B4;" >

    <?php 
     require_once('requires/navbar.php');


     ?>   
     <!-- Add New Users Form Here-->          
     <div class="container mb-5" style="margin-top:6%">
      
       <div class="row justify-content-center  mb-5 ">
         <div class="col-lg-12 col-xl-11">
           <div class="card text-black mb-5 mt-3" style="border-radius: 25px; ">
             <div class="card-body p-md-5">
               <div class="row justify-content-center">
                 <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
               
                   <p class="text-center h1 fw-bold mb-5 mt-4">ADD NEW USER</p>   
                     <?php if(isset($_REQUEST['error_msg']))
                     {
                       ?>
                       <ul>
                         <?=$_REQUEST['error_msg']?>
                       </ul>
                       <?php
                     }
                   ?>
                   <span class='span' id="match_email_msg"></span><br>
                   <span class='span' id="match_password_msg"></span>
                   
                   <form class="mx-1 mx-md-4" method="POST" onsubmit="return validation()"  action="user-registration-process.php" enctype="multipart/form-data">

                     <div class="d-flex flex-row align-items-center mb-4">
                       <i class="fas fa-user fa-lg me-3 fa-fw"></i>&nbsp;
                       <div class="form-outline flex-fill mb-0">
                         <span class="span" id="first_name_msg"></span>
                         <input type="text" id="first_name" name="first_name"  placeholder="Please Enter First Name" class="form-control" />
                         <label class="form-label" >First Name</label>
                       </div>
                     </div>
                     <div class="d-flex flex-row align-items-center mb-4">
                       <i class="fas fa-user fa-lg me-3 fa-fw"></i>&nbsp;
                       <div class="form-outline flex-fill mb-0">
                         <span id="last_name_msg"></span>
                         <input type="text"   placeholder="Please Enter Last Name" id="last_name" name="last_name" class="form-control" />
                         <label class="form-label" for="form3Example1c">Last Name</label>
                       </div>
                     </div>

                     <div class="d-flex flex-row align-items-center mb-4">
                       <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>&nbsp;
                       <div class="form-outline flex-fill mb-0">
                         <span class="span" id="email_msg"></span>
                         <input type="email" onblur="check_email_exist()" placeholder="Enter Email" id="email" name="email"  class="form-control" />
                         <label class="form-label" >Email</label>
                       </div>
                     </div>

                     <div class="d-flex flex-row align-items-center mb-4">
                       <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>&nbsp;
                       <div class="form-outline flex-fill mb-0">
                         <span class="span" id="confirm_email_msg"></span>
                         <input type="email"   placeholder="Enter Repeate Email" name="confirm_email" id="confirm_email"  class="form-control" />
                         <label class="form-label" >Confirm Email</label>
                       </div>
                     </div>

                     <div class="d-flex flex-row align-items-center mb-4">
                       <i class="fas fa-lock fa-lg me-3 fa-fw"></i>&nbsp;
                       <div class="form-outline flex-fill mb-0">
                         <span class="span" id="password_msg"></span>
                         <input type="password"  placeholder="Please Enter  Password Here" name="password" id="password"   class="form-control" />
                         <label class="form-label" >Password <span class="span"> Minimum 8 size Character number and Special Character</span></label>
                       </div>
                     </div>

                     <div class="d-flex flex-row align-items-center mb-4">
                       <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                       <div class="form-outline flex-fill mb-0">
                         <span class="span" id="confirm_password_msg"></span>
                         <input type="password"  placeholder="Enter Confirm Password Here" name="confirm_password" id="confirm_password"  class="form-control" />
                         <label class="form-label" >Confirm Password</label>
                       </div>
                     </div>

                     <div class="d-flex flex-row align-items-center mb-4">
                       <i class="fa-solid fa-lg me-3 fa-user"></i>
                       <div class="form-outline flex-fill mb-0">
                         <span class="span" id="gender_msg"></span>
                         <select id="gender" class="form-control" name="gender">
                           <option value="">--Select Gender--</option>
                           <option value="Male">Male</option>
                           <option value="Female">Female</option>
                         </select>
                       </div>
                     </div>

                     <div class="d-flex flex-row align-items-center mb-4">
                       <i class="fa-solid fa-lg me-3 fa-calendar"></i>&nbsp;
                       <div class="form-outline flex-fill mb-0">
                         <span class="span" id="dob_msg"></span>
                         <input type="date" name="dob" id="date"  placeholder="Enter Confirm Password"  class="form-control" />
                         <label class="form-label" >Data of Brith</label>
                       </div>
                     </div>

                     <div class="d-flex flex-row align-items-center mb-4">
                       <img src="images/user-icon.png" width="30">&nbsp;
                       <div class="form-outline flex-fill mb-0">
                         <span class="span" id="image_msg"></span>
                         <input type="file" name="file" id="image" required="true" accept="image/*"  class="form-control" />
                         <label class="form-label" >Select Profile <span class="span">Maximum Size 1MB</span></label>
                       </div>
                     </div>


                     <div class="d-flex flex-row align-items-center mb-4">
                       <i class="fa-solid fa-lg me-3 fa-location-dot"></i>&nbsp;
                       <div class="form-outline flex-fill mb-0">
                         <span class="span" id="address_msg"></span>
                         <textarea id="address"  name="address" class="form-control" placeholder="Enter User Address Here"></textarea>
                         <label class="form-label" >Address <span class="span"> Minimum 10 Words </span></label>
                       </div>
                     </div>

                     <div class="form-check d-flex justify-content-center">
                       <span class="span" id="term_msg"></span><br /> 
                     </div>
                       <div class="form-outline flex-fill mb-0">
                       <input class="form-check-input me-2" name="term" type="checkbox" value="" id="term" />
                       <label class="form-check-label"  for="form2Example3">
                         I agree all statements in <a href="#!">Terms of service</a>
                       </label>
                     </div> 

                        <br>
                     <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                       <button type="submit" name="registration"  class="btn btn-primary btn-lg" >Register</button>
                     </div>

                   </form>

                 </div>
                 <div class="col-md-6 col-lg-6 col-xl-6 d-flex align-items-center order-1 order-lg-2">

                   <img src="images/regist_form.jpg"  class="img-fluid rounded" alt="Sample image" style="height:79%">

                 </div>
               </div>
                <p class="fw-bold">Already Have an Account <a href="login.php" class="fw-bold" style="text-decoration: none;">Login</a> </p>
             </div>            
           </div>
         </div>
       </div>
     </div>
     

      <?php 
       require_once('requires/footer.php');

       ?>

  </body>
  </html>