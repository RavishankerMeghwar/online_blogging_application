<?php 
    error_reporting(0);
   session_start();
   require_once('admin/database.php');
   require_once('admin/requires/connection.php');
   require_once('admin/send-mail-class.php');


   if(isset($_POST['feedback_form']))
   {
	  	$name     =  $_POST['name'];
	  	$email    =  $_POST['email'];
	  	$feedback =  $_POST['feedback'];

	  	if(isset($_SESSION['user']))
	  	{
	  		$user_id=$_SESSION['user']['user_id'];
	  	  	$obj=new database();
		  	$result=$obj->insert_feedback($user_id,$name,$email,$feedback);
		  	if($result)
		  	{
		  		header('location:feedback.php?error_msg=Your feedback sent to Admin of Online Blogging Application&color=green');
		  	}
		  	else
		  	{
		  		header('location:feedback.php?error_msg=Your feedback not sent to Online Blogging Application try again later&color=red');
		  	}
	  	}
	  	else
	  	{
	  	  	$obj=new database();
		  	$result=$obj->insert_feedback_unsesion($name,$email,$feedback);
		  	if($result)
		  	{
		  		header('location:feedback.php?error_msg=Your feedback sent to Admin of Online Blogging Application&color=green');
		  	}
		  	else
		  	{
		  		header('location:feedback.php?error_msg=Your feedback not sent to Online Blogging Application try again later&color=red ');

		  	}
	  	}

	}
	elseif(isset($_POST['forgotpassword']))
	{
		$email=$_POST['email'];
		
		$obj=new database();
		$result=$obj->forgotpasswor($email);
		if($result->num_rows)
		{
			$row=mysqli_fetch_assoc($result);
			$mail=new send_mail_class();
         $send_mail=$mail->send_to_admin_regis($row['email'],'Account Password','Dear user your account password is '.$row['password']);
         header('location:login.php?error_msg='.'<div class="alert alert-success" role="alert">Your Account Password Sent To Your Email!</div>');
		}
		else
		{
			header('location:login.php?error_msg='.'<div class="alert alert-danger" role="alert">With Your Email Account Not Found!</div>');
		}
		}
		else
		{
				header('location:login.php?error_msg='.'<div class="alert alert-danger" role="alert">Login first Please!</div>');		
		}
	if(isset($_POST['update_user_profile']))
	{
	    $error_message="";
	    $validate=true;

	    $first_name=$_POST['first_name'];
	    $last_name =$_REQUEST['last_name'];

	    $role_id =$_REQUEST['role_id'];
	    $user_id =$_REQUEST['user_id'];
	
	    $email =$_POST['email'];
	    $password =$_REQUEST['password'];      
	    $address =$_REQUEST['address'];
	 
	    $file=$_FILES['file'];
	    $size=$_FILES['file']['size'];

	     $first_name_pattern="/^[a-zA-Z ]{3,15}$/";
	     $email_pattern="/^[\w]{3,20}[@][a-z]{5,}[.]com|org|pk$/";
	     $address_pattern="/^[\w\W\s]{10,150}$/";
	     $password_pattern="/^[a-zA-Z0-9]{4,}[\W]$/";
	   
	    
	    if($size=$_FILES['file']['size']>0)
	    {
	        if($size <=1000000)
	        {
	          $file_name=pathinfo($file['name'],PATHINFO_BASENAME);
	          $dir='users_images';
	          $file_tmp=$_FILES['file']['tmp_name'];
	          $size=$_FILES['file']['size']."<br>";
	          $path=$dir."/".rand(100,10000).$file_name;
	          move_uploaded_file($file_tmp, $path);
	          $path='../'.$path;
	        }
	        else
	        {
	            $error_message.="<li>Image size is Greater Than 1MB</li>";
	            $validate=false;
	         }
	     }
	     else
	     {
	         $obj = new database();
	         $result=$obj->update_user_record($user_id);
	         $row=mysqli_fetch_assoc($result);
	         $path=$row['user_image'];
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
	    
	    if($validate==false)
	    {
	      header("location:update-user-profile.php?error_msg=".$error_message."&pdate-user-profile.php?view_profile='view_profile'");
	    }
	    else
	    {
	       $obj = new database();
	       $result=$obj->update_user_records($user_id,$role_id,$first_name,$last_name,$email,$password,$address,$path);
	       if(!$result)
	       {
	           header('location:update-user-profile.php?error_msg='.'<div class="alert alert-danger" role="alert">Data Not Updated try again Later!</div>&view_profile=view_profile');
	       }
	       else
	       {
	           header('location:update-user-profile.php?error_msg='.'<div class="alert alert-success" role="alert">Record Updated Successfully!</div>&view_profile=view_profile');
	       }
	         
	    }
	 }
	 ?>