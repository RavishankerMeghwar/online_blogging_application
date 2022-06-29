<?php 

   if($_SESSION['user'])
   {
     if($_SESSION['user']['role_id']==2)
     {
        header('location:../index.php');
     }
   }
   else
   {
        header('location:../login.php?error_msg='.'<div class="alert alert-danger" role="alert">Please Login First!</div>');
   }

   require_once('requires/connection.php');

   $user_id=$_SESSION['user']['user_id'];
   $sql="SELECT * FROM user WHERE user_id=".$user_id;
   $result=mysqli_query($conn,$sql);
   if($result)
   {
     $image=mysqli_fetch_assoc($result);
   }

 ?>
<html>
    <head>
        <title>Blog</title>
    </head>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="requires/navbar.css">

     <!-- this link javascript for user validation client side -->
     <script type="text/javascript" src="form-validation.js"></script>
    <!-- Datatable Links -->
    <script type="text/javascript" src="./jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <!-- cdn for font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

     <!-- link for chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  </head>
   <body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"><i class='bx bx-menu' id="header-toggle"></i></div>
        <li class="nav-item dropdown" style="list-style: none;">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="<?php echo $image['user_image'];?>"width="40" style="height: 40px;">
        
            
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="admin-profile.php">View Profile</a></li>
            <li><a class="dropdown-item" href="admin-profile.php">Update Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="admin-profile.php">Change Password</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
             <div> 
                    <a href="index.php" style="font-family: arial;" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Blog Admin Panel </span> </a>
                <div class="nav_list"> 
                    <a href="index.php" style="font-family: arial;" class="nav_link active"> <i class='bx bx-home nav_icon'></i> <span class="nav_name">HOME PAGE</span> </a>
                    <a href="users.php" class="nav_link"> <i class="fa-solid fa-users"></i><span class="nav_name">USER MENU</span> </a> 
 
                    <a href="blogs.php" style="font-family: arial;" class="nav_link"><i class="fa-solid fa-blog"></i><span class="nav_name">BLOGS</span> </a>
                    <a href="category.php" style="font-family: arial;" class="nav_link"> <img src="../images/category_icon.png" alt="" style="width: 25px; height: 25px;"><span class="nav_name">CATEGORY</span> </a>
                    <a href="posts.php" style="font-family: arial;" class="nav_link"> <img src="https://cdn1.iconfinder.com/data/icons/communication-vol-3/48/138-512.png" alt="" style="width: 30px; height: 30px; background-color: white;"><span class="nav_name">POSTS</span> </a>
                     <a href="comments.php" style="font-family: arial;" class="nav_link"> <i class="fa-solid fa-comments"></i> <span class="nav_name">COMMENTS</span> </a>
                      <a href="feedback.php" style="font-family: arial;" class="nav_link"> <i class="fa-solid fa-message"></i><span class="nav_name">FEEDBACK</span> </a> 
                    <a href="admin-profile.php" style="font-family: arial;" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">VIEW PROFILE</span> </a>

                    <a href="logout.php" style="font-family: Times New Roman;" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sign Out</span> </a>
                </div>
            </div> 

        </nav>
    </div>
