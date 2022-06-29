<?php
     session_start();
     require_once('admin/database.php');
     require_once('admin/requires/connection.php');

     if(isset($_SESSION['user']))
    {
	    if($_SESSION['user']['role_id']==1)
    	    {
        		header("location:admin/index.php");
    	    }
    		elseif($_SESSION['user']['role_id']==2)
    		{
        		header("location:index.php");
    		}
   	}elseif(isset($_POST['login']))
   	{
   	    	$email=$_POST['email'];
   	    	$password=$_POST['password'];                                     //myleghari@hidayatrust.org,1111111111111
   	    	 
   	    	    $obj = new database();
   	         $result=$obj->login_process($email,$password);
   	         if($result->num_rows)
   	         {
   	         	$user=mysqli_fetch_assoc($result);
   	         	
   	         	if($user['is_approved']=='Approved')
   	        	{
   	        		if($user['is_active']=='Active')
   	        		{
                         $_SESSION['user']=$user;

   			          if($_SESSION['user']['role_id']==1)
   			         {
   			          	header("location:admin/index.php");
   			          }
   			          elseif ($_SESSION['user']['role_id']==2)
   			         {
   			              header("location:index.php");
   			          }
   	        		}
   		        	else
   			    	{
   			           	
   			           	header('location:login.php?error_msg='.'<div class="alert alert-danger" role="alert">Your Account Not Actived Contact With Admin!</div>');
   					    die();
   			    	}
   		    	}
   		    	else
   		    	{
   		           	header('location:login.php?error_msg='.'<div class="alert alert-danger" role="alert">Your Account Not Approved Yet Contact With Admin!</div>');
   				    die();
   		    	}
   	            
   	        }
   		    else
   		    {
   		        header('location:login.php?error_msg='.'<div class="alert alert-danger" role="alert">Invalid Email Or Password!</div>');
   			    die();
   		    }
   	    }
   	else
    {
   		header('location:login.php?error_msg='.'<div class="alert alert-danger" role="alert">Please Login First!</div>');
	     die();
   	}

   
    

   

?>