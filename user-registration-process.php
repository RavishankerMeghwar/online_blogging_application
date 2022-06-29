<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- cdn for font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


</head>
<body style="background-color:">
<?php
 
   require_once('requires/navbar.php');  
   require_once('admin/database.php');
   require_once('admin/send-mail-class.php');
   require_once('admin/requires/connection.php');


   if(isset($_POST['registration']))
   {
       $error_message="";
       $validate=true;

   	   $first_name=$_POST['first_name'];
       $last_name =$_REQUEST['last_name'];
 
       $email =$_POST['email'];
   	   $cemail =$_POST['confirm_email'];
       $password =$_REQUEST['password'];      
   	   $cpassword =$_REQUEST['confirm_password'];   	  
   	   $address =$_REQUEST['address'];
       $gender =$_REQUEST['gender'];
       $dob =$_REQUEST['dob'];

       $file=$_FILES['file'];
       $size=$_FILES['file']['size'];

        $first_name_pattern="/^[a-zA-Z ]{3,15}$/";
        $email_pattern="/^[\w]{3,20}[@][a-z]{5,}[.]com|org|pk$/";
        $address_pattern="/^[\w\W\s]{10,150}$/";
        $password_pattern="/^[a-zA-Z0-9]{4,}[\W]$/";
      
       if($size <=1000000)
       {
         $file_name=pathinfo($file['name'],PATHINFO_BASENAME);
         $dir='users_images';
         $file_tmp=$_FILES['file']['tmp_name'];
         $size=$_FILES['file']['size']."<br>";
         $image_name=rand(100,10000).$file_name;
         $path=$dir.'/'.$image_name;

         $image_path='../users_images/'.$image_name;
         move_uploaded_file($file_tmp, $path);
       }
       else
       {
           $error_message.="<li>Image size is Greater Than 1MB</li>";
           $validate=false;
        }
        

      
   	   if(empty($first_name))
   	   {
           $error_message.="<li>Please Enter First Name</li>";
           $validate=false;
   	    }
   	    else
   	   {
   	   	   if(!preg_match($first_name_pattern,$first_name))
   	       {
   	   	    	$error_message.="<li>Invalid Name First name only contain Alphabets between 3-15</li>";
   	   	  	    $validate=false;
   	        }
   	    }
	    if($last_name!="")
	    {
   	   	   if(!preg_match($first_name_pattern,$last_name))
   	       {
   	   	    	$error_message.="<li>Invalid Name Last Name only contain Alphabets between 3-15</li>";
   	   	   	   $validate=false;
   	        }
	    }
	    if(empty($password))
   	   {
           $error_message.="<li>Please Enter Password</li>";
           $validate=false;
   	    }
   	   else{
   	   	   if(!preg_match($password_pattern,$password))
   	       {
   	   	  	    $error_message.="<li>Invalid Password Should container alphabets number special</li>";
   	   	  	   $validate=false;
   	        }
   	   }
   	   if(empty($email))
   	   {
           $error_message.="<li>Please Enter Your email</li>";
           $validate=false;
   	   }
   	   else
   	   {
   	   	   if(!preg_match($email_pattern,$email))
   	      {
   	   	  	$error_message.="<li>Invalid Email Should be like abcd@gmail.com</li>";
   	   	  	$validate=false;
   	      }
   	   }
   	 
   	   if(empty($address))
   	   {
           $error_message.="<li>Please Enter Your Address </li>";
           $validate=false;
   	   }
   	   else
   	   {
   	   	   if(strlen($address)<10)
   	       {
   	   	  	    $error_message.="<li>Invalid Address Should between 10-150 words</li>";
   	   	  	    $validate=false;
   	        }
   	   }
   	   if(empty($gender))
   	   {
           $error_message.="<li>Please Select Gender</li>";
           $validate=false;
   	   }

       if(empty($dob))
       {
            $error_message.="<li>Please Select Date of Brith</li>";
            $validate=false;
        }

   	   if($validate==false)
   	   {
   	   	 header("location:Add-new-user.php?error_msg=".$error_message);
   	   }
   	   else
   	   {
            if($email!=$cemail)
           {
               $error_message.="<li>Email and Confirm Email Not Matched</li>";
                $validate=false; 
            }
            if($password!=$cpassword)
           {
               $error_message.="<li>Password and Confirm Password Not Matched</li>";
                $validate=false; 
            }

            if($validate==false)
            {
                 header("location:Add-new-user.php?error_msg=".$error_message);
            }
            else
            {
                $obj = new database();
                $result=$obj->insert_user($first_name,$last_name,$email,$password,$gender,$dob,$address,$image_path);
                if(!$result)
                {
                    echo "Data Not";
                    header('location:user-registration.php?error_msg='.'<div class="alert alert-danger" role="alert">Account Not Created try again Later!</div>');
                }
                else
                {
                   $last_id = mysqli_insert_id($conn);
                   $last_id;
                   $obj=new database();
                   $res=$obj->update_user_record($last_id);
                   $row=mysqli_fetch_assoc($res);

                   $mail=new send_mail_class();
                   $send_mail=$mail->send_to_admin_regis('lagharisajjad98@gmail.com','New User Registration Waiting for Approve','With this '.$row['email'].' Email Address User Registered Waiting For Approve');
                    
                    if($send_mail==true)
                    {
                        echo "Mail Sent";
                    }
                    else
                    {
                        echo "Mail Not Sent";
                    }

                     $sql="SELECT email FROM user WHERE user_id=".$last_id;
                     $result=mysqli_query($conn,$sql);
                     if($result)
                     {
                        $user=mysqli_fetch_assoc($result);
                        $send_mail=$mail->send_to_admin_regis($user['email'],'Online Blogging Application' ,'Dear user Your Account Created if Approved by admin you Can login otherwise wait for approve Waiting For Approve');
                     }
                   

                    ?>                      
                       <div class="container" style="margin-top:6%; padding-bottom: 10%; background-color:#F5F5F5">
                           <h3 class="text-center text-info fw-bold pt-3 pb-2 mb-0" >CONGRATULATIONS </h3>
                           <p class="text-center text-danger fw-bold" style="font-size: 24px; margin-top: -15px;"><?php echo $row['first_name']." ".$row['last_name']; ?></p>
                           <p class="text-center mt-5" style="font-size:20px;">Dear User, Your Online Blogging Application Account has been created successfully. Now login into your account, in order to comment any post</p>
                           <p class="text-center mt-5 "><img src="images/pdf.png" width="60" alt="" ><a href="pdf.php?user_id=<?php echo $row['user_id'] ?>" class="text-center text-danger" style="text-decoration:none">Download Your Registration detail</a></p>

                       </div>
                   <?php
                }                
            }
   	   }
   	 }
     echo "<br>";
     require_once('requires/footer.php');
?>