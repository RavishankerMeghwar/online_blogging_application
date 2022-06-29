<?php 
   require_once('requires/connection.php');

   class database
   {
      // this method will work when admin will create user account
   	function insert($first_name,$last_name,$email,$password,$gender,$dob,$address,$path)
     {
   	 	global $conn;
         $sql="INSERT INTO USER(role_id,first_name,last_name,email,PASSWORD,gender,date_of_birth,user_image,address,is_approved,is_active)VALUES(2,'".$first_name."','".$last_name."','".$email."','".$password."','".$gender."','".$dob."','".$path."','".$address."','Approved','Active');";
         	return $result=mysqli_query($conn,$sql);
   	}
      // this method will work when user will create account

      function insert_user($first_name,$last_name,$email,$password,$gender,$dob,$address,$path)
     {
         global $conn;
         $sql="INSERT INTO USER(role_id,first_name,last_name,email,PASSWORD,gender,date_of_birth,user_image,address,is_approved,is_active)VALUES(2,'".$first_name."','".$last_name."','".$email."','".$password."','".$gender."','".$dob."','".$path."','".$address."','Pending','InActive');";
            return $result=mysqli_query($conn,$sql);
      }

      // fetch users data from user table function
      function select_all_users()
     {
         global $conn;
         $sql="SELECT * FROM user  ORDER BY user_id DESC";
         return $result=mysqli_query($conn,$sql);
      }
      function view_profile($user_id)
     {
         global $conn;
         $sql="SELECT * FROM user Where  user_id=".$user_id;
         return $result=mysqli_query($conn,$sql);
      }

      function show_all_admin_information($user_id)
     {
         global $conn;
         $sql="SELECT * FROM USER WHERE NOT user_id=$user_id AND role_id='1'  ORDER BY user_id DESC";
         return $result=mysqli_query($conn,$sql);
      }

      function login_process($email,$password)
      {
          global $conn;
          $sql="SELECT * FROM user Where email='".$email."' AND password='".$password."'";
          return $result=mysqli_query($conn,$sql);
       }

      function reject($user_id)
      {
         global $conn;
         $time=time();
         $sql="UPDATE user SET is_approved='Rejected', updated_at='".$time."' WHERE user_id=".$user_id;
         return $result=mysqli_query($conn,$sql);

      }
      function approved($user_id)
      {
         global $conn;
         $time=time();
         $sql="UPDATE user SET is_approved='Approved', updated_at='".$time."' WHERE user_id=".$user_id;
         return $result=mysqli_query($conn,$sql);
      }
      function active($user_id)
      {
         $time=time();
         global $conn;
         $sql="UPDATE user SET is_active='InActive', updated_at=$time WHERE user_id=".$user_id;
         return $result=mysqli_query($conn,$sql);
      }
      function inactive($user_id)
      {
         $time=time();
         global $conn;
         $sql="UPDATE user SET is_active='Active', updated_at=$time WHERE user_id=".$user_id;
         return $result=mysqli_query($conn,$sql);
      }
      function select_all_pending_users()
      {
         global $conn;
         $sql="SELECT * FROM user WHERE is_approved='Pending'";
         return $result=mysqli_query($conn,$sql);
      }
      
      function inactive_users_records()
      {
         global $conn;
         $sql="SELECT * FROM user WHERE is_active='InActive'";
         return $result=mysqli_query($conn,$sql);
      }
      function update_user_record($user_id)
      {
         global $conn;
         $sql="SELECT * FROM user WHERE user_id=".$user_id;
         return $result=mysqli_query($conn,$sql);
      }
      function update_user_records($user_id,$role_id,$first_name,$last_name,$email,$password,$address,$path)
      {
          $time=time();
          global $conn;
          $sql="UPDATE user SET role_id='".$role_id."', first_name='".$first_name."',last_name='".$last_name."',email='".$email."',password='".$password."',address='".$address."',user_image='".$path."', updated_at=$time WHERE user_id=".$user_id;
          return $result=mysqli_query($conn,$sql);
      }

      function delete_user_record($user_id)
      {
          global $conn;
          $sql="DELETE FROM user WHERE user_id=".$user_id;
          return $result=mysqli_query($conn,$sql);
      }

      function check_email_exist($email)
      {
          global $conn;
          $sql="SELECT email FROM user WHERE email='".$email."'";
          return $result=mysqli_query($conn,$sql);
      }
      function insert_feedback($user_id,$name,$email,$feedback)
      {
         global $conn;
         $sql="INSERT INTO user_feedback (user_id,user_name,user_email,feedback)VALUES('".$user_id."','".$name."','".$email."','".$feedback."')";
          return $result=mysqli_query($conn,$sql);
      }
      function insert_feedback_unsesion($name,$email,$feedback)
      {
         global $conn;
         $sql="INSERT INTO user_feedback (user_name,user_email,feedback)VALUES('".$name."','".$email."','".$feedback."')";
          return $result=mysqli_query($conn,$sql);
      }
      function show_all_feedback()
      {
         global $conn;
         $sql="SELECT * FROM user_feedback  ORDER BY feedback_id DESC";
         return $result=mysqli_query($conn,$sql);
      }


      function delete_feedback($feedback_id)
      {
          global $conn;
          $sql="DELETE FROM user_feedback WHERE feedback_id=".$feedback_id;
          return $result=mysqli_query($conn,$sql);
      }  
      function update_feedback($feedback_id)
      {
          global $conn;
          $sql="SELECT * FROM user_feedback WHERE feedback_id=".$feedback_id;
          return $result=mysqli_query($conn,$sql);
      }

      function update_feedback_data($name,$email,$feedback,$feedback_id)
      {
         $time=time();
          global $conn;
          $sql="UPDATE user_feedback SET  user_name='".$name."',user_email='".$email."',feedback='".$feedback."',updated_at=$time WHERE feedback_id=".$feedback_id;
          return $result=mysqli_query($conn,$sql);
      }

      function forgotpasswor($email)
      {
         global $conn;
         $sql="SELECT * FROM user Where email='".$email."'";
         return $result=mysqli_query($conn,$sql);
      }

        function set_new_password($email,$password)
        {
            $time=time();
            global $conn;
            $sql="UPDATE USER SET PASSWORD='".$password."', updated_at=$time WHERE email='".$email."'";
            return $result=mysqli_query($conn,$sql);      
        }
        function fecth_user_data($user_id)
        {
           global $conn;
           $sql="SELECT * FROM user WHERE user_id=".$user_id;
           return $result=mysqli_query($conn,$sql);             
        }
        function create_blog($user_id,$blog_title,$post_perpage,$image)
        {
           global $conn;
           $sql="INSERT INTO blog(user_id,blog_title,post_per_page,blog_background_image,blog_status)VALUES('".$user_id."','".$blog_title."','".$post_perpage."','".$image."','Active')";
           return $result=mysqli_query($conn,$sql);             
        }
        function show_blogs()
        {
           global $conn;
           $sql="SELECT * FROM blog";
           return $result=mysqli_query($conn,$sql);            
        }

        function active_blog_status($blog_id)
      {
        $time=time();
         global $conn;
         $sql="UPDATE blog SET blog_status='InActive' , updated_at='$time' WHERE blog_id=".$blog_id;
         return $result=mysqli_query($conn,$sql);
      }

       function inactive_blog_status($blog_id)
      {
        $time=time();
         global $conn;
         $sql="UPDATE blog SET blog_status='Active',updated_at='$time'  WHERE blog_id=".$blog_id;
         return $result=mysqli_query($conn,$sql);
      }
      
    
       function get_data_for_update_blog($blog_id)
      {
        $time=time();
         global $conn;
         $sql="SELECT * FROM blog WHERE blog_id=".$blog_id;
         return $result=mysqli_query($conn,$sql);
      }
       function update_blogs($blog_id,$blog_title,$post_perpage,$path)
      {
        $time=time();
        echo $blog_id;
         global $conn;
         $sql="UPDATE blog SET blog_title='".$blog_title."',post_per_page='".$post_perpage."',blog_background_image='".$path."' ,updated_at=$time WHERE blog_id=".$blog_id;
         return $result=mysqli_query($conn,$sql);
      }

       function  delete_blog_record($blog_id)
      {
        $time=time();
         global $conn;
         $sql="DELETE FROM blog WHERE blog_id=".$blog_id;
         return $result=mysqli_query($conn,$sql);
      }
        function create_catgeory($category_title,$category_description)
       {
           global $conn;
           $sql="INSERT INTO category(category_title, category_description,category_status)VALUES('".$category_title."','".$category_description."','Active')";
          return $result=mysqli_query($conn,$sql);             
        }

       function  show_categories()
       {
         global $conn;
         $sql="SELECT * FROM category";
         return $result=mysqli_query($conn,$sql);
       }

        function active_category_status($category_id)
       {
          $time=time();
          global $conn;
          $sql="UPDATE category SET category_status='InActive' , updated_at='$time' WHERE category_id=".$category_id;
          return $result=mysqli_query($conn,$sql);
       }

       function inactive_category($category_id)
       {
          $time=time();
          global $conn;
          $sql="UPDATE category SET category_status='Active' , updated_at='$time' WHERE category_id=".$category_id;
          return $result=mysqli_query($conn,$sql);
       }
        function get_data_for_update_category($category_id)
       {
         $time=time();
          global $conn;
          $sql="SELECT * FROM category WHERE category_id=".$category_id;
          return $result=mysqli_query($conn,$sql);
       }

       function update_catgeory($category_id,$category_title,$category_description)
      {
        $time=time();
         global $conn;
         $sql="UPDATE category SET category_title='".$category_title."',category_description='".$category_description."',updated_at=$time WHERE category_id=".$category_id;
         return $result=mysqli_query($conn,$sql);
      }
       function  delete_category_record($category_id)
      {
        $time=time();
         global $conn;
         $sql="DELETE FROM category WHERE category_id=".$category_id;
         return $result=mysqli_query($conn,$sql);
      }
        function  show_posts()
       {
          global $conn;
          $sql="SELECT * FROM post ORDER BY post_id DESC";
          return $result=mysqli_query($conn,$sql);
        }
        function create_post($blog_id,$post_title,$post_summary,$post_description,$feature_image_path)
       {
          global $conn;
          $sql="INSERT INTO post(blog_id,post_title,post_summary,post_description,featured_image,post_status,is_comment_allowed)VALUES('".$blog_id."','".$post_title."','".$post_summary."','".$post_description."','".$feature_image_path."','Active',1)";
          return $result=mysqli_query($conn,$sql);
        }
        function  inactive_post($post_id)
        {
           $time=time();
           global $conn;
           $sql="UPDATE post SET post_status='InActive' , updated_at='$time' WHERE post_id=".$post_id;
           return $result=mysqli_query($conn,$sql);
        }

        function active_post($post_id)
        {
           $time=time();
           global $conn;
           $sql="UPDATE post SET post_status='Active' , updated_at='$time' WHERE post_id=".$post_id;
           return $result=mysqli_query($conn,$sql);
        }
        function post_comment_allow($post_id)
        {
           $time=time();
           global $conn;
           $sql="UPDATE post SET is_comment_allowed='0' , updated_at='$time' WHERE post_id=".$post_id;
           return $result=mysqli_query($conn,$sql);
        }

        function post_comment_Not_allow($post_id)
        {
           $time=time();
           global $conn;
           $sql="UPDATE post SET is_comment_allowed='1' , updated_at='$time' WHERE post_id=".$post_id;
           return $result=mysqli_query($conn,$sql);
        }
         function delete_post($post_id)
       {
          $time=time();
          global $conn;
          $sql="DELETE FROM post WHERE post_id=".$post_id;
          return $result=mysqli_query($conn,$sql);
       }

        function add_post_category($post_id,$category_id)
        {
            global $conn;
            $sql="INSERT INTO post_category(post_id,category_id)VALUES('".$post_id."','".$category_id."')";
            return $result=mysqli_query($conn,$sql);
        }
        function post_attachment($post_id,$post_attachment_title,$path)
        {
          global $conn;
          $sql="INSERT INTO post_atachment(post_id,post_attachment_title,post_attachment_path,is_active)VALUES('".$post_id."','".$post_attachment_title."','".$path."','Active')";
          return $result=mysqli_query($conn,$sql);  
        }

        
        function delete_post_category($post_id)
       {
         $time=time();
          global $conn;
          $sql="DELETE FROM post_category WHERE post_id=".$post_id;
          return $result=mysqli_query($conn,$sql);
        }

        function delete_post_attchment($post_id)
       {
          $time=time();
          global $conn;
          $sql="DELETE FROM post_atachment WHERE post_id=".$post_id;
          return $result=mysqli_query($conn,$sql);
        }

        function view_post_details($post_id)
        {
           global $conn;
           $sql="SELECT * FROM post WHERE post_id=".$post_id;
           return $result=mysqli_query($conn,$sql);
         }

         function select_post_category($post_id)
         {
           global $conn;
           $sql="SELECT category_id FROM post_category WHERE post_id=".$post_id;
           return $result=mysqli_query($conn,$sql); 
         }
         function category_fetch($category_id)
         {
           global $conn;
           $sql="SELECT * FROM category WHERE category_id=".$category_id;
           return $result=mysqli_query($conn,$sql);  
         }
         function fetch_attachment($post_id)
         {
            global $conn;
            $sql="SELECT * FROM post_atachment WHERE post_id=".$post_id;
            return $result=mysqli_query($conn,$sql);
         }

        function select_post($post_id)
        {
           global $conn;
           $sql="SELECT * FROM post WHERE post_id=".$post_id;
           return $result=mysqli_query($conn,$sql); 
        }   

        function show_post_category($post_id,$category_id)
        {
           global $conn;
           $sql="SELECT * FROM post_category WHERE post_id=".$post_id." AND category_id=".$category_id;
           $result=mysqli_query($conn,$sql);
           if($result->num_rows)
           {
              return true;
           }
           else
           {
              return false;
           }
        }

        function delete_post_category_id($post_id)
        {
            global $conn;
            $sql="DELETE  FROM post_category WHERE post_id=".$post_id;
            $result=mysqli_query($conn,$sql);
            if($result)
            {
              echo "Deeted";
            } 
        }

        function fetch_post_imge($post_id)
        {
            global $conn;
            $sql="SELECT featured_image FROM post WHERE post_id=".$post_id;
            return mysqli_query($conn,$sql);
        }

        function update_post($post_id,$post_title,$post_summary,$post_description,$feature_image_path)
        {
           global $conn;   
           $sql="UPDATE post SET post_title ='".$post_title."', post_summary='".$post_summary."', post_description='".$post_description."',featured_image='".$feature_image_path."' WHERE post_id=".$post_id;
            return mysqli_query($conn,$sql);
       }

       function insert_comment($post_id,$user_id,$user_comment)
       {
            global $conn;
            $sql="INSERT INTO user_post_comment(post_id,user_id,comment_description,is_active)VALUES('".$post_id."','".$user_id."','".$user_comment."','InActive')";
            return mysqli_query($conn,$sql);
       }

       function show_comments()
       {
            global $conn;
            $sql="SELECT * FROM user_post_comment ORDER BY post_comment_id DESC";
            return mysqli_query($conn,$sql);
       }

       function inactive_comments($post_comment_id)
       {
           global $conn;
           $sql="UPDATE user_post_comment SET is_active='InActive' WHERE post_comment_id=".$post_comment_id;
           return mysqli_query($conn,$sql);
       }
       function active_comments($post_comment_id)
       {
           global $conn;
           $sql="UPDATE user_post_comment SET is_active='Active' WHERE post_comment_id=".$post_comment_id;
           return mysqli_query($conn,$sql);
       }
       function delete_comment($post_comment_id)
       {
            global $conn;
            $sql="DELETE FROM user_post_comment WHERE  post_comment_id=".$post_comment_id;
            return mysqli_query($conn,$sql);
       }

       function delete_post_attachment($post_id)
       {
            global $conn;
            $sql="DELETE FROM post_atachment WHERE  post_id=".$post_id;
            return mysqli_query($conn,$sql);
       }

       function update_post_attachment($post_id,$post_attachment_title,$path)
       {
            global $conn;
            $sql="INSERT INTO post_atachment(post_id,post_attachment_title,post_attachment_path,is_active)VALUES('".$post_id."','".$post_attachment_title."','".$path."','Active')";
            return mysqli_query($conn,$sql);
       }
       function show_post_attachments()
       {
            global $conn;
            $sql="SELECT * FROM post_atachment";
            return mysqli_query($conn,$sql);
        }
        function inactive_post_attachment($post_attachment_id)
        {
          global $conn;
          $sql="UPDATE post_atachment SET is_active='InActive' WHERE post_atachment_id=".$post_attachment_id;
          return mysqli_query($conn,$sql);  
        }
        function active_post_attachment($post_attachment_id)
        {
          global $conn;
          $sql="UPDATE post_atachment SET is_active='Active' WHERE post_atachment_id=".$post_attachment_id;
          return mysqli_query($conn,$sql);  
        }
        function delete_attachment($post_attachment_id)
        {
            global $conn;
            $sql="DELETE FROM post_atachment WHERE post_atachment_id=".$post_attachment_id;
            return mysqli_query($conn,$sql);
        }
        function add_follower($user_id,$blog_id)
        {
            global $conn;
            $sql="INSERT INTO user_blog_following(follower_id,blog_following_id,status)VALUES('".$user_id."','".$blog_id."','Followed')";
            return mysqli_query($conn,$sql);
        }
        function delete_follower($user_id)
        {
            global $conn;
            $sql="DELETE FROM user_blog_following WHERE follower_id=".$user_id;
            return mysqli_query($conn,$sql);

        }
   }
   
 ?>