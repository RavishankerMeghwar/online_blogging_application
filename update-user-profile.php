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
   else
   {
        header('location:login.php?error_msg='.'<div class="alert alert-danger" role="alert">Please Login First!</div>');
   }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

        <script type="text/javascript" src="js/form-validation.js"></script>
        <script type="text/javascript" src="js/update-form-validation.js"></script>
        <script type="text/javascript" src="js/javascript-ajax.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

       <script src="bootstrap/js/bootstrap.bundle.min.js"></script> 

    <!-- cdn for font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


  </head>
  <body >
   <?php 
     require_once('requires/navbar.php');
    ?>

      <?php

         if($_GET['view_profile'])
         {
            $user_id=$_SESSION['user']['user_id'];
            ?>

              <div class="container mt-1 text-white shadow-lg" id="show-data" style="background-color: ;">
                  <div class="row pb-4" style="margin-top:10%">
                    
                    <h1 class="fw-bold text-center p-3 text-uppercase text-primary">Your Account Information</h1>

                    <?php 

                      $user_id=$_SESSION['user']['user_id']??'';
                      $sql="SELECT * FROM user WHERE user_id=".$user_id;
                      $result=mysqli_query($conn,$sql);
                      if($result)
                      {
                        $user=mysqli_fetch_assoc($result);
                      }
                     ?>
                    
                    <div class="col-md-1"></div>
                      <div class="col-md-5 pb-3">
                        <img src="<?php echo substr($user['user_image'],3)?>" alt="" style="width: 400px; height:400px">

                      </div>
                      <div class="col-md-5">
                          <table class="table">
                              <tr>
                                  <th >First Name</th>
                                  <td><?php echo $user['first_name']??''?></td>
                              </tr>
                               <tr >
                                  <th>Last Name</th>
                                  <td><?php echo $user['last_name']??''?></td>
                              </tr>
                               <tr >
                                  <th>Email</th>
                                  <td><?php echo $user['email']??''?></td>
                              </tr >
                               <tr >
                                  <th>Password</th>
                                  <td><?php echo $user['password']??''?></td>
                              </tr>
                              <tr >
                                  <th>Gender</th>
                                  <td><?php echo $user['gender']??''?></td>
                              </tr>
                                <tr>
                                  <th>Date of birth</th>
                                  <td><?php echo $user['date_of_birth']??''?></td>
                              </tr>
                               <tr>
                                  <th>Account Status</th>
                                  <td><?php echo $user['is_active']??''?></td>
                              </tr>
                               <tr>
                                  <th>Address</th>
                                  <td><?php echo $user['address']??''?></td>
                              </tr>
                              <tr>
                                  <th colspan="2"><button onclick="update_user_profile(<?php echo $user['user_id']?>)" class="btn btn-success p-2 mt-2">Edit Profile</button></th>
                              </tr>
                          </table>

                      </div>
                      <div class="col-md-1"></div>
                  </div>
              </div>
            <?php
         }elseif(isset($_GET['change_password']))
         {?>
              <div class="container mt-1" id="show-data" style="background-color: ;">
                  
                      <div class="row justify-content-center mt-5">
                          <div class="col-lg-5 mt-4">
                              <div class="card shadow-lg border-0 rounded-lg mt-5">
                                  <div class="card-header"><h3 class="text-center font-weight-light my-4">Reset Password</h3></div>
                              <div class="card-body">
                                      
                                  <div class="form-group mb-2">
                                    <strong>Enter Old Password <span class="text-danger">*</span></strong>
                                    <input type="password" minlength="8" id="olpassword" maxlength="40" name="oldp" placeholder="Enter Old Password" required class="form-control">
                                    <input type="hidden" minlength="8" id="email" value="<?php echo $_SESSION['user']['email'] ?>" maxlength="40" name="email"  required class="form-control">
                                 
                                  </div>
                                            
                                  <div class="form-group mb-2">
                                    <center>
                                      <button  class="btn btn-dark" onclick="change_user_pass()" type="submit" class="form-control"><i class="fa fa-check"></i>  Verify</button>
                                    </center>

                                  </div>
                             </div>
                          </div>
                      </div>
                  </div>
                  <br>
                  <br><br>
                </div>
                  <?php

         }
       ?>

       <script>
           function update_user_profile(user_id)
           {
              var xhr=null;
              if(window.XMLHttpRequest)
             {
                  xhr=new XMLHttpRequest();
              }
              else
             {
                  xhr=new ActiveXObject('Microsoft.XMLHTTP');
              }
              xhr.open("GET",'admin/ajax-process.php?action=update_user_profile&user_id='+user_id,true);
              xhr.onreadystatechange=function()
             {
                  if(xhr.readyState==4 && xhr.status==200)
                 {
                      document.getElementById('show-data').innerHTML=xhr.responseText;

                  }
              }
              xhr.send();
           }
       </script>
    
    <br><br> 
       <?php 
          require_once('admin/requires/connection.php');
          require_once('requires/footer.php');
        ?>

</body>
</html>