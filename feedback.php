<?php 
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
     <h1 class="text-center fw-bold mb-4 p-2 text-white" style="background-color:#4682B4">We Want You Feedback</h1>
      
      <div class="row">

       <div class="col-md-1 "></div>
        <div class="col-md-5 shadow p-3 mb-5 bg-body rounded m-2">
          <img src="images/feedback.jpg" class="img-fluid rounded">
        </div>
        <div class="col-md-5 shadow p-3 mb-5 bg-body rounded m-2">
                  <p class="text-center" style="color:<?php echo ($_REQUEST['color'])??''?>"><?php if(isset($_REQUEST['error_msg']))
                  { echo $_REQUEST['error_msg'];}?></h>
          <form action="database-process.php" method="POST">
            <div class="mb-1">
              <label for="exampleInputname" class="form-label">Your Name</label>
              <input type="text" class="form-control" required="true" name="name" placeholder="Enter Your Name Here" id="exampleInputname" aria-describedby="emailHelp">
              
            </div>
            <div class="mb-1">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" required='true' placeholder="Enter Your Email Here" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-1">
              <label for="exampleInputPassword1" class="form-label">Feedback</label>
              <textarea class="form-control" name="feedback" required="true" placeholder="Give Your Feedback or Share Your Opinion With Us" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
            </div>
            <div class="mb-3 form-check">
            </div>
            <button type="submit" class="btn btn-primary w-25 text-center" name="feedback_form" >Submit</button>
          </form>
        </div>
       <div class="col-md-1"></div>
      </div>
    </div>
    <?php 
      require_once('requires/footer.php');
     ?>
</body>
</html>