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
<body>
   <?php 
     require_once('requires/navbar.php');
    ?>
    
    <div class="container-fluid  mb-5" style="margin-top: 6%;">
     <h1 class="text-center fw-bold mb-4 p-2 text-white" style="background-color:#4682B4">ABOUT US</h1>
      
      <div class="row">
       <div class="col-md-1 "></div>
        <div class="col-md-5 shadow p-3 mb-5 bg-body rounded m-2">
          <img src="images/about-us.jpg" class="img-fluid rounded">
        </div>
        <div class="col-md-5 shadow p-3 mb-5 bg-body rounded m-2">
          <p class="text-secondary">
           <h4 class="fw-bold">ABOUT</h4>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
       <div class="col-md-1"></div>
      </div>
    </div>

     <div class="container">
       <div class="row ">
         <h1 class="text-center fw-bold mb-4 p-2 text-white" style="background-color:#4682B4">Our Team Creater of Online Blogging Application</h1>
         <div class="col-md-4">
            <div class="card" style="width: 24rem;">
              <img src="https://media.istockphoto.com/photos/smiling-indian-man-looking-at-camera-picture-id1270067126?k=20&m=1270067126&s=612x612&w=0&h=ZMo10u07vCX6EWJbVp27c7jnnXM2z-VXLd-4maGePqc=" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Ravi Shanker</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.</p>
                <a href="#" class="btn btn-primary">Web Developer</a>
              </div>
            </div>
         </div>

         <div class="col-md-4">
            <div class="card" style="width: 24rem;">
              <img src="https://img.freepik.com/free-photo/close-up-young-successful-man-smiling-camera-standing-casual-outfit-against-blue-background_1258-66609.jpg?w=2000" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Kalyan Kumar</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. </p>
                <a href="#" class="btn btn-primary">Backend Developer</a>
              </div>
            </div>
         </div>

         <div class="col-md-4">
            <div class="card" style="width: 24rem;">
              <img src="https://media.gettyimages.com/photos/studio-waist-up-portrait-of-a-beautiful-businesswoman-with-crossed-picture-id1180926773?s=612x612" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Ayesha Ali</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.</p>
                <a href="#" class="btn btn-primary ">Web Designer</a>
              </div>
            </div>
         </div>           
         </div>
       </div>
     </div>


       <div class="container mt-5">

         <div class="row">
        <h1 class="text-center fw-bold mb-4 p-2 text-white" style="background-color:#4682B4">Our office Address</h1>
           <div class="col-md-6">

            <ul>
              <li style="list-style: none;margin: 5px" class="m-1"><i class="fa-solid fa-location-dot"></i>&nbsp;Kashmir Road, Karachi</li>
              <li style="list-style: none;margin: 5px" class="m-1"><i class="fa-solid fa-envelope"></i>&nbsp;onblogapp.org.pk</li>
              <li style="list-style: none;margin: 5px" class="m-1"><i class="fa-solid fa-phone"></i></i>&nbsp;(0221)-310009</li>
            </ul>

           </div>
           <div class="col-md-6">
             
              <img src="https://www.pngall.com/wp-content/uploads/2016/05/Man-PNG-File.png" class="img-fluid">
           </div>
         </div>
       </div>
     <br><br><br><br>
     
    <?php 
      require_once('requires/footer.php');
     ?>
</body>
</html>