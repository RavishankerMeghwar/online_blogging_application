
 <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #45526e">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php" style="font-weight: bold;">ONLINE BLOGGING <br> &nbsp; &nbsp; &nbsp;APPLICATION</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item p-2">
          <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
        </li>

        <li class="nav-item dropdown p-2">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            BLOGS
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php 

              require_once('admin/requires/connection.php');

             $sql="SELECT * FROM blog";
             $result=mysqli_query($conn,$sql);

             if($result)
             {
               while($blog=mysqli_fetch_assoc($result))
               {?>
                <li><a class="dropdown-item" href="blog-category-posts.php?blog_id=<?php echo $blog['blog_id']?>"><?php echo $blog['blog_title']?></a></li>
                <?php
               }
             }
             ?>
           </ul>
        </li>

        <li class="nav-item dropdown p-2 " >
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false " >
            CATEGORIES
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php 

              require_once('admin/requires/connection.php');

             $sql="SELECT * FROM category";
             $result=mysqli_query($conn,$sql);

             if($result)
             {
               while($category=mysqli_fetch_assoc($result))
               {?>
                <li><a class="dropdown-item" href="blog-category-posts.php?category_id=<?php echo $category['category_id']?>"><?php echo $category['category_title']?></a></li>
                <?php
               }
             }
             ?>
           </ul>
        </li>
  		  <li class="nav-item p-2">
        	<a class="nav-link active" aria-current="page" href="post_setting.php">POST SETTING</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link active" aria-current="page" href="about-us.php">ABOUT US</a>
        </li>

        <li class="nav-item p-2">
          <a class="nav-link active" aria-current="page" href="feedback.php">FEEDBACK</a>
        </li>

      </ul>

      <span class="float-end text-white">
        <ul>
          
         <?php if(isset($_SESSION['user']) && $_SESSION['user']['role_id']==2)
         {
           $pos=strpos($_SESSION['user']['user_image'],'/');
           $image_name=substr($_SESSION['user']['user_image'], $pos+1)

          ?>
        <li class="nav-item dropdown" style="list-style: none;">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="
            <?php $user_id=$_SESSION['user']['user_id'];
            
                $user_id=$_SESSION['user']['user_id']??'';
                $sql="SELECT * FROM user WHERE user_id=".$user_id;
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $user=mysqli_fetch_assoc($result);
                    echo substr($user['user_image'],3);
                }


           ?>" style='width: 40px; height: 45px; border-radius: 40px;'>
            <?php  echo $user['first_name']." ".$user['last_name']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="update-user-profile.php?view_profile='view_profile'">View Profile </a></li>
            <li><a class="dropdown-item" href="update-user-profile.php?view_profile='view_profile'">Update Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="update-user-profile.php?view_profile='view_profile'">Change Password</a></li>
            <li><a class="dropdown-item" href="post_setting.php">Post Setting</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>     
        <?php
         }
         else
        {
          ?>  
          <div class="d-flex " >
              <a href="login.php" class="nav-link text-white fw-bold mt-2"><i class="fa-solid fa-user"></i>&nbsp;LOGIN</a>
              <a href="user-registration.php" class="nav-link text-white fw-bold mt-2"><i class="fa-solid fa-user-plus"></i>&nbsp;REGISTRATION</a> 
          </div>
          <?php   
 
        }
        ?>

        </ul>
      </span>
      
    </div>
  </div>
</nav>
