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


</head>
<body >
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
      $post_per_page=4;
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
            <h1 class="text-white fw-bold" style="position: relative; margin-top:-10%">Welcome to Blogging Application</h1>
            
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
         <div class="container m-auto mt-3 row">

                <div class="col-8">
                <h4>All Posts</h4>
                <hr />

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
                $sql="SELECT * FROM post WHERE post_status='Active' ORDER BY post_id DESC LIMIT $post_result,$post_per_page";
                  $result=mysqli_query($conn,$sql);
              }


               if($result)
               {
                  while($post=mysqli_fetch_assoc($result))
                  {?>
                                
                   <div>
                     <div class="card mb-3" style="max-width: 700px;">
                      <a href="post.php?post_id=<?php echo $post['post_id']?>" style="text-decoration: none; color: black;">
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

                         <div class="row g-0" style="background-color:<?php echo $bg_color;?>;">
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
                               <p class="card-text fw-bold" style="color:<?=$summary_color;?>;font-family: <?=$summary_font_family?>;font-style:<?=$summary_font_style?>;font-size:<?php echo $summary_font_size;?>px;"><span class="text-primary text-truncate">Post Summary </span>: <?php echo substr($post['post_summary'] , 0,70); ?></p>
                               <p class="card-text" style="font-family:<?=$description_font_family;?>;font-size:<?=$description_font_size;?>;color:<?php echo $description_color;?>;font-style:<?=$description_font_style?>"><?php echo substr($post['post_description'], 0,150) ?></p>
                               <p class="card-text"><small class="text-muted">Last updated &nbsp;<?php  $time=strtotime($post['created_at']); echo date('D-M-y,H:i',$time); ?></small></p>    
                               <p class="btn btn-primary">Read More.....</p>
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
       </div>
       <?php

         if(isset($_POST['search']))
        {
           $searched=$_POST['searched'];
           $sql="SELECT * from post WHERE post_title LIKE '%$searched%'";
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
          <li class="page-item <?=$previous_switch?>">
            <a class="page-link" href="?page=<?=$page-1?>" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <?php 
          for ($opage=1; $opage <=$total_pages ; $opage++) 
          {
            ?>
            <li class="page-item"><a class="page-link" href="?page=<?=$opage?>"><?=$opage;?></a></li>
            <?php
          }
           ?>
          <li class="page-item <?=$next_switch?>">
            <a class="page-link" href="?page=<?=$page+1?>">Next</a>
          </li>
        </ul>
      </nav>
  <br>
  <br>
</div>

    <?php 
      require_once('requires/footer.php');
     ?>
</body>
</html>