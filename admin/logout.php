<?php
   session_start();
   if(isset($_SESSION['user']))
   {
      session_destroy();
         header('location:../login.php?error_msg='.'<div class="alert alert-success" role="alert">Logout Successfully!</div>');
   }
   else
   {
         header('location:../login.php?error_msg='.'<div class="alert alert-danger" role="alert">Please login First!</div>');
   }
  


  

?>