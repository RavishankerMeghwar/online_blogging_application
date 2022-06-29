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

    <!-- cdn for font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<?php 
   require_once('requires/navbar.php');
     require_once('admin/requires/connection.php');

     if(isset($_GET['blog_id']))
     {
      $blog_id=$_GET['blog_id'];
        $sql="SELECT blog_background_image FROM blog WHERE blog_id=".$blog_id;
        $res=mysqli_query($conn,$sql);
        if($res)
        {
          $blog_image=mysqli_fetch_assoc($res);
          ?>
           <img src="<?=$blog_image['blog_background_image']?>">
          <?php
        }

     }
 ?>
</head>
<body style="background-image: url('blogs_images/<?php echo substr($blog_image['blog_background_image'],16)?>'); background-attachment: fixed; background-position: center; background-size: cover; background-repeat: no-repeat;">
   <?php 
     require_once('requires/navbar.php');
     require_once('admin/requires/connection.php');

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

     <!-- carousel Start Here -->
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <!-- <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button> -->
      </div>
      <div class="carousel-inner">
        
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="images/slider-2.jpg" class="d-block w-100" alt="..." height="500">
          <div class="carousel-caption d-none d-md-block">
            <h1 class="text-white fw-bold" style="position: relative; margin-top:-10%">Welcome to Blogging Application </h1>
            
          </div>
        </div>
        
        <div class="carousel-item" data-bs-interval="2000">
          <img src="images/slider-4.jpg" class="d-block w-100" alt="..." height="500">
          <div class="carousel-caption d-none d-md-block">
        </div>



        <!-- <div class="carousel-item">
          <img src="images/slider-1.jpg" class="d-block w-100 " height="500" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        
        <div class="carousel-item">
          <img src="images/slider-4.jpg" class="d-block w-100 " height="500" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div> -->
      
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- carousel end Here -->

     <div class="container-fluid mt-5">
      <h1 class="text-center fw-bold mb-4 p-2 text-white" style="background-color:#4682B4">POSTS</h1>

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-7">
          <h1 class="fw-bold">ALL POSTS</h1>          
          <hr />
          <form action="" method="POST">
            <input type="text" class="p-2"  name="searched" placeholder="Search Here Post By Title" style="width:70%">
            <button class="btn btn-primary fw-bold " name="search" style="height: 45px;">Search</button>
          </form>
        </div>
        <div class="col-md-4">
          <h1 class="fw-bold">LATEST POST</h1>          
          <hr />
        </div>
      </div>
      <br>
     <div>
         <div class="container m-auto mt-3 row" >

                <div class="col-8">
                <h4>All Posts</h4>
                <hr />

                 <?php 
                        if(isset($_SESSION['user']))
                        {
                          $user_id=$_SESSION['user']['user_id'];

                          $count="SELECT * FROM user_blog_following";
                          $che=mysqli_query($conn,$count);
                          if($che)
                          {
                            $total_count_follower=null;;
                            while ($total=mysqli_fetch_assoc($che)) 
                            {
                              $total_count_follower++;
                              
                            }
                          }


                          
                          $sql="SELECT * FROM user_blog_following WHERE follower_id=".$user_id;
                          $result=mysqli_query($conn,$sql);
                          if($result->num_rows)
                          {?>
                            <div>
                                <div class="card mb-3 " style="max-width: 700px; padding: 0px;">
                              <div class="row">                              
                                <div class="col-sm-3">
                                <p class="fw-bold  text-primary" onclick="unfollow(<?php echo $user_id?>)"  style="cursor:pointer;font-size: 21px; text-align: center;" >Following</p>
                              </div>
                              <div class="col-sm-6"></div>
                              <div class="col-sm-3">
                                <p class="fw-bold  text-primary "  style="cursor:pointer;font-size: 21px; text-align: center;" ><?php echo $total_count_follower??'';?></p>
                              </div>
                              <!-- <div class="col-md-2"></div> -->
                              </div>

                            </div>
                          </div>
                           <?php  
                           }
                           else
                           {?>
                             <div>
                                <div class="card mb-3 " style="max-width: 700px; padding: 0px;">
                              <div class="row">                              
                                <div class="col-sm-3">
                              <p class="fw-bold  text-info p-1" style="cursor:pointer;font-size: 21px; " onclick="follow(<?php echo $user_id?>,<?php echo $blog_id?>)"  style="cursor: pointer; font-size: 21px; text-align:center; " >Follow</p>
                              </div>
                              <div class="col-sm-6"></div>
                              <div class="col-sm-3">
                                 <p class="fw-bold  text-primary "  style="cursor:pointer;font-size: 21px; text-align: center;" ><?php echo $total_count_follower??'';?></p>
                              </div>
                              <!-- <div class="col-md-2"></div> -->
                              </div>

                            </div>
                          </div>
                           <?php 

                           } 
                         }


                       ?>

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

              }
                if(isset($_GET['blog_id']))
                {
                  $blog_id=$_GET['blog_id'];
                  

                  $sql="SELECT * FROM post   WHERE blog_id='$blog_id' LIMIT $post_result,$post_per_page";
                  $result=mysqli_query($conn,$sql);
                }
                elseif(isset($_GET['category_id']))
                {
                   $sql="SELECT * FROM post,category,post_category WHERE post_category.`post_id`=post.`post_id` AND post_category.`category_id`=category.`category_id` AND category.`category_id`=".$_GET['category_id'];
                   $result=mysqli_query($conn,$sql);
                }

               if($result)
               {
                  while($post=mysqli_fetch_assoc($result))
                  {?>
                                
                   <div>
                     <div class="card mb-3" style="max-width: 700px;">
                   

                      <a href="post.php?post_id=<?php echo $post['post_id']?>" style="text-decoration: none; color: black;">

                         <div class="row g-0">
                               <h5 class="card-title pt-3 pb-3 fw-bold"> &nbsp;<?php echo $post['post_title']?></h5>
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
                               <p class="card-text fw-bold"><span class="text-primary text-truncate">Post Summary </span>: <?php echo substr($post['post_summary'] , 0,70); ?></p>
                               <p class="card-text"><?php echo substr($post['post_summary'], 0,150) ?></p>
                               <p class="card-text"><small class="text-muted"><?php $post['created_at'] ?></small></p>    
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
         </div>
         <div class="col-4">
             <h1 style="margin-top:;" class="fw-bold">Latest Posts</h1>

               
               <?php
                 $sql="SELECT * FROM post ORDER BY post_id DESC LIMIT 0,4"; 
                 $result=mysqli_query($conn,$sql);
                 if($result)
                 {
                   while ($latest=mysqli_fetch_assoc($result))
                  {?>
                    <div class="card mb-3">
                        <h5 class="card-header"><?php echo $latest['post_title'] ?></h5>
                        <div class="card-body">
                          <h5 class="card-title"><img src="<?php echo substr($latest['featured_image'],3)?>" class="img-fluid" alt=""></h5>
                          <p class="card-text"><?php echo substr($latest['post_summary'],0,40)?></p>
                          <p><?php echo substr($latest['post_description'],0,100)?></p>
                          <a href="post.php?post_id=<?php echo $latest['post_id']?>" class="btn btn-primary">Read More</a>
                        </div>
                     </div>
                   <?php
                   }
                 }
                ?> 
               
         </div>
         </div>
       </div>
       <?php

         if(isset($_POST['search']))
        {
           $searched=$_POST['searched'];
           $sql="SELECT * from post WHERE post_title LIKE '%$searched%'";
        }
        elseif(isset(($_GET['blog_id'])))
        {
          $sql="SELECT * from post WHERE blog_id=".$blog_id;
        }
        else
        {
          $sql="SELECT * from post";
        }

         $r=mysqli_query($conn,$sql);
         $total_post=mysqli_num_rows($r);
         $total_pages=ceil($total_post/$post_per_page);


       ?>

      
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">

          <?php 
           if($page>1)
           {
             $previous_switch="";
           }
           else
           {
             $previous_switch="disabled";
           }

           if($page<$total_pages)
           {
             $next_switch="";
           }
           else
           {
             $next_switch="disabled";
           }

          ?>

          <?php 

            if(isset($_GET['blog_id']))
            {?>

              <li class="page-item <?=$previous_switch?>">
                <a class="page-link" href="?page=<?=$page-1?>" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <?php 
              for ($opage=1; $opage <=$total_pages ; $opage++) 
              {
                ?>
                <li class="page-item"><a class="page-link" href="?blog_id=<?=$blog_id?>&page=<?=$opage?>"><?=$opage;?></a></li>
                <?php
              }
               ?>
                <li class="page-item <?=$next_switch?>">
                  <a class="page-link" href="?blog_id=<?php echo $blog_id?>&page=<?=$page+1?>">Next</a>
                </li>
              <?php
            }    
           ?>

        </ul>
      </nav>
  <br>
  <br>
</div>


      <script>
        function follow(user_id,blog_id)
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
               xhr.open("GET",'admin/ajax-process.php?action=add_follower&user_id='+user_id+"&blog_id="+blog_id,true);
               xhr.onreadystatechange=function() {
                   if(xhr.readyState==4 && xhr.status==200)
                  {
                       // document.getElementById('show-data').innerHTML=xhr.responseText;

                       location.reload();
                   }
               }
              xhr.send();

        } 

         function unfollow(user_id)
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
               xhr.open("GET",'admin/ajax-process.php?action=delete_follower&user_id='+user_id,true);
               xhr.onreadystatechange=function() {
                   if(xhr.readyState==4 && xhr.status==200)
                  {
                       // document.getElementById('show-data').innerHTML=xhr.responseText;


                       location.reload();
                   }
               }
              xhr.send();

        } 

      </script>



    <?php 
      require_once('requires/footer.php');
     ?>
</body>
</html>