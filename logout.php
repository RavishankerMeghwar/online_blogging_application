<?php
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
   else
   {
         header('location:login.php?error_msg=Please Login First');
   }




?>