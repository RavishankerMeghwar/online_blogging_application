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

   require_once('database.php');
   require_once('send-mail-class.php');
   require_once('requires/connection.php');

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
         $dir='../users_images';
         $file_tmp=$_FILES['file']['tmp_name'];
         $size=$_FILES['file']['size']."<br>";
         $path=$dir."/".rand(100,10000).$file_name;
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
                $result=$obj->insert($first_name,$last_name,$email,$password,$gender,$dob,$address,$path);
                if(!$result)
                {
                    header('location:users.php?error_msg='.'<div class="alert alert-danger" role="alert">Account Not Created try again Later!</div>');
                }
                else
                {
                    header('location:users.php?error_msg='.'<div class="alert alert-success" role="alert">Account Created Successfully!</div>');
                }                
            }
   	   }
   	 }
    elseif(isset($_POST['update']))
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
             $dir='../users_images';
             $file_tmp=$_FILES['file']['tmp_name'];
             $size=$_FILES['file']['size']."<br>";
             $path=$dir."/".rand(100,10000).$file_name;
             move_uploaded_file($file_tmp, $path);
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
         header("location:Add-new-user.php?error_msg=".$error_message);
       }
       else
       {
          $obj = new database();
          $result=$obj->update_user_records($user_id,$role_id,$first_name,$last_name,$email,$password,$address,$path);
          if(!$result)
          {
              header('location:users.php?error_msg='.'<div class="alert alert-danger" role="alert">Data Not Updated try again Later!</div>');
          }
          else
          {
                $res=$obj->update_user_record($user_id);
                $row=mysqli_fetch_assoc($res);
                $mail=new send_mail_class();
                $send_mail=$mail->send_to_admin_regis($row['email'],'Account Updated','Dear user your account of  Online Blogging Application Updated By Admin if you have any query please contact with admin');
             
              header('location:users.php?error_msg='.'<div class="alert alert-success" role="alert">Record Updated Successfully!</div>');
          }
            
       }
    }
     elseif(isset($_POST['update_admin']))
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
              $dir='../users_images';
              $file_tmp=$_FILES['file']['tmp_name'];
              $size=$_FILES['file']['size']."<br>";
              $path=$dir."/".rand(100,10000).$file_name;
              move_uploaded_file($file_tmp, $path);
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
          header("location:Add-new-user.php?error_msg=".$error_message);
        }
        else
        {
           $obj = new database();
           $result=$obj->update_user_records($user_id,$role_id,$first_name,$last_name,$email,$password,$address,$path);
           if(!$result)
           {
               header('location:admin-profile.php?error_msg='.'<div class="alert alert-danger" role="alert">Data Not Updated try again Later!</div>');
           }
           else
           {
               header('location:admin-profile.php?error_msg='.'<div class="alert alert-success" role="alert">Record Updated Successfully!</div>');
           }
             
        }
     }
    elseif(isset($_POST['update_feedback']))
    {
        echo $name=$_POST['name'];
        echo $feedback_id=$_POST['feedback_id'];
        echo $email=$_POST['email'];
        echo $feedback=$_POST['feedback'];

        $obj=new database();
        $result=$obj->update_feedback_data($name,$email,$feedback,$feedback_id);
        if(!$result)
        {
            header('location:feedback.php?error_msg='.'<div class="alert alert-danger" role="alert">Feedback Not Updated try again Later!</div>');
        }
        else
        {
            header('location:feedback.php?error_msg='.'<div class="alert alert-success" role="alert">Feedback d Updated Successfully!</div>');
        }

    }
    elseif(isset($_POST['create_blog']))
    {
        $blog_title=$_POST['blog_title'];
        $post_perpage=$_POST['post_per_page'];
        $file_name=$background_image=$_FILES['blog_background_image']['name'];
        $file_tmp=$background_image=$_FILES['blog_background_image']['tmp_name'];

         // $file_name=pathinfo($_FILES['blog_background_image']['name'],PATHINFO_BASENAME);
         $dir='../blogs_images';
         $path=$dir."/".rand(100,10000).$file_name;
         move_uploaded_file($file_tmp, $path);
         $user_id=$_SESSION['user']['user_id'];
       
        $obj=new database();
        $result=$obj->create_blog($user_id,$blog_title,$post_perpage,$path);
        if(!$result)
        {
            header('location:blogs.php?error_msg='.'<div class="alert alert-danger" role="alert">Blog Not Uploaded try again Later!</div>');
        }
        else
        {
            header('location:blogs.php?error_msg='.'<div class="alert alert-success" role="alert">Blog Created Successfully!</div>');
        }

    }


    elseif(isset($_POST['update_blog']))
    {
        $blog_title=$_POST['blog_title'];
        $blog_id=$_POST['blog_id'];
        $post_perpage=$_POST['post_per_page'];
        $file_name=$background_image=$_FILES['blog_background_image']['name'];
        $file_tmp=$background_image=$_FILES['blog_background_image']['tmp_name'];

         // $file_name=pathinfo($_FILES['blog_background_image']['name'],PATHINFO_BASENAME);
         if($size=$_FILES['blog_background_image']['size']>0)
        {
            $dir='../blogs_images';
            $path=$dir."/".rand(100,10000).$file_name;
            move_uploaded_file($file_tmp, $path);      
         }
         else
         {
             $obj = new database();
             $result=$obj->get_data_for_update_blog($blog_id);
             $row=mysqli_fetch_assoc($result);
             $path=$row['blog_background_image'];
         }

       
        $obj=new database();
        $result=$obj->update_blogs($blog_id,$blog_title,$post_perpage,$path);
        if(!$result)
        {
            header('location:blogs.php?error_msg='.'<div class="alert alert-danger" role="alert">Blog Not Updated try again Later!</div>');
        }
        else
        {
            header('location:blogs.php?error_msg='.'<div class="alert alert-success" role="alert">Blog  Updated Successfully!</div>');
        }
    }
    elseif(isset($_POST['create_catgeory']))
    {
        echo $category_title=$_POST['category_title'];
        echo $category_description=$_POST['category_description'];
         
        $obj=new database();
        $result=$obj->create_catgeory($category_title,$category_description);
        if(!$result)
        {
            header('location:category.php?error_msg='.'<div class="alert alert-danger" role="alert">Category Not Inserted   try again Later!</div>');
        }
        else
        {
            header('location:category.php?error_msg='.'<div class="alert alert-success" role="alert">Category Inserted Successfully!</div>');
        }

    }
    elseif(isset($_POST['update_catgeory']))
    {
        $category_title=$_POST['category_title'];
        $category_id=$_POST['category_id'];
        $category_description=$_POST['category_description'];
         
        $obj=new database();
        $result=$obj->update_catgeory($category_id,$category_title,$category_description);
        if(!$result)
        {
            header('location:category.php?error_msg='.'<div class="alert alert-danger" role="alert">Category Not Updated try again Later!</div>');
        }
        else
        {
            header('location:category.php?error_msg='.'<div class="alert alert-success" role="alert">Category Updated Successfully!</div>');
        }
    }

     elseif(isset($_POST['create_post']))
    {
        $blog_id=$_POST['blog'];

        $sql="SELECT * FROM user_blog_following WHERE blog_following_id=".$blog_id;
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $str="";
            while ($follower_id=mysqli_fetch_assoc($result))
            {
              $str.=$follower_id['follower_id']." ";
            }
        }

        $user_ids=explode(" ",$str);

        foreach($user_ids as $user_id)
        {
           $sql="SELECT email FROM user WHERE user_id=".$user_id;
           $result=mysqli_query($conn,$sql);
           if($result)
           {
              $row=mysqli_fetch_assoc($result);
              $mail=new send_mail_class();
                $send_mail=$mail->send_to_admin_regis($row['email'],'Blog Post','Dear User Admin Upload Post on your Following Blog');
           }
           

        }

    
        $post_title=$_POST['post_title'];
        $post_summary=$_POST['post_summary'];
        $post_description=$_POST['post_description'];
        $blog_id=$_POST['blog']."Empty";
        $post_featured_image=$_FILES['post_featured_image']['name'];
        $tmp_name=$_FILES['post_featured_image']['tmp_name'];
        $category=$_POST['category'];

        $dir="../posts_images";

         $feature_image_path=$dir."/".rand(88444,000063).$post_featured_image;

        $obj=new database();
        $result=$obj->create_post($blog_id,$post_title,$post_summary,$post_description,$feature_image_path);
        if(!$result)
       {
            header('location:posts.php?error_msg='.'<div class="alert alert-danger" role="alert">Post Not Uploaded!</div>');
        }
        else
        {
            move_uploaded_file($tmp_name,$feature_image_path);
            
                $post_id = mysqli_insert_id($conn);
            foreach($category as $category_id)
            {
                echo $category_id;
                $obj=new database();
                $result=$obj->add_post_category($post_id,$category_id);
            }
            if($result)
            {
                foreach ($_FILES['post_attachment']['name'] as $key => $value)
               {
                     $filename=$_FILES['post_attachment']['name'][$key];
                     $size=$_FILES['post_attachment']['size'][$key];
                     $tmp_name=$_FILES['post_attachment']['tmp_name'][$key];
                     $path=$dir."/".rand(1000,123456)."_".$filename;
                    if($size<=3000000)
                   {
                       move_uploaded_file($tmp_name, $path);  
                    }
                    else
                   {
                           header('location:posts.php?error_msg='.'<div class="alert alert-danger" role="alert">post attachment file size Greater Than 3MB!</div>');
                    }

                    $ex=pathinfo($filename,PATHINFO_EXTENSION);
                    if($ex=="doc" || $ex=="docx" || $ex=='pdf' || $ex=='xls' || $ex=="xlsx" || $ex=='ppt' || $ex=='pptx' || $ex=='txt' || $ex=='zip')
                   {
                        $post_attachment_title="File";
                    }
                     
                    elseif($ex=='png' || $ex=='jpg' || $ex=='jpeg' || $ex=='gif')
                   {
                         $post_attachment_title="Image";
                    }

                    $obj=new database();
                    $result=$obj->post_attachment($post_id,$post_attachment_title,$path);
                }

                if($result)
                {
                    header('location:posts.php?error_msg='.'<div class="alert alert-success" role="alert">Post Uploaded Successfully!</div>');
                }
                else
                {
                   header('location:posts.php?error_msg='.'<div class="alert alert-success" role="alert">Post Attachment Not Uploaded Successfully!</div>');  
                }
            }
            else
            {
                   header('location:posts.php?error_msg='.'<div class="alert alert-success" role="alert">Post Category Not Uploaded!</div>');  
            }       
        }
    }
         elseif(isset($_POST['update_post']))
        {
            $post_title=$_POST['post_title'];
            $post_summary=$_POST['post_summary'];
            $post_description=$_POST['post_description'];
            $post_id=$_POST['post_id'];
            $post_featured_image=$_FILES['post_featured_image']['name'];
            $tmp_name=$_FILES['post_featured_image']['tmp_name'];
            $attc=$_POST['attachment']??''; 
            
            $category=$_POST['category'];

            $dir="../posts_images";

            if(strlen($post_featured_image)>1)
            { 
                $post_featured_image=$_FILES['post_featured_image']['name'];
                $feature_image_path=$dir."/".rand(88444,000063).$post_featured_image;
                echo $feature_image_path;
                move_uploaded_file($tmp_name,$feature_image_path);
            }
            else
            {
                $obj=new database();
                $result=$obj->fetch_post_imge($post_id);
                if($result)
                {
                  $row=mysqli_fetch_assoc($result);
                  $feature_image_path=$row['featured_image'];  
                }
            }

            $obj=new database();
            $result=$obj->update_post($post_id,$post_title,$post_summary,$post_description,$feature_image_path);
            if(!$result)
           {
                header('location:posts.php?error_msg='.'<div class="alert alert-danger" role="alert">Post Not Updated!</div>');
            }
            else
            {
                $obj=new database();
                $results=$obj->delete_post_category($post_id);
                if($results)
                {
                   foreach($category as $category_id)
                   {
                       echo $category_id;
                       $obj=new database();
                       $result=$obj->add_post_category($post_id,$category_id);
                   }
                   if($result)
                   {
                        $obj=new database();
                        $delet_attc=$obj->delete_post_attachment($post_id);
                        if($delet_attc)
                        {
                            foreach($attc as $path)
                            {
                                $post_attachment_title="";
                                echo substr($path,-3);

                                $ex=substr($path,-3);
                                 if($ex=="doc" || $ex=="ocx" || $ex=='pdf' || $ex=='xls' || $ex=="lsx" || $ex=='ppt' || $ex=='ptx' || $ex=='txt' || $ex=='zip')
                                {
                                     $post_attachment_title="File";
                                 }
                                  
                                 elseif($ex=='png' || $ex=='jpg' || $ex=='jpeg' || $ex=='gif')
                                {
                                      $post_attachment_title="Image";
                                 }


                                $obj=new database();
                                $result=$obj->update_post_attachment($post_id,$post_attachment_title,$path);
                            }
                             if($result)
                                {
                                    foreach ($_FILES['post_attachment']['name'] as $key => $value)
                                    {
                                         $dir="../posts_images";
                                          $filename=$_FILES['post_attachment']['name'][$key];
                                          $size=$_FILES['post_attachment']['size'][$key];
                                          $tmp_name=$_FILES['post_attachment']['tmp_name'][$key];
                                          $path=$dir."/".rand(1000,123456)."_".$filename;
                                         if($size<=3000000)
                                        {
                                            move_uploaded_file($tmp_name, $path);  
                                         }
                                         else
                                        {
                                                // header('location:posts.php?error_msg='.'<div class="alert alert-danger" role="alert">post attachment file size Greater Than 3MB!</div>');
                                         }

                                         $ex=pathinfo($filename,PATHINFO_EXTENSION);
                                         if($ex=="doc" || $ex=="docx" || $ex=='pdf' || $ex=='xls' || $ex=="xlsx" || $ex=='ppt' || $ex=='pptx' || $ex=='txt' || $ex=='zip')
                                        {
                                             $post_attachment_title="File";
                                         }
                                          
                                         elseif($ex=='png' || $ex=='jpg' || $ex=='jpeg' || $ex=='gif')
                                        {
                                              $post_attachment_title="Image";
                                         }

                                         $obj=new database();
                                         $result=$obj->post_attachment($post_id,$post_attachment_title,$path);
                                     }

                                     if($result)
                                     {
                                         header('location:posts.php?error_msg='.'<div class="alert alert-success" role="alert">Post Uploaded Successfully!</div>');
                                     }
                                     else
                                     {
                                        header('location:posts.php?error_msg='.'<div class="alert alert-success" role="alert">Post Attachment Not Uploaded Successfully!</div>');  
                                     }
                                    header('location:posts.php?error_msg='.'<div style="color:green" class="alert alert-green" role="alert">Post  Updated Successfully! 123</div>');
                                } 
                        }
                   }
                }
            }
        }


?>