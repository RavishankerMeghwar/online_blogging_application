<?php 
    error_reporting(0);

    session_start();
  
 ?>

 <!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="Online Blogging Application in php and mysql">
    <meta name="description" content="Online Blogging Application in php and mysql">
    <title>Login Page</title>
    <!-- bootstrap Link -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <!-- cdn for font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>


    <style>
      input
      {
        margin: 10px;
      }
      input[type='submit']
      {
        width: 100px;
      }
    </style>
  </head>

   <body>

   	   <?php 
   	     require_once('requires/navbar.php');
   	    ?>
   	      <div class="container">
   	      	<div class="row" style="margin-top:13%">

              <?php 

                if(isset($_GET['error_msg']))
                {
                  echo $_GET['error_msg'];
                }

               ?>

   	      	<?php 

   	      	   require_once('admin/requires/connection.php');

   	      	   if(isset($_POST['setting']))
   	      	   {
   	      	    $user_id=$_SESSION['user']['user_id'];

   	      	   	 $title_color=$_POST['color_name'];

   	      	   	  

		      	   	$sql="INSERT INTO setting(user_id,setting_key,setting_value,setting_status)VALUES('".$user_id."','title_color','".$title_color."','Active')";
		      	   	$result=mysqli_query($conn,$sql);
		      	   	if($result)
		      	   	{?>

		      	   	<?php
		      	   	}
   	      	   }
   	      	 ?>
             <div class="col-md-4 shadow-lg pt-4 pb-4">
               <p class="fw-bold" style="font-size: 25px; color: blue;cursor: pointer;" onclick="title_setting()">Title Setting</p>
               <p class="fw-bold" style="font-size: 25px;color: blue;cursor: pointer;" onclick="bg_setting()">Background Setting</p>
               <p class="fw-bold" style="font-size: 25px;color: blue;cursor: pointer;" onclick="summary_setting()">Summary Setting</p>
               <p class="fw-bold" style="font-size: 25px;color: blue; cursor: pointer;" onclick="description_setting()">Decription Setiing</p>
             </div>

   	      		<div class="col-md-7 text-center"  id="show-setting">
   	      		</div>
   	      	</div>
   	      </div>

          <div class="container"></div>


          <script>
            function title_setting()
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
                xhr.open("GET",'admin/ajax-process.php?action=show_title_setting_form',true);
                xhr.onreadystatechange=function()
               {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                        document.getElementById('show-setting').innerHTML=xhr.responseText;

                    }
                }
                xhr.send();
            }


            function bg_setting()
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
                xhr.open("GET",'admin/ajax-process.php?action=show_bg_setting_form',true);
                xhr.onreadystatechange=function()
               {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                        document.getElementById('show-setting').innerHTML=xhr.responseText;

                    }
                }
                xhr.send();
            }

            function summary_setting()
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
                xhr.open("GET",'admin/ajax-process.php?action=show_summary_setting_form',true);
                xhr.onreadystatechange=function()
               {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                        document.getElementById('show-setting').innerHTML=xhr.responseText;

                    }
                }
                xhr.send();
            }

            function description_setting()
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
                xhr.open("GET",'admin/ajax-process.php?action=show_description_setting_form',true);
                xhr.onreadystatechange=function()
               {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                        document.getElementById('show-setting').innerHTML=xhr.responseText;

                    }
                }
                xhr.send();
            }
          </script>
          <?php 

            $user_id=$_SESSION['user']['user_id'];   
            if(isset($_POST['title_setting']))
           {
              $title_color=$_POST['title_color'];
              
              $sql="DELETE FROM setting WHERE setting_key='title_color' AND user_id='".$user_id."'";
              $delete=mysqli_query($conn,$sql);
           

              $sql="INSERT INTO setting(user_id,setting_key,setting_value,setting_status)VALUES('".$user_id."','title_color','".$title_color."','Active')";
              $result=mysqli_query($conn,$sql);
      
               $sql="DELETE FROM setting WHERE setting_key='text_align' AND user_id='".$user_id."'";
                     $delete=mysqli_query($conn,$sql);
              
              foreach($_POST['align'] as $align)
              {
                $sql="INSERT INTO setting(user_id,setting_key,setting_value,setting_status)VALUES('".$user_id."','text_align','".$align."','Active')";
                 $result=mysqli_query($conn,$sql);
              }

                $sql="DELETE FROM setting WHERE setting_key='font_style' AND user_id='".$user_id."'";
                     $delete=mysqli_query($conn,$sql);

              foreach($_POST['font_style'] as $align)
              {
                $sql="INSERT INTO setting(user_id,setting_key,setting_value,setting_status)VALUES('".$user_id."','font_style','".$align."','Active')";
                 $result=mysqli_query($conn,$sql);
              }

              $sql="DELETE FROM setting WHERE setting_key='font_size' AND user_id='".$user_id."'";
                $delete=mysqli_query($conn,$sql);

              $font_size=$_POST['font_size'];
              $sql="INSERT INTO setting(user_id,setting_key,setting_value,setting_status)VALUES('".$user_id."','font_size','".$font_size."','Active')";
                 $result=mysqli_query($conn,$sql);


              $sql="DELETE FROM setting WHERE setting_key='font_family' AND user_id='".$user_id."'";
                $delete=mysqli_query($conn,$sql);

              $font_size=$_POST['font_family'];
              $sql="INSERT INTO setting(user_id,setting_key,setting_value,setting_status)VALUES('".$user_id."','font_family','".$font_size."','Active')";
                 $result=mysqli_query($conn,$sql);
                 ?>

                   <h1 class="text-center text-success mt-2 fw-bold">Post Title Setting updated</h1>

                 <?php




          }
          elseif(isset($_POST['background_setting']))
          {
            $sql="DELETE FROM setting WHERE setting_key='bg_color' AND user_id='".$user_id."'";
              $delete=mysqli_query($conn,$sql);

            $font_size=$_POST['bg_color'];
            $sql="INSERT INTO setting(user_id,setting_key,setting_value,setting_status)VALUES('".$user_id."','bg_color','".$font_size."','Active')";
               $result=mysqli_query($conn,$sql);
               ?>

                 <h1 class="text-center text-success mt-2 fw-bold">Post Background color Updated</h1>

               <?php
          }

          elseif(isset($_POST['summary_setting']))
           {
              $summary_color=$_POST['color'];
              
              $sql="DELETE FROM setting WHERE setting_key='summary_color' AND user_id='".$user_id."'";
              $delete=mysqli_query($conn,$sql);
           

              $sql="INSERT INTO setting(user_id,setting_key,setting_value,setting_status)VALUES('".$user_id."','summary_color','".$summary_color."','Active')";
              $result=mysqli_query($conn,$sql);
          
              $sql="DELETE FROM setting WHERE setting_key='summary_font_style' AND user_id='".$user_id."'";
                     $delete=mysqli_query($conn,$sql);

              foreach($_POST['font_style'] as $align)
              {
                $sql="INSERT INTO setting(user_id,setting_key,setting_value,setting_status)VALUES('".$user_id."','summary_font_style','".$align."','Active')";
                 $result=mysqli_query($conn,$sql);
              }

              $sql="DELETE FROM setting WHERE setting_key='summary_font_size' AND user_id='".$user_id."'";
                $delete=mysqli_query($conn,$sql);

              $font_size=$_POST['font_size'];
              $sql="INSERT INTO setting(user_id,setting_key,setting_value,setting_status)VALUES('".$user_id."','summary_font_size','".$font_size."','Active')";
                 $result=mysqli_query($conn,$sql);


              $sql="DELETE FROM setting WHERE setting_key='summary_font_family' AND user_id='".$user_id."'";
                $delete=mysqli_query($conn,$sql);

              $font_size=$_POST['font_family'];
              $sql="INSERT INTO setting(user_id,setting_key,setting_value,setting_status)VALUES('".$user_id."','summary_font_family','".$font_size."','Active')";
                 $result=mysqli_query($conn,$sql);
                 ?>

                   <h1 class="text-center text-success mt-2 fw-bold">Post Summary Setting updated</h1>

                 <?php
          }

          elseif(isset($_POST['description_setting']))
           {
              $summary_color=$_POST['color'];
              
              $sql="DELETE FROM setting WHERE setting_key='description_color' AND user_id='".$user_id."'";
              $delete=mysqli_query($conn,$sql);
           

              $sql="INSERT INTO setting(user_id,setting_key,setting_value,setting_status)VALUES('".$user_id."','description_color','".$summary_color."','Active')";
              $result=mysqli_query($conn,$sql);
          
              $sql="DELETE FROM setting WHERE setting_key='description_font_style' AND user_id='".$user_id."'";
                     $delete=mysqli_query($conn,$sql);

              foreach($_POST['font_style'] as $align)
              {
                $sql="INSERT INTO setting(user_id,setting_key,setting_value,setting_status)VALUES('".$user_id."','description_font_style','".$align."','Active')";
                 $result=mysqli_query($conn,$sql);
              }

              $sql="DELETE FROM setting WHERE setting_key='description_font_size' AND user_id='".$user_id."'";
                $delete=mysqli_query($conn,$sql);

              $font_size=$_POST['font_size'];
              $sql="INSERT INTO setting(user_id,setting_key,setting_value,setting_status)VALUES('".$user_id."','description_font_size','".$font_size."','Active')";
                 $result=mysqli_query($conn,$sql);


              $sql="DELETE FROM setting WHERE setting_key='description_font_family' AND user_id='".$user_id."'";
                $delete=mysqli_query($conn,$sql);

              $font_size=$_POST['font_family'];
              $sql="INSERT INTO setting(user_id,setting_key,setting_value,setting_status)VALUES('".$user_id."','description_font_family','".$font_size."','Active')";
                 $result=mysqli_query($conn,$sql);
                 ?>

                   <h1 class="text-center text-success mt-2 fw-bold">Post Description Setting updated</h1>

                 <?php
          }
          

           ?>



                 
    <br><br><br><br>
    <br><br><br><br>
      <?php 
         require_once('requires/footer.php');
      ?>
  </body>
</html>
