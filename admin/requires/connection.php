<?php 
  
   mysqli_report(false);
   $conn=mysqli_connect('localhost','root','','onlinebloggingapp');
   if(mysqli_connect_errno())
   {
   	 echo "Error".mysqli_connect_error()."Error No". mysqli_connect_errno();
   }
 ?>
 