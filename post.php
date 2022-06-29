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
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

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
     if(isset($_GET['page']))
      {
        $page=$_GET['page'];
      }
      else
      {
        $page=1;
      }
      $post_per_page=2;
      $post_result=($page-1)*$post_per_page;
    ?>
<div>
    <div class="container m-auto row" >
            <?php 

             require_once('admin/requires/connection.php');

              $post_id=$_REQUEST['post_id']??'';

              $sql="SELECT * FROM post WHERE post_id=".$post_id;

              $result=mysqli_query($conn,$sql);
              if($result)
              {
                $post=mysqli_fetch_assoc($result);

              }

             ?>

              <?php 

                 $sql="SELECT * FROM setting WHERE user_id=".$_SESSION['user']['user_id'];
                 $title_align=mysqli_query($conn,$sql);
                 if($title_align)
                 {
                    while($post_title_align=mysqli_fetch_assoc($title_align))
                    {
                      if($post_title_align['setting_key']=="text_align")
                      {
                        $align=$post_title_align['setting_value'];
                      }
                      if($post_title_align['setting_key']=="title_color")
                      {
                        $title_color=$post_title_align['setting_value'];
                      }
                      if($post_title_align['setting_key']=="font_size")
                      {
                        $font_size=$post_title_align['setting_value'];
                      }
                      if($post_title_align['setting_key']=="font_style")
                      {
                        $font_style=$post_title_align['setting_value'];
                      }
                      if($post_title_align['setting_key']=="bg_color")
                      {
                        $bg_color=$post_title_align['setting_value'];
                      }
                      if($post_title_align['setting_key']=="summary_color")
                      {
                        $summary_color=$post_title_align['setting_value'];
                      }
                      if($post_title_align['setting_key']=="summary_font_style")
                      {
                        $summary_font_style=$post_title_align['setting_value'];
                      }
                      if($post_title_align['setting_key']=="summary_font_size")
                      {
                        $summary_font_size=$post_title_align['setting_value'];
                      }
                      if($post_title_align['setting_key']=="summary_font_family")
                      {
                        $summary_font_family=$post_title_align['setting_value'];
                      }
                      if($post_title_align['setting_key']=="description_font_family")
                      {
                        $description_font_family=$post_title_align['setting_value'];
                      }

                      if($post_title_align['setting_key']=="description_font_style")
                      {
                        $description_font_style=$post_title_align['setting_value'];
                      }
                       if($post_title_align['setting_key']=="description_font_size")
                      {
                        $description_font_size=$post_title_align['setting_value'];
                      }
                      if($post_title_align['setting_key']=="description_color")
                      {
                        $description_color=$post_title_align['setting_value'];
                      }

                    }
                 }

                         ?>


           <div class="col-8" >
                <h1 style="margin-top: 13%;" class="fw-bold">Post Details</h1>
              <div class="card mb-3" style="background-color:<?php echo $bg_color;?>;">

                <div class="card-body" >
                  <h5 class="card-title" style="color:<?php echo  $title_color;?>;font-size:<?=$font_size;?>px ;font-style: <?php echo $font_style;?>;text-align: <?php echo $align; ?>"><?php echo $post['post_title'] ?></h5>
                  <span class="badge bg-primary "><?php $time=strtotime($post['created_at']); echo date('D-M-Y, H:i A',$time) ?></span>
                  <span class="badge bg-danger">

                      <?php 
                         $post_id=$_GET['post_id']??'';

                         $sql="SELECT * FROM category";
                         $category=mysqli_query($conn,$sql);
                         if($category)
                         {
                           while ($categories=mysqli_fetch_assoc($category)) 
                           {
                             $category_id=$categories['category_id'];
                             // echo $category_id;
                             $sql="SELECT * FROM post_category WHERE post_id='".$post_id."' AND category_id='".$category_id."'";
                             $post_category=mysqli_query($conn,$sql);
                             if($post_category)
                             {
                               while ($post_categories=mysqli_fetch_assoc($post_category))
                              {
                                 echo $categories['category_title'];
                               }
                             }
                             else
                             {

                             }
                           }
                         }

                       ?> 

                     <?php 
                   ?></span>
                  <div class="border-bottom mt-3"></div>
                  <img src="posts_images/<?php echo substr($post['featured_image'],16);?>" class='img-fluid' alt="Responsive image">
                  <p class="card-text fw-bold" style="color:<?=$summary_color;?>;font-family: <?=$summary_font_family?>;font-style:<?=$summary_font_style?>;font-size:<?php echo $summary_font_size;?>px;">
                    <?php echo $post['post_summary'] ?>
                  </p>
                  <p class="card-text" style="font-family:<?=$description_font_family;?>;font-size:<?=$description_font_size;?>;color:<?php echo $description_color;?>;font-style:<?=$description_font_style?>">
                    <?php echo $post['post_description'] ?>
                  </p>
                  <p>Last updated &nbsp;<?php  $time=strtotime($post['created_at']); echo date('D-M-y,H:i',$time); ?></p>

                  <p class="fw-bold">Post Attchment</p>
                    <?php
                       $post_title=substr($post['post_title'],3,5);

                        $sql="SELECT * FROM post_atachment WHERE post_id=".$post_id." AND is_active='Active'";
                        $result=mysqli_query($conn,$sql);
                        if($result)
                        {
                          while ($attachment=mysqli_fetch_assoc($result)) 
                          {
                             if($attachment['post_attachment_title']=="File")
                             {
                                $check_file=substr($attachment['post_attachment_path'], -3);
                               if($check_file=="pdf")
                               {?>
                                <p>
                                <img src="images/pdf.png" style="width: 26px" alt=""><a href="<?php echo $attachment['post_attachment_path'];?>" style='text-decoration: none'>&nbsp;<?php echo substr($attachment['post_attachment_path'],16);?></a>  
                                </p>
                                <?php

                               }
                               elseif($check_file=="doc" || $check_file=="ocx")
                               {?>
                                <p>
                                  <img src="images/doc.png" style="width: 26px" alt=""><a href="<?php echo $attachment['post_attachment_path'];?>" style='text-decoration: none'>&nbsp;<?php echo substr($attachment['post_attachment_path'],16);?></a>
                                </p> 
                                <?php
                               }

                               elseif($check_file=="xls" || $check_file=="lsx")
                               {?>
                                <p>
                                  <img src="images/xls.png" style="width: 26px" alt=""><a href="<?php echo $attachment['post_attachment_path'];?>" style='text-decoration: none'>&nbsp;<?php echo substr($attachment['post_attachment_path'],16);?></a>>
                                </p> 
                                <?php
                               }
                               elseif($check_file=="zip" || $check_file=="rar")
                               {?>
                                <p>
                                  <img src="images/zip.jpg" style="width: 26px" alt=""><a href="<?php echo $attachment['post_attachment_path'];?>" style='text-decoration: none'>&nbsp;<?php echo substr($attachment['post_attachment_path'],16);?></a>
                                </p> 
                                <?php
                               }                                            
                              ?>

                              <?php
                             }
                             elseif($attachment['post_attachment_title']=="Image")
                             {?>

                              <p>
                              <a href="<?php echo 'posts_images/'.substr($attachment['post_attachment_path'],16)?>">
                              <img src="<?php echo 'posts_images/'.substr($attachment['post_attachment_path'],16)?>" alt="" style="width: 150px;">
                              </a>
                              </p>

                              <?php
                             }
                            ?>
                          <?php
                          }
                        } 
                        ?>
                          <p class="fw-bold text-primary">User Comments</p>
                        <?php

                        $sql="SELECT * FROM user_post_comment WHERE post_id=".$post_id." AND is_active='Active'";
                        $query=mysqli_query($conn,$sql);
                        if($query)
                        {
                          while($comments=mysqli_fetch_assoc($query))
                          {
                             $sql="SELECT * FROM user WHERE user_id=".$comments['user_id'];
                             $user=mysqli_query($conn,$sql);
                             if($user)
                             {
                                $commenter=mysqli_fetch_assoc($user);
                             }
                            ?>
                            <p class="shadow-lg p-1" style="border-radius: 30px;"><span><img  src="<?php echo "users_images/".substr($commenter['user_image'],16)?>" style='width: 30px' class='rounded-circle'>&nbsp;&nbsp;<span class="text-primary" ><?php echo $commenter['first_name']." ".$commenter['last_name']?> :</span>&nbsp;<?php echo $comments['comment_description'] ;?></p>
                            <?php
                          }
                        }
                     ?>
                   <?php 

                      if(isset($_SESSION['user']) && $_SESSION['user']['role_id']==2 && $post['is_comment_allowed']==1)
                      {
                        $disable="";
                      }
                      else
                      {
                        $disable="disabled";
                        $msg="Please login first then you can write comment";
                      }
                        ?>
                        <div class="">
                           <input type="text" style="width:80%; padding:7px" name="comment" id="user_comment" placeholder="Write a comment...">
                           <button type="button" name="user_comment"  <?=$disable ?> style='padding: 8px; margin-top: -7px;'  class="btn btn-success" onclick="comment(<?php echo $post['post_id']?>,<?php echo $_SESSION['user']['user_id']??''?>)">Send Comment</button>
                          <br> <span style="color: red;"><?php echo $msg??'' ?></span>
                        </div>                     
                        
                       <?php
                      // }
                    ?>
                </div>
              </div>
        
              <div>
                  <h4>Related Posts</h4>
                  <?php
                   require_once('admin/requires/connection.php');

              if(isset($_POST['search']))
              {
                $searched=$_POST['searched'];

                $sql="SELECT * FROM post WHERE post_title LIKE '%' '".$_POST['searched']."' '%' OR post_summary like '%' '".$_POST['searched']."' '%' ";
                $result=mysqli_query($conn,$sql);
              }
              else
              {
                $sql="SELECT * FROM post WHERE post_title like '%$post_title%' ORDER BY post_id DESC";
                  $result=mysqli_query($conn,$sql);
              }
               if($result)
               {
                  while($post=mysqli_fetch_assoc($result))
                  {?>                
                   <div >
                     <div class="card mb-3" style="max-width: 700px;background-color:<?php echo $bg_color;?>;" >
                      <a href="post.php?post_id=<?php echo $post['post_id']?>" style="text-decoration: none; color: black;">

                         <div class="row g-0">
                               <h5 class="card-title pt-3 pb-3 fw-bold" style="color:<?php echo  $title_color;?>;font-size:<?=$font_size;?>px ;font-style: <?php echo $font_style;?>;text-align: <?php echo $align; ?>"> &nbsp;<?php echo $post['post_title']?></h5>
                        <img src="posts_images/<?php echo substr($post['featured_image'],16)?>" style="height:250px">
                           
                           <div class="col-md-12">
                             <div class="card-body">
                              <?php 
                                $sql="SELECT user_id FROM blog WHERE blog_id=".$post['blog_id'];
                                $auth=mysqli_query($conn,$sql);
                                if($auth)
                                {
                                  $author=mysqli_fetch_assoc($auth);
                                  $user_id=$author['user_id'];

                                  $sql="SELECT * FROM user WHERE user_id=".$user_id;
                                  $user=mysqli_query($conn,$sql);

                                  if($user)
                                  {
                                    $poster_user=mysqli_fetch_assoc($user);
                                  }
                                }
                                ?>
                                 <p><span class="fw-bold"> Author Name:</span> <?php echo $poster_user['first_name']." ".$poster_user['last_name']?></p>

                                <?php

                               ?>
                               <p class="card-text fw-bold" style="color:<?=$summary_color;?>;font-family: <?=$summary_font_family?>;font-style:<?=$summary_font_style?>;font-size:<?php echo $summary_font_size;?>px;"><span class="text-primary text-truncate" >Post Summary </span>: <?php echo substr($post['post_summary'] , 0,70); ?></p>
                               <p class="card-text" style="font-family:<?=$description_font_family;?>;font-size:<?=$description_font_size;?>;color:<?php echo $description_color;?>;font-style:<?=$description_font_style?>"><?php echo substr($post['post_description'], 0,150) ?></p>
                               <p class="card-text"><small class="text-muted">Last updated &nbsp;<?php  $time=strtotime($post['created_at']); echo date('D-M-y,H:i',$time); ?></small></p>    
                               <p class="text-primary">Read More</p>
                             </div>

                           </div>
                         </div>
                       </div> 

                     </a>
                      
                   </div>
                   <?php
                  }
                }

               ?>
                <div class="card mb-3" style="max-width: 700px;">

                  </div>                    
              </div>
      
    </div>
    <div class="col-4" style="margin-top: 8%;">
      <h1 style="margin-top:;" class="fw-bold">Latest Posts</h1>

        
        <?php
          $sql="SELECT * FROM post ORDER BY post_id DESC LIMIT 0,4"; 
          $result=mysqli_query($conn,$sql);
          if($result)
          {
            while ($latest=mysqli_fetch_assoc($result))
           {?>
             <div class="card mb-3" style="background-color:<?php echo $bg_color;?>;">
                 <h5 class="card-header" style="color:<?php echo  $title_color;?>;font-size:<?=$font_size;?>px ;font-style: <?php echo $font_style;?>;text-align: <?php echo $align; ?>"><?php echo $latest['post_title'] ?></h5>
                 <div class="card-body">
                   <h5 class="card-title"><img src="<?php echo substr($latest['featured_image'],3)?>" class="img-fluid" alt=""></h5>
                   <p class="card-text" style="color:<?=$summary_color;?>;font-family: <?=$summary_font_family?>;font-style:<?=$summary_font_style?>;font-size:<?php echo $summary_font_size;?>px;"><?php echo substr($latest['post_summary'],0,40)?></p>
                   <p style="font-family:<?=$description_font_family;?>;font-size:<?=$description_font_size;?>;color:<?php echo $description_color;?>;font-style:<?=$description_font_style?>"><?php echo substr($latest['post_description'],0,100)?></p>
                   <a href="post.php?post_id=<?php echo $latest['post_id']?>" class="btn btn-primary">Read More</a>
                 </div>
              </div>
            <?php
            }
          }
         ?>               
    </div>
    </div>

    <script type="text/javascript">

      function comment(post_id,user_id)
      {
        var user_comment=document.getElementById('user_comment').value;
         if(window.XMLHttpRequest)
           {
              xhr=new XMLHttpRequest();
            }
            else
           {
                xhr=new ActiveXObject('Microsoft.XMLHTTP');
            }
                xhr.open("GET",'admin/ajax-process.php?action=comment&post_id='+post_id+'&user_id='+user_id+'&user_comment='+user_comment,true);
                xhr.onreadystatechange=function() {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                        // alert(xhr.responseText);
                        location.reload();
                    }
                }
               xhr.send();
      }
      

    </script>
       
  <br>
  <br>

  
    
       <?php 
         require_once('requires/footer.php');
        ?>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>    
</body>
</html>