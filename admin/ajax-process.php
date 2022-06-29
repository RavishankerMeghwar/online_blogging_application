<?php 
    
    session_start();
    require_once('database.php');
    require_once('requires/connection.php');
    require_once('send-mail-class.php'); 
    
    if(isset($_REQUEST['action']) && $_REQUEST['action']=="show_add_user_form")
   {?>
      <h1 class="fw-bold  text-center">User Registration Form</h1>
      
      <div class="row justify-content-center  mb-5 ">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black mb-5 mt-3" style="border-radius: 25px; ">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
              
                  <p class="text-center h1 fw-bold mb-5 mt-4">ADD NEW USER</p>   
                   
                  <span class='span' id="match_email_msg"></span><br>
                  <span class='span' id="match_password_msg"></span>
                  
                  <form class="mx-1 mx-md-4" method="POST" onsubmit="return validation()"  action="database-process.php" enctype="multipart/form-data">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>&nbsp;
                      <div class="form-outline flex-fill mb-0">
                        <span class="span" id="first_name_msg"></span>
                        <input type="text" id="first_name" name="first_name"  placeholder="Please Enter First Name" class="form-control" />
                        <label class="form-label" >First Name</label>
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>&nbsp;
                      <div class="form-outline flex-fill mb-0">
                        <span id="last_name_msg"></span>
                        <input type="text"   placeholder="Please Enter Last Name" id="last_name" name="last_name" class="form-control" />
                        <label class="form-label" for="form3Example1c">Last Name</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>&nbsp;
                      <div class="form-outline flex-fill mb-0">
                        <span class="span" id="email_msg"></span>
                        <input type="email" onblur="check_email_exists()"  placeholder="Enter Email" id="email" name="email"  class="form-control" />
                        <label class="form-label" >Email</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>&nbsp;
                      <div class="form-outline flex-fill mb-0">
                        <span class="span" id="confirm_email_msg"></span>
                        <input type="email"   placeholder="Enter Repeate Email" name="confirm_email" id="confirm_email"  class="form-control" />
                        <label class="form-label" >Confirm Email</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>&nbsp;
                      <div class="form-outline flex-fill mb-0">
                        <span class="span" id="password_msg"></span>
                        <input type="password"  placeholder="Please Enter  Password Here" name="password" id="password"   class="form-control" />
                        <label class="form-label" >Password</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <span class="span" id="confirm_password_msg"></span>
                        <input type="password"  placeholder="Enter Confirm Password Here" name="confirm_password" id="confirm_password"  class="form-control" />
                        <label class="form-label" >Confirm Password</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa-solid fa-lg me-3 fa-user"></i>
                      <div class="form-outline flex-fill mb-0">
                        <span class="span" id="gender_msg"></span>
                        <select id="gender" class="form-control" name="gender">
                          <option value="">--Select Gender--</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa-solid fa-lg me-3 fa-calendar"></i>&nbsp;
                      <div class="form-outline flex-fill mb-0">
                        <span class="span" id="dob_msg"></span>
                        <input type="date" name="dob" id="date"  placeholder="Enter Confirm Password"  class="form-control" />
                        <label class="form-label" >Data of Brith</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <img src="../images/user-icon.png" width="30">&nbsp;
                      <div class="form-outline flex-fill mb-0">
                        <span class="span" id="image_msg"></span>
                        <input type="file" name="file" id="image" required="true" accept="image/*"  class="form-control" />
                        <label class="form-label" >Select Profile <span class="span">Maximum Size 1MB</span></label>
                      </div>
                    </div>


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa-solid fa-lg me-3 fa-location-dot"></i>&nbsp;
                      <div class="form-outline flex-fill mb-0">
                        <span class="span" id="address_msg"></span>
                        <textarea id="address"  name="address" class="form-control" placeholder="Enter User Address Here"></textarea>
                        <label class="form-label" >Address</label>
                      </div>
                    </div>

                    <div class="form-check d-flex justify-content-center">
                      <span class="span" id="term_msg"></span><br /> 
                    </div>
                      <div class="form-outline flex-fill mb-0">
                      <input class="form-check-input me-2" name="term" type="checkbox" value="" id="term" />
                      <label class="form-check-label"  for="form2Example3">
                        I agree all statements in <a href="#!">Terms of service</a>
                      </label>
                    </div> 

                       <br>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" name="registration"  class="btn btn-primary btn-lg" >Register</button>
                    </div>

                  </form>

                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 d-flex align-items-center order-1 order-lg-2">

                  <img src="../images/regist_form.jpg"  class="img-fluid rounded" alt="Sample image" style="height:79%">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
   <?php
   }
   elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="show_all_user_information")
   {?>
      <!-- Page Heading -->
      <h1 class="h3 mb-2  fw-bold text-center">USERS INFORMATIONS</h1>
      
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th style="text-align: center;">Sno</th>
                              <th>Profile</th>
                              <th>User_Name</th>
                              <th>Email</th>
                              <th>Gender</th>
                              <th>Age</th>
                              <th>User_Address</th>
                              <th width="200">User Role</th>
                              <th>Approve Status</th>
                              <th style="width: 120px;">Accept/Reject_Request</th>
                              <th>Active Status</th>
                              <th>Update</th>
                              <th>Delete</th>
                          </tr>
                      </thead>
                      <tbody>
                         <?php 
                         $obj=new database();
                         $result = $obj->select_all_users();
                         if($result->num_rows)
                         {
                           $sno=1;
                             while ($row=mysqli_fetch_assoc($result))
                             {
                              ?>
                                 <tr>
                                     <td><?php echo $sno?></td>
                                     <td><img src="<?=$row['user_image']?>" width='60' class="rounded-circle"></td>
                                     <td><?=$row['first_name']." ".$row['last_name'] ?></td>
                                     <td><?=$row['email'] ?></td>
                                     <td><?=$row['gender'] ?></td>
                                     <td><?=$row['date_of_birth'] ?></td>
                                     <td><?=$row['address'] ?></td>
                                     <td><?php 

                                          if ($row['role_id']==1) {
                                             ?> <p>ADMIN</p>
                                             <?php
                                          }elseif($row['role_id']==2)
                                          {
                                          ?> <p >USER</p>
                                             <?php
                                          }

                                      ?></td>
                                      <td><?php 

                                           if ($row['is_approved']=='Approved') {
                                              ?> <p style="color:green; font-weight: bold; font-size: 18px;">Approved</p>
                                              <?php
                                           }elseif($row['is_approved']=='Pending')
                                           {
                                           ?> <p style="color:blue;font-weight: bold; font-size: 18px;">Pending</p>
                                              <?php
                                           }
                                           elseif($row['is_approved']=='Rejected')
                                           {
                                           ?> <p style="color:red;font-weight: bold; font-size: 18px;">Rejected</p>
                                              <?php
                                           }


                                       ?></td>
                                     <td>
                                       <?php 
                                       if($row['is_approved']=='Pending')
                                          { ?>
                                             <button class="btn btn-success " onclick="approved(<?php echo $row['user_id']?>)">Approve</button>
                                             <button class="btn btn-danger " onclick="reject(<?php echo $row['user_id']?>)">Reject</button>

                                             <?php
                                          }elseif($row['is_approved']=='Approved')
                                          {?>
                                             <button class="btn btn-danger" onclick="reject(<?php echo $row['user_id']?>)">Reject</button><?php
                                          }
                                          elseif($row['is_approved']=='Rejected')
                                          {?>
                                             <button class="btn btn-success" onclick="approved(<?php echo $row['user_id']?>)">Approve</button><?php
                                          }
                                          ?>  
                                       </td><td><?php 
                                       if($row['is_active']=='Active')
                                          { ?>
                                             <button class="btn btn-primary" onclick="active(<?php echo $row['user_id']?>)">Active</button><?php
                                          }elseif($row['is_active']=='InActive')
                                          {?>
                                             <button class="btn btn-warning" onclick="inactive(<?php echo $row['user_id']?>)">InActive</button>
                                          <?php
                                          }?></td>
                                     
                                    
                                     <td><button onclick="update_user_data(<?php echo $row['user_id']?>)" class="btn btn-primary"><i class="fas fa-edit fa-1x text-gray-300"></i>Edit</button></td>
                                     <td><button style="width: 100px;" onclick="delete_user_data(<?php echo $row['user_id']?>)" class="btn btn-danger"><i class="fas fa-trash fa-1x text-gray-300"></i>&nbsp;Delete</button></td>

                                  </tr>
                              <?php
                              $sno++;
                             }
                         }
                          ?>
                       </tbody>
                  </table>
              </div>
          </div>
      </div>
   <?php
   }
    elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="reject")
    {
        $user_id=$_REQUEST['user_id'];


        $user_id=$_REQUEST['user_id'];
        $obj=new database();
        $result = $obj->reject($user_id);
         if($result)
         {
            $res=$obj->update_user_record($user_id);
            $row=mysqli_fetch_assoc($res);
            $mail=new send_mail_class();
            $send_mail=$mail->send_to_admin_regis($row['email'],'Account InActived','Dear user your account of  Online Blogging Application Rejected By Admin if you have any query please contact with admin');
             
            echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>User Request with ID ('".$user_id."') Rejected</p>";
         }
         else
         {
            echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>User Request with ID ('".$user_id."') Not Rejected</p>";
        }
    }
    elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="approve")
    {
        $user_id=$_REQUEST['user_id'];

        $user_id=$_REQUEST['user_id'];
        $obj=new database();
        $result = $obj->approved($user_id);
         if($result)
         {
            $res=$obj->update_user_record($user_id);
            $row=mysqli_fetch_assoc($res);
            $mail=new send_mail_class();
            $send_mail=$mail->send_to_admin_regis($row['email'],'Account Approve','Dear user your account of  Online Blogging Application Approved By Admin if Your Account is Actived By Admin Now you can login');
             
            echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>User Request with ID ('".$user_id."') Approved</p>";
         }
         else
         {
            echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>User Request with ID ('".$user_id."') Not Approved</p>";
        }
    }
    elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="active")
    {
        $user_id=$_REQUEST['user_id'];
        $obj=new database();
        $result = $obj->active($user_id);
         if($result)
         {
          $res=$obj->update_user_record($user_id);
            $row=mysqli_fetch_assoc($res);
            $mail=new send_mail_class();
            $send_mail=$mail->send_to_admin_regis($row['email'],'Account IActived','Dear user your account of  Online Blogging Application InActived By Admin if you have query please contact with admin');
             
            
            echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>User Request with ID ('".$user_id."') InActived</p>";
         }
         else
         {
            echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>User Request with ID ('".$user_id."') Not InActived</p>";
        }
    }
    elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="inactive")
    {
        $user_id=$_REQUEST['user_id'];

        $user_id=$_REQUEST['user_id'];
        $obj=new database();
        $result = $obj->inactive($user_id);
         if($result)
         {
           $res=$obj->update_user_record($user_id);
            $row=mysqli_fetch_assoc($res);
            $mail=new send_mail_class();
            $send_mail=$mail->send_to_admin_regis($row['email'],'Account Actived','Dear user your account of  Online Blogging Application Actived By Admin Now you can login');
             
              echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>User Request with ID ('".$user_id."') Actived</p>";
         }
         else
         {
            echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>User Request with ID ('".$user_id."') Not Actived</p>";
        }
    }

    elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="pending_request")
    {?>
       <!-- Page Heading -->
       <h1 class="h3 mb-2  fw-bold text-center">Pending Users Record</h1>
       
       <!-- DataTales Example -->
       <div class="card shadow mb-4">
           <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       <thead>
                           <tr>
                               <th>Sno</th>
                               <th>Profile</th>
                               <th>Name</th>
                               <th>Email</th>
                               <th>Gender</th>
                               <th>Age</th>
                               <th>Accept/Reject</th>
                               <th>address</th>
                           </tr>
                       </thead>
                       <tbody>
                          <?php 

                          $obj=new database();
                          $result = $obj->select_all_pending_users();
                          if($result->num_rows)
                          {
                            $sno=1;
                              while ($row=mysqli_fetch_assoc($result))
                              {
                               ?>
                                  <tr>
                                      <td><?php echo $sno?></td>
                                      <td><img src="<?=$row['user_image']?>" width='60' class="rounded-circle"></td>
                                      <td><?=$row['first_name']." ".$row['last_name'] ?></td>
                                      <td><?=$row['email'] ?></td>
                                      <td><?=$row['gender'] ?></td>
                                      <td><?=$row['date_of_birth'] ?></td>
                                      <td>
                                        <?php 
                                        if($row['is_approved']=='Pending')
                                           { ?>
                                              <button class="btn btn-warning" onclick="approved(<?php echo $row['user_id']?>)">Pending</button><?php
                                           }elseif($row['is_approved']=='Approved')
                                           {?>
                                              <button class="btn btn-primary" onclick="reject(<?php echo $row['user_id']?>)">Approved</button><?php
                                           }
                                           elseif($row['is_approved']=='Rejected')
                                           {?>
                                              <button class="btn btn-danger" onclick="approved(<?php echo $row['user_id']?>)">Rejected</button><?php
                                           }
                                           ?>  
                                        </td>
                                      <td><?=$row['address'] ?></td>

                                   </tr>
                               <?php
                               $sno++;
                              }
                          }
                           ?>
                        </tbody>
                   </table>
               </div>
           </div>
       </div>
    <?php
    }
    elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="inactive_users_records")
    {?>
       <!-- Page Heading -->
       <h1 class="h3 mb-2  fw-bold text-center">InActive Users Records</h1>
       
       <!-- DataTales Example -->
       <div class="card shadow mb-4">
           <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       <thead>
                           <tr>
                               <th>Sno</th>
                               <th>Profile</th>
                               <th>Name</th>
                               <th>Email</th>
                               <th>Gender</th>
                               <th>Age</th>
                               <th>Status</th>
                               <th>address</th>
                           </tr>
                       </thead>
                       <tbody>
                          <?php 

                          $obj=new database();
                          $result = $obj->inactive_users_records();
                          if($result->num_rows)
                          {
                            $sno=1;
                              while ($row=mysqli_fetch_assoc($result))
                              {
                               ?>
                                  <tr>
                                      <td><?php echo $sno?></td>
                                      <td><img src="<?=$row['user_image']?>" width='60' class="rounded-circle"></td>
                                      <td><?=$row['first_name']." ".$row['last_name'] ?></td>
                                      <td><?=$row['email'] ?></td>
                                      <td><?=$row['gender'] ?></td>
                                      <td><?=$row['date_of_birth'] ?></td>
                                      <td><?php 
                                        if($row['is_active']=='Active')
                                           { ?>
                                              <button class="btn btn-primary" onclick="active(<?php echo $row['user_id']?>)">Active</button><?php
                                           }elseif($row['is_active']=='InActive')
                                           {?>
                                              <button class="btn btn-warning" onclick="inactive(<?php echo $row['user_id']?>)">InActive</button>
                                           <?php
                                           }?></td>
                                      <td><?=$row['address'] ?></td>

                                   </tr>
                               <?php
                               $sno++;
                              }
                          }
                           ?>
                        </tbody>
                   </table>
               </div>
           </div>
       </div>
    <?php
    }
    elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="update_record")
    { 
      $user_id=$_REQUEST['user_id'];
      $obj=new database();
      $result=$obj->update_user_record($user_id);

      if($result->num_rows)
      {
        
         $row=mysqli_fetch_assoc($result);
      ?>
       <h1 class="fw-bold  text-center">UPDATE USER RECORDS</h1>
       
       <div class="row justify-content-center  mb-5 ">
         <div class="col-lg-12 col-xl-11">
           <div class="card text-black mb-5 mt-3" style="border-radius: 25px; ">
             <div class="card-body p-md-5">
               <div class="row justify-content-center">
                 <div class="col-md-10 col-lg-10 col-xl-10 order-2 order-lg-1">
               
                    
                   <span class='span' id="match_email_msg"></span><br>
                   <span class='span' id="match_password_msg"></span>
                   
                   <form class="mx-1 mx-md-4" method="POST" onsubmit="return update_validation()"  action="database-process.php" enctype="multipart/form-data">

                     <div class="d-flex flex-row align-items-center mb-4">
                       <i class="fas fa-user fa-lg me-3 fa-fw"></i>&nbsp;
                       <div class="form-outline flex-fill mb-0">
                         <span class="span" id="first_name_msg"></span>
                         <input type="text" id="first_name" name="first_name" value="<?php echo $row['first_name']?>" class="form-control" />
                         <label class="form-label" >First Name</label>
                         <input type="hidden" name="user_id" value="<?php echo $row['user_id']?>" class="form-control" />

                       </div>
                     </div>
                     <div class="d-flex flex-row align-items-center mb-4">
                       <i class="fas fa-user fa-lg me-3 fa-fw"></i>&nbsp;
                       <div class="form-outline flex-fill mb-0">
                         <span id="last_name_msg"></span>
                         <input type="text"   value="<?php echo $row['last_name']?>" id="last_name" name="last_name" class="form-control" />
                         <label class="form-label" for="form3Example1c">Last Name</label>
                       </div>
                     </div>

                     <div class="d-flex flex-row align-items-center mb-4">
                       <i class="fas fa-user fa-lg me-3 fa-fw"></i>&nbsp;
                       <div class="form-outline flex-fill mb-0">
                         <span id="role_id"></span>
                         <input type="text"   value="<?php echo $row['role_id']?>" id="role_id" name="role_id" class="form-control" />
                         <label class="form-label" for="form3Example1c">User Role ID</label>
                       </div>
                     </div>

                     <div class="d-flex flex-row align-items-center mb-4">
                       <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>&nbsp;
                       <div class="form-outline flex-fill mb-0">
                         <span class="span" id="email_msg"></span>
                         <input type="email"   value="<?php echo $row['email']?>" id="email" name="email"  class="form-control" />
                         <label class="form-label" >Email</label>
                       </div>
                     </div>

                    

                     <div class="d-flex flex-row align-items-center mb-4">
                       <i class="fas fa-lock fa-lg me-3 fa-fw"></i>&nbsp;
                       <div class="form-outline flex-fill mb-0">
                         <span class="span" id="password_msg"></span>
                         <input type="text"  value="<?php echo $row['password']?>" name="password" id="password"   class="form-control" />
                         <label class="form-label" >Password</label>
                       </div>
                     </div>

                     <div class="d-flex flex-row align-items-center mb-4">
                       <img src="../images/user-icon.png" width="30">&nbsp;
                       <div class="form-outline flex-fill mb-0">
                         <span class="span" id="image_msg"></span>
                         <img src="<?php echo $row['user_image']?>" alt="" style="height: 150px; width: 150px;">
                         <input type="file" name="file" id="image" accept="image/*"  class="form-control" />
                         <label class="form-label" >Select Profile <span class="span">Maximum Size 1MB</span></label>
                       </div>
                     </div>


                     <div class="d-flex flex-row align-items-center mb-4">
                       <i class="fa-solid fa-lg me-3 fa-location-dot"></i>&nbsp;
                       <div class="form-outline flex-fill mb-0">
                         <span class="span" id="address_msg"></span>
                         <textarea id="address"  name="address" class="form-control" placeholder="Enter User Address Here"><?php echo $row['address']?></textarea>
                         <label class="form-label" >Address</label>
                       </div>
                     </div>

                        <br>
                     <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                       <button type="submit" name="update"  class="btn btn-primary btn-lg" >Update Record</button>
                     </div>

                   </form>

                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
    <?php

      }
    }
    elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="delete_user_record")
    {
      $user_id=$_REQUEST['user_id'];
      $obj=new database();
      $result=$obj->delete_user_record($user_id);
      if($result)
         {
            echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>User Deleted Successfully</p>";
         }
         else
         {
            echo "<p style='color:red;width:500px; padding:16px; background-color:white; font-weight:bold;'>User Not Deleted Try Again Later</p>";
        }

    }
   elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='check_email_exist')
   {
     $email=$_REQUEST['email'];
     $obj=new database();
     $result=$obj->check_email_exist($email);
     if($result->num_rows)
     {
       while($row=mysqli_fetch_assoc($result))
       {
         if($row['email']==$email)
         {
            
            echo "<span class='text-danger'>This Email Already taken Enter Other Email</span>";
            break;
            
         }
         
       }
     }
     else
         {
            echo "<span class='text-success'>This Email address is Available</span>";
         }
   }
   elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='forget_password_email')
   {
     $email=$_REQUEST['email'];
     $obj=new database();
     $result=$obj->check_email_exist($email);
     if($result->num_rows)
     {
       while($row=mysqli_fetch_assoc($result))
       {
         if($row['email']==$email)
         {
            
               echo "<span class='text-success'>Record Found with this email</span>";
               break;
         }
       }
     }
     else
         {
            echo "<span class='text-danger'>This Email address is Not Found</span>";
         }
   }
   elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='show_all_feedback')
   {?>
     <h1 class="h3 mb-2  fw-bold text-center">ALL FEEDBACK SEND BY USERS</h1>
       
       <!-- DataTales Example -->
       <div class="card shadow mb-4">
           <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       <thead>
                           <tr>
                               <th>Sno</th>
                               <th>Name</th>
                               <th>Email</th>
                               <th>Feddback</th>
                               <th>Time</th>
                               <th>Delete</th>
                           </tr>
                       </thead>
                       <tbody>
                          <?php 

                          $obj=new database();
                          $result = $obj->show_all_feedback();
                          if($result->num_rows)
                          {
                            $sno=1;
                              while ($row=mysqli_fetch_assoc($result))
                              {
                               ?>
                                  <tr>
                                      <td><?php echo $sno?></td>
                                     
                                      <td><?=$row['user_name']?></td>
                                      <td><?=$row['user_email'] ?></td>
                                      <td><?=$row['feedback'] ?></td>
                                      <td><?php $time=strtotime($row['created_at']); echo date('D-M-Y, h:i a',$time); ?></td>
                                      <td><button style="width: 100px;" onclick="delete_feedback(<?php echo $row['feedback_id']?>)" class="btn btn-danger"><i class="fas fa-trash fa-1x text-gray-300"></i>&nbsp;Delete</button></td>

                                   </tr>
                               <?php
                               $sno++;
                              }
                          }
                           ?>
                        </tbody>
                   </table>
               </div>
           </div>
       </div>
    <?php
  }elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='delete_feedback')
  {
    $feedback_id=$_REQUEST['feedback_id'];
    $obj=new database();
    $result=$obj->delete_feedback($feedback_id);
     if($result)
     {
        echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>User Feedback Deleted Successfully</p>";
     }
     else
     {
        echo "<p style='color:red;width:500px; padding:16px; background-color:white; font-weight:bold;'>User Feedback Not Deleted Try Again Later</p>";
    }
  }elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='update_feedback')
  {
    $feedback_id=$_REQUEST['feedback_id'];
    $obj=new database();
    $result=$obj->update_feedback($feedback_id);
     if($result)
     {
       $row=mysqli_fetch_assoc($result);
       ?>
        <div class="container">
        <div class="col-md-12 shadow p-3 mb-5 bg-body rounded m-2">
          <h3 class="text-uppercase text-center fw-bold">Update User Feedback</h3>

                  <p class="text-center" style="color:<?php echo ($_REQUEST['color'])??''?>"><?php if(isset($_REQUEST['error_msg']))
                  { echo $_REQUEST['error_msg'];}?></h>
          <form action="database-process.php" method="POST">
            <div class="mb-1">
              <label for="exampleInputname" class="form-label">User Name</label>
              <input type="text" class="form-control" value="<?php echo $row['user_name']?>" required="true" name="name" placeholder="Enter Your Name Here" id="exampleInputname" aria-describedby="emailHelp">
              <input type="hidden" name="feedback_id" value="<?php echo $row['feedback_id']?>">
              
            </div>
            <div class="mb-1">
              <label for="exampleInputEmail1" class="form-label">User Email address</label>
              <input type="email" class="form-control" value="<?php echo $row['user_email']?>" name="email" required='true' placeholder="Enter Your Email Here" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-1">
              <label for="exampleInputPassword1" class="form-label">User Feedback</label>
              <textarea class="form-control" name="feedback" required="true" placeholder="Give Your Feedback or Share Your Opinion With Us" id="exampleInputEmail1" aria-describedby="emailHelp"><?php echo $row['feedback']?></textarea>
            </div>
            <div class="mb-3 form-check">
            </div>
            <button type="submit" class="btn btn-primary w-25 text-center" name="update_feedback" >Update Feedback</button>
          </form>
        </div>
      </div>
       <?php
     }
    
  }elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="view_profile")
   {
      $user_id=$_REQUEST['user_id'];
      $obj=new database();
      $result=$obj->update_user_record($user_id);
      if($result)
      {
        $row=mysqli_fetch_assoc($result);
        ?>
           <div class="container shadow-lg p-4">
             <div class="row">
              <h1 class="text-center fw-bold text-uppercase p-2 m-2">Your Information Details</h1>
               <div class="col-md-5">
                 <img src="<?php echo $row['user_image'] ?>" class="rounded"  alt="" style="height: 500px; width: 100%;">
               </div>
               <div class="col-md-7">
                 <table class="table table-striped">
                   <tr>
                     <th>First Name:</th>
                     <th><?php echo $row['first_name'] ?></th>
                   </tr>
                   <tr>
                     <th>Last Name:</th>
                     <th><?php echo $row['last_name'] ?></th>
                   </tr>
                   <tr>
                     <th>Email:</th>
                     <th><?php echo $row['email'] ?></th>
                   </tr>
                   <tr>
                     <th>Password:</th>
                     <th><?php echo $row['password'] ?></th>
                   </tr>
                   <tr>
                     <th>Gender:</th>
                     <th><?php echo $row['gender'] ?></th>
                   </tr>
                   <tr>
                     <th>Account Role:</th>
                     <th>Admin</th>
                   </tr>
                    <tr>
                     <th>Account Status:</th>
                     <th><?php echo $row['is_active'] ?></th>
                   </tr>
                    <tr>
                     <th>Address:</th>
                     <th><?php echo $row['address'] ?></th>
                   </tr>
                 </table>
               </div>
             </div>
             <div class="row text-center">
               <div class="col-md-12">
                 <button class="btn btn-primary mt-3" style="width:150px" onclick="update_admin_profile(<?php echo $row['user_id']?>)"><i class="fa fa-edit"></i>&nbsp;Edit Profile</button>
               </div>
             </div>
           </div>
           <br>
           <br>
        <?php
      }
    ?>
    <?php
   }elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="update_admin_profile")
   { 
     $user_id=$_REQUEST['user_id'];
     $obj=new database();
     $result=$obj->update_user_record($user_id);

     if($result->num_rows)
     {
        $row=mysqli_fetch_assoc($result);
     ?>
      <h1 class="fw-bold  text-center">UPDATE YOUR PROFILE</h1>
      
      <div class="row justify-content-center  mb-5 ">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black mb-5 mt-3" style="border-radius: 25px; ">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-10 col-xl-10 order-2 order-lg-1">
              
                   
                  <span class='span' id="match_email_msg"></span><br>
                  <span class='span' id="match_password_msg"></span>
                  
                  <form class="mx-1 mx-md-4" method="POST" onsubmit="return update_validation()"  action="database-process.php" enctype="multipart/form-data">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>&nbsp;
                      <div class="form-outline flex-fill mb-0">
                        <span class="span" id="first_name_msg"></span>
                        <input type="text" id="first_name" name="first_name" value="<?php echo $row['first_name']?>" class="form-control" />
                        <label class="form-label" >First Name</label>
                        <input type="hidden" name="user_id" value="<?php echo $row['user_id']?>" class="form-control" />

                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>&nbsp;
                      <div class="form-outline flex-fill mb-0">
                        <span id="last_name_msg"></span>
                        <input type="text"   value="<?php echo $row['last_name']?>" id="last_name" name="last_name" class="form-control" />
                        <label class="form-label" for="form3Example1c">Last Name</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>&nbsp;
                      <div class="form-outline flex-fill mb-0">
                        <span id="role_id"></span>
                        <input type="text"   value="<?php echo $row['role_id']?>" id="role_id" name="role_id" class="form-control" />
                        <label class="form-label" for="form3Example1c">User Role ID</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>&nbsp;
                      <div class="form-outline flex-fill mb-0">
                        <span class="span" id="email_msg"></span>
                        <input type="email"   value="<?php echo $row['email']?>" id="email" name="email"  class="form-control" />
                        <label class="form-label" >Email</label>
                      </div>
                    </div>

                   

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>&nbsp;
                      <div class="form-outline flex-fill mb-0">
                        <span class="span" id="password_msg"></span>
                        <input type="text"  value="<?php echo $row['password']?>" name="password" id="password"   class="form-control" />
                        <label class="form-label" >Password</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <img src="../images/user-icon.png" width="30">&nbsp;
                      <div class="form-outline flex-fill mb-0">
                        <span class="span" id="image_msg"></span>
                        <img src="<?php echo $row['user_image']?>" alt="" style="height: 150px; width: 150px;">
                        <input type="file" name="file" id="image" accept="image/*"  class="form-control" />
                        <label class="form-label" >Select Profile <span class="span">Maximum Size 1MB</span></label>
                      </div>
                    </div>


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa-solid fa-lg me-3 fa-location-dot"></i>&nbsp;
                      <div class="form-outline flex-fill mb-0">
                        <span class="span" id="address_msg"></span>
                        <textarea id="address"  name="address" class="form-control" placeholder="Enter User Address Here"><?php echo $row['address']?></textarea>
                        <label class="form-label" >Address</label>
                      </div>
                    </div>

                       <br>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" name="update_admin"  class="btn btn-success btn-lg" >Update Record</button>
                    </div>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
   <?php

     }
   }
   
   elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="change_password_form")
   {?>
      <div class="row justify-content-center">
          <div class="col-lg-5">
              <div class="card shadow-lg border-0 rounded-lg mt-5">
                  <div class="card-header"><h3 class="text-center font-weight-light my-4">Reset Password</h3></div>
              <div class="card-body">
                      
                  <div class="form-group mb-2">
                    <strong>Enter Old Password <span class="text-danger">*</span></strong>
                    <input type="password" minlength="8" id="olpassword" maxlength="40" name="oldp" placeholder="Enter Old Password" required class="form-control">
                    <input type="hidden" minlength="8" id="email" value="<?php echo $_SESSION['user']['email'] ?>" maxlength="40" name="email"  required class="form-control">
                 
                  </div>
                            
                  <div class="form-group mb-2">
                    <center>
                      <button  class="btn btn-dark" onclick="change_pass()" type="submit" class="form-control"><i class="fa fa-check"></i>  Verify</button>
                    </center>

                  </div>
             </div>
          </div>
      </div>
  </div>
  <br>
  <br><br>
    <?php
   }
   elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="change_pass")
   {
      $password=$_REQUEST['olpassword'];
      $email=$_REQUEST['email'];
      $obj=new database();
      $result=$obj->forgotpasswor($email);
      if($result->num_rows)
      {
        $row=mysqli_fetch_assoc($result);
        if($password==$row['password'])
        {
          ?>
           <div class="row justify-content-center">
               <div class="col-lg-5">
                   <div class="card shadow-lg border-0 rounded-lg mt-5">
                       <div class="card-header"><h3 class="text-center font-weight-light my-4">Enter New Password</h3></div>
                       <div class="card-body">           
                               <div class="form-floating mb-3">
                                   <input type="password" class="form-control" id="password"  placeholder="**********" />
                                   <label for="password">Password</label>
                               </div> 
                               <div class="form-floating mb-3">
                                   <input type="password" class="form-control" id="cpassword"  placeholder="**********" />

                                   <label for="password">Confirm Password</label>
                                   <input type="hidden" value="<?php echo $_SESSION['user']['email']?>" class="form-control" id="email" />
                               </div>         
                               <div class="d-flex align-items-center justify-content-between mt-4 mb-0 offset-4">
                                    <button class="btn btn-dark"  Value="Set New Password" class="btn btn-info text-white" onclick="set_password_check()"><i class="fa fa-check" ></i> Set New Password</button>  
                              </div>
                       </div>
                   </div>
               </div>
           </div>
         <?php
        }else
        {
         echo "<p style='color:red;width:500px; padding:16px; background-color:white; font-weight:bold;'>Password Does Not Match</p>";
        }
      }
      else
      {
         echo "<p style='color:red;width:500px; padding:16px; background-color:white; font-weight:bold;'>Password Does Not Match</p>";
      }

   }

   elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="set_new_password")
   {
      $password=$_REQUEST['password'];
      $email=$_REQUEST['email'];
      $cpassword=$_REQUEST['cpassword'];
      if($password==$cpassword)
      {
        $obj=new database();
        $result=$obj->set_new_password($email,$password);
        if($result)
        {
           echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Your New Password Successfully Set</p>";
        }
        else
        {
            echo "<p style='color:red;width:500px; padding:16px; background-color:white; font-weight:bold;'>Your New Password Not Set Try Again Later</p>";
        }
      }
      else
      {
         echo "<p style='color:red;width:500px; padding:16px; background-color:white; font-weight:bold;'>Password and Confirm Password Does Not Matched</p>";
      }
   }
   elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="add_blog")
   {?>
      <h1 class="fw-bold text-center">PUBLISH BLOG</h1>
       <div class="row p-4 " >
         <div class="col-md-2"></div>
         <div class="col-md-8">
           <form  method="POST" class="shadow-lg p-4 rounded" onsubmit="return create_blog()" action="database-process.php" enctype="multipart/form-data" >
              <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label">Blog Title</label>
                <span class="span"  id="blog_title_msg"></span>
                <input type="text" required='true' name="blog_title" class="form-control" id="blog_title" id="exampleFormControlInput1" placeholder="Enter blog Title">
              </div>
              <div class="mb-2">
                <label for="exampleFormControlTextarea1" class="form-label">Post Per Page</label>
                <span class="span" id="blog_per_page_msg"></span>

                <input type="text" required='true' class="form-control" id="blog_per_page" id="exampleFormControlInput1" name="post_per_page" placeholder="Post Per Page">
              </div>
              <div class="mb-2">
                <label for="exampleFormControlTextarea1" class="form-label">Blog Background Image</label>
                <span class="span" id="blog_imge_msg"></span>
                <input type="file" required='true' name="blog_background_image" class="form-control" id="blog_background_image" id="exampleFormControlInput1" placeholder="Blog Per Page">
              </div>

              <div class="mb-3 mt-5 text-center">
                <button class="btn btn-success" name="create_blog" onclick="create_blog()" >Create Blog</button>
              </div>
         </div>
         <div class="col-md-2"></div>

       </div>
      </form>
   <?php
   }
    elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='show_blogs')
    {?>
      <h1 class="h3 mb-2  fw-bold text-center">ALL BLOGS</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Blog Title</th>
                                <th>Post Per Page</th>
                                <th>Blog Background Image</th>
                                <th>Blog Status</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php 

                           $obj=new database();
                           $result = $obj->show_blogs();
                           if($result->num_rows)
                           {
                             $sno=1;
                               while ($row=mysqli_fetch_assoc($result))
                               {
                                ?>
                                   <tr>
                                       <td><?php echo $sno?></td>
                                      
                                       <td><?=$row['blog_title']?></td>
                                       <td><?=$row['post_per_page'] ?></td>
                                       <td><img src="<?=$row['blog_background_image'] ?>" alt="" height="50" width="60"></td>
                                       <td>
                                         <?php 
                                       if($row['blog_status']=='Active')
                                          { ?>
                                             <button class="btn btn-primary" onclick="active_blog_status(<?php echo $row['blog_id']?>)">Active</button><?php
                                          }elseif($row['blog_status']=='InActive')
                                          {?>
                                             <button class="btn btn-warning" onclick="inactive_blog(<?php echo $row['blog_id']?>)">InActive</button>
                                          <?php
                                          }?></td>
                                       
                                       <td><button onclick="update_blog(<?php echo $row['blog_id']?>)" class="btn btn-primary"><i class="fas fa-edit fa-1x text-gray-300"></i>Edit</button></td>
                                       <td><button style="width: 100px;" onclick="delete_blog_data(<?php echo $row['blog_id']?>)" class="btn btn-danger"><i class="fas fa-trash fa-1x text-gray-300"></i>&nbsp;Delete</button></td>
                                        
                                    </tr>
                                <?php
                                $sno++;
                               }
                           }
                            ?>
                         </tbody>
                    </table>
                </div>
            </div>
        </div>
     <?php
   }elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="active_blog")
    {

        $blog_id=$_REQUEST['blog_id'];
        $obj=new database();
        $result = $obj->active_blog_status($blog_id);
         if($result)
         {  
            echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Blog with ID ('".$blog_id."') Inactivved </p>";
         }
         else
         {
            echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Blog with ID ('".$blog_id."') Not InActved</p>";
        }
    }
    elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="inactive_blog")
        {

            $blog_id=$_REQUEST['blog_id'];
            $obj=new database();
            $result = $obj->inactive_blog_status($blog_id);
             if($result)
             {  
                echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Blog with ID ('".$blog_id."') Actived </p>";
             }
             else
             {
                echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Blog with ID ('".$blog_id."') Not Actived</p>";
            }
        }
        elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="update_blog")
       {
         $blog_id=$_REQUEST['blog_id'];
         $obj=new database();
         $result=$obj->get_data_for_update_blog($blog_id);
         if($result)
         { 
            $row=mysqli_fetch_assoc($result);
          ?>
            <h1 class="fw-bold text-center">Update BLOG</h1>
             <div class="row p-4 " >
               <div class="col-md-2"></div>
               <div class="col-md-8">
                 <form  method="POST" class="shadow-lg p-4 rounded"  action="database-process.php" enctype="multipart/form-data" >
                    <div class="mb-2">
                      <label for="exampleFormControlInput1" class="form-label">Blog Title</label>
                      <span class="span"  id="blog_title_msg"></span>
                      <input type="text" required='true' value="<?php echo $row['blog_title'] ?>" name="blog_title" class="form-control" id="blog_title" id="exampleFormControlInput1" placeholder="Enter blog Title">
                      <input type="hidden" name="blog_id" value="<?php echo $row['blog_id'] ?>">
                    </div>
                    <div class="mb-2">
                      <label for="exampleFormControlTextarea1" class="form-label">Post Per Page</label>
                      <span class="span" id="blog_per_page_msg"></span>

                      <input type="text" required='true' value="<?php echo $row['post_per_page'] ?>" class="form-control" id="blog_per_page" id="exampleFormControlInput1" name="post_per_page" placeholder="Post Per Page">
                    </div>
                    <div class="mb-2">
                      <img src="<?php echo $row['blog_background_image'] ?>" alt="" style="width: 100px; height: 70px;"><br>
                      <span class="span" id="blog_imge_msg"></span>

                      <input type="file"  name="blog_background_image" class="form-control" id="blog_background_image" id="exampleFormControlInput1" placeholder="Blog Per Page">
                    </div>

                    <div class="mb-3 mt-5 text-center">
                      <button class="btn btn-success" name="update_blog" >Update Blog</button>
                    </div>
               </div>
               <div class="col-md-2"></div>

             </div>
            </form>
           <?php
          }
        }
        elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="delete_blog")
        {
          $blog_id=$_REQUEST['blog_id'];
          $obj=new database();
          $result=$obj->delete_blog_record($blog_id);
          if($result)
             {
                echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>blog Deleted Successfully</p>";
             }
             else
             {
                echo "<p style='color:red;width:500px; padding:16px; background-color:white; font-weight:bold;'>Blog Not Deleted Try Again Later</p>";
            }
        }
         elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='show_categories')
         {?>
           <h1 class="h3 mb-2  fw-bold text-center">ALL CATEGORIES</h1>
             
             <!-- DataTales Example -->
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                             <thead>
                                 <tr>
                                     <th>Sno</th>
                                     <th>Category Title</th>
                                     <th>Category Description</th>
                                     <th>Category Status</th>
                                     <th>Update</th>
                                     <th>Delete</th>
                                 </tr>
                             </thead>
                             <tbody>
                                <?php 

                                $obj=new database();
                                $result = $obj->show_categories();
                                if($result->num_rows)
                                {
                                  $sno=1;
                                    while ($row=mysqli_fetch_assoc($result))
                                    {
                                     ?>
                                        <tr>
                                            <td><?php echo $sno?></td>
                                           
                                            <td><?=$row['category_title']?></td>
                                            <td><?=$row['category_description'] ?></td>
                                            <td>
                                              <?php 
                                            if($row['category_status']=='Active')
                                               { ?>
                                                  <button class="btn btn-primary" onclick="active_category_status(<?php echo $row['category_id']?>)">Active</button><?php
                                               }elseif($row['category_status']=='InActive')
                                               {?>
                                                  <button class="btn btn-warning" onclick="inactive_category(<?php echo $row['category_id']?>)">InActive</button>
                                               <?php
                                               }?></td>
                                            
                                            <td><button onclick="update_category(<?php echo $row['category_id']?>)" class="btn btn-primary"><i class="fas fa-edit fa-1x text-gray-300"></i>Edit</button></td>
                                            <td><button style="width: 100px;" onclick="delete_category_record(<?php echo $row['category_id']?>)" class="btn btn-danger"><i class="fas fa-trash fa-1x text-gray-300"></i>&nbsp;Delete</button></td>
                                             
                                         </tr>
                                     <?php
                                     $sno++;
                                    }
                                }
                                 ?>
                              </tbody>
                         </table>
                     </div>
                 </div>
             </div>
          <?php
    }elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="category_form")
   {?>
      <h1 class="fw-bold text-center">CREATE CATEGORY</h1>
       <div class="row p-4 " >
         <div class="col-md-2"></div>
         <div class="col-md-8">
           <form  method="POST" class="shadow-lg p-4 rounded"  action="database-process.php" enctype="multipart/form-data" >
              <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label">Category Title</label>
                <input type="text" required='true' name="category_title" class="form-control" id="blog_title" id="exampleFormControlInput1" placeholder="Enter blog Title">
              </div>
              <div class="mb-2">
                <label for="exampleFormControlTextarea1" class="form-label">Category Description</label><br>
                <textarea name="category_description" id="" required='true' class="form-control" rows="3" placeholder="Enter Category Description"></textarea>

              </div>

              <div class="mb-3 mt-5 text-center">
                <button class="btn btn-success" name="create_catgeory" >Publish Category</button>
              </div>
         </div>
         <div class="col-md-2"></div>

       </div>
      </form>
   <?php
   }
   elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="active_category_status")
       {

           $category_id=$_REQUEST['category_id'];
           $obj=new database();
           $result = $obj->active_category_status($category_id);
            if($result)
            {  
               echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Category with ID ('".$category_id."') InActived </p>";
            }
            else
            {
               echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Category with ID ('".$category_id."') Not InActived</p>";
           }
       }
       elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="inactive_category")
      {
         $category_id=$_REQUEST['category_id'];
         $obj=new database();
         $result = $obj->inactive_category($category_id);
          if($result)
          {  
             echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Category with ID ('".$category_id."') Actived </p>";
          }
          else
          {
             echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Category with ID ('".$category_id."') Not Actived</p>";
         }
      }
      elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="update_category")
      {
         $category_id=$_REQUEST['category_id'];
         $obj=new database();
         $result=$obj->get_data_for_update_category($category_id);
         if($result)
         { 
            $row=mysqli_fetch_assoc($result);
        
           ?>
            <h1 class="fw-bold text-center">UPDATE CATEGORY</h1>
             <div class="row p-4 " >
               <div class="col-md-2"></div>
               <div class="col-md-8">
                 <form  method="POST" class="shadow-lg p-4 rounded"  action="database-process.php" enctype="multipart/form-data" >
                    <div class="mb-2">
                      <label for="exampleFormControlInput1" class="form-label">Category Title</label>
                      <input type="hidden" name="category_id" value="<?php echo $row['category_id'] ?>">
                      <input type="text" required='true' value="<?php echo $row['category_title']?>" name="category_title" class="form-control" id="blog_title" id="exampleFormControlInput1" placeholder="Enter blog Title">
                    </div>
                    <div class="mb-2">
                      <label for="exampleFormControlTextarea1" class="form-label">Category Description</label><br>
                      <textarea name="category_description" id="" required='true' class="form-control" rows="3" placeholder="Enter Category Description"><?php echo $row['category_description'] ;?></textarea>
                    </div>

                    <div class="mb-3 mt-5 text-center">
                      <button class="btn btn-success" name="update_catgeory" >Update Category</button>
                    </div>
               </div>
               <div class="col-md-2"></div>
             </div>
            </form>
          <?php
        }         
      }
       elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="delete_category_record")
      {
         $category_id=$_REQUEST['category_id'];
         $obj=new database();
         $result = $obj->delete_category_record($category_id);
          if($result)
          {  
             echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Category Deleted Successfully </p>";
          }
          else
          {
             echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Category Not Deleted Successfully</p>";
         }
      }

      
       elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='show_all_feedback')
       {?>
         <h1 class="h3 mb-2  fw-bold text-center">ALL FEEDBACK SEND BY USERS</h1>
           
           <!-- DataTales Example -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
               </div>
               <div class="card-body">
                   <div class="table-responsive">
                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                               <tr>
                                   <th>Sno</th>
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Feddback</th>
                                   <th>Time</th>
                                   <th>Delete</th>
                               </tr>
                           </thead>
                           <tbody>
                              <?php 

                              $obj=new database();
                              $result = $obj->show_all_feedback();
                              if($result->num_rows)
                              {
                                $sno=1;
                                  while ($row=mysqli_fetch_assoc($result))
                                  {
                                   ?>
                                      <tr>
                                          <td><?php echo $sno?></td>
                                         
                                          <td><?=$row['user_name']?></td>
                                          <td><?=$row['user_email'] ?></td>
                                          <td><?=$row['feedback'] ?></td>
                                          <td><?php echo $row['created_at'] ?></td>
                                          <td><button style="width: 100px;" onclick="delete_feedback(<?php echo $row['feedback_id']?>)" class="btn btn-danger"><i class="fas fa-trash fa-1x text-gray-300"></i>&nbsp;Delete</button></td>

                                       </tr>
                                   <?php
                                   $sno++;
                                  }
                              }
                               ?>
                            </tbody>
                       </table>
                   </div>
               </div>
           </div>
        <?php
      }elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="post_form")
      {?>
         <h1 class="fw-bold text-center">CREATE NEW POST</h1>
          <div class="row p-4 " >
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <form  method="POST" class="shadow-lg p-4 rounded"  action="database-process.php" enctype="multipart/form-data" >
                 <div class="mb-2">
                   <label for="exampleFormControlInput1" class="form-label">Post Title</label>
                   <span class="span"  id="blog_title_msg"></span>
                   <input type="text" required='true' name="post_title" class="form-control" id="blog_title" id="exampleFormControlInput1" placeholder="Enter blog Title">
                 </div>

                  <div class="mb-2">
                    <label for="exampleFormControlTextarea1" class="form-label">Post Summary</label><br>
                    <textarea name="post_summary" id="" required='true' class="form-control" rows="3" placeholder="Enter Post Summary"></textarea>
                  </div>
                  <div class="mb-2">
                    <label for="exampleFormControlTextarea1" class="form-label">Post Description</label><br>
                    <textarea name="post_description" id="" required='true' class="form-control" rows="3" placeholder="Enter Post Description"></textarea>
                  </div>

                  <div class="mb-2">
                    <label for="exampleFormControlTextarea1" class="form-label">Selec Blog</label><br>
                    <select class="form-select" name="blog" aria-label="Default select example">
                            <option selected>--Select Blog for Post--</option>
                      <?php 
                         $obj=new database();
                         $result=$obj->show_blogs();
                         if($result->num_rows)
                         {?>
                          <?php
                            while($row=mysqli_fetch_assoc($result))
                            {?>
                              <option value="<?php echo $row['blog_id'] ?>"><?php echo $row['blog_title'] ?></option>
                              <?php
                            }
                         }
                       ?>
                    </select>
                  </div>
                  <div class="mb-2">
                    <label for="exampleFormControlTextarea1" class="form-label">Select Post Category</label><br>
                      <?php 
                         $obj=new database();
                         $result=$obj->show_categories();
                         if($result->num_rows)
                         {?>
                          <?php
                            while($row=mysqli_fetch_assoc($result))
                            {?>
                              <input type="checkbox" name="category[]" value="<?php echo $row['category_id'] ?>">&nbsp;&nbsp;<?php echo $row['category_title'] ;?>
                              <?php
                            }
                         }
                       ?>
                  </div>
                  
                 <div class="mb-2">
                   <label for="exampleFormControlTextarea1" class="form-label">Post Featured Image</label>
                   <input type="file" required='true' name="post_featured_image" class="form-control"  id="exampleFormControlInput1" placeholder="Blog Per Page">
                 </div>
                 <div class="mb-2">
                   <label for="exampleFormControlTextarea1" class="form-label">Post File Attachment</label>
                   <input type="file" required='true' name="post_attachment[]" multiple class="form-control" id="blog_background_image" id="exampleFormControlInput1" placeholder="Blog Per Page">
                 </div>

                 <div class="mb-3 mt-5 text-center">
                   <button class="btn btn-success" name="create_post" >Publish Post</button>
                 </div>
            </div>
            <div class="col-md-1"></div>

          </div>
         </form>
      <?php
      }
       elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='show_posts')
       {?>
         <h1 class="h3 mb-2  fw-bold text-center">ALL POST</h1>
           
           <!-- DataTales Example -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
               </div>
               <div class="card-body">
                   <div class="table-responsive">
                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                               <tr>
                                   <th>Sno</th>
                                   <th>Blog ID</th>
                                   <th>Post Title</th>
                                   <th>Post Summary</th>
                                   <th>Post Description</th>
                                   <th>Featured Image</th>
                                   <th>Uploaded_Time</th>
                                   <th>Post Status</th>
                                   <th>Comment Allow/Not</th>
                                   <th>View_Details</th>
                                   <th>Update</th>
                                   <th>Delete</th>
                               </tr>
                           </thead>
                           <tbody>
                              <?php 

                              $obj=new database();
                              $result = $obj->show_posts();
                              if($result->num_rows)
                              {
                                $sno=1;
                                  while ($row=mysqli_fetch_assoc($result))
                                  {
                                   ?>
                                      <tr>
                                          <td><?php echo $sno?></td>
                                         
                                          <td><?=$row['blog_id']?></td>
                                          <td><?=$row['post_title'] ?></td>
                                          <td><?php  echo substr($row['post_summary'], 0, 50) ?></td>
                                          <td ><?php echo substr($row['post_description'], 0, 50) ?></td>
                                          <td><img src="<?=$row['featured_image'] ?>" alt="" width="60px"></td>
                                          <td><?php $time=strtotime($row['created_at']); echo date('D-M-Y, h:i a',$time); ?></td>
                                          <td><?php 
                                                if($row['post_status']=='Active')
                                                {?>
                                                  <button class="btn btn-success" onclick="inactive_post(<?php echo $row['post_id']?>)">Active</button>
                                                <?php
                                                }elseif($row['post_status']=='InActive')
                                                {?>
                                                  <button class="btn btn-danger" onclick="active_post(<?php echo $row['post_id']?>)">InActive</button>
                                                <?php
                                                }
                                           ?></td>
                                           <td><?php 
                                                if($row['is_comment_allowed']==1)
                                                {?>
                                                  <button class="btn btn-success" onclick="post_comment_allow(<?php echo $row['post_id']?>)">Allowed</button>
                                                <?php
                                                }elseif($row['is_comment_allowed']==0)
                                                {?>
                                                  <button class="btn btn-danger" onclick="post_comment_not_allow(<?php echo $row['post_id']?>)">Not Allowed</button>
                                                <?php
                                                }
                                           ?></td>
                                          <td>
                                            <button onclick="view_post_details(<?php echo $row['post_id']?>)" class="btn btn-primary"><i class="fas fa-eye fa-1x text-gray-300"></i>&nbsp;View</button></td>
                                          <td>
                                            <button onclick="update_post(<?php echo $row['post_id']?>)" class="btn btn-primary"><i class="fas fa-edit fa-1x text-gray-300"></i>Edit</button></td>
                                          <td><button style="width: 100px;" onclick="delete_post(<?php echo $row['post_id']?>)" class="btn btn-danger"><i class="fas fa-trash fa-1x text-gray-300"></i>&nbsp;Delete</button></td>

                                       </tr>
                                   <?php
                                   $sno++;
                                  }
                              }
                               ?>
                            </tbody>
                       </table>
                   </div>
               </div>
           </div>
        <?php
      }elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="inactive_post")
      {
         $post_id=$_REQUEST['post_id'];
         $obj=new database();
         $result = $obj->inactive_post($post_id);
          if($result)
          {  
             echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Post with ID ('".$post_id."') InActived </p>";
          }
          else
          {
             echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Post with ID ('".$post_id."') Not InActived</p>";
         }
      }
      elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="active_post")
      {
         $post_id=$_REQUEST['post_id'];
         $obj=new database();
         $result = $obj->active_post($post_id);
          if($result)
          {  
             echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Post with ID ('".$post_id."') Actived </p>";
          }
          else
          {
             echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Post with ID ('".$post_id."') Not Actived</p>";
         }
      }

      elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="post_comment_allow")
      {
         $post_id=$_REQUEST['post_id'];
         $obj=new database();
         $result = $obj->post_comment_allow($post_id);
          if($result)
          {  
             echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Post with ID ('".$post_id."') Comment Not Allowed </p>";
          }
          else
          {
             echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Post with ID ('".$post_id."') Comment Not Allowed</p>";
         }
      }
      elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="post_comment_not_allow")
      {
         $post_id=$_REQUEST['post_id'];
         $obj=new database();
         $result = $obj->post_comment_not_allow($post_id);
          if($result)
          {  
             echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Post with ID ('".$post_id."') Comment Allowed </p>";
          }
          else
          {
             echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Post with ID ('".$post_id."') not Updated Allowed</p>";
         }
      }
      elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="delete_post")
      {
         $post_id=$_REQUEST['post_id'];
         $obj=new database();
         $result = $obj->delete_post($post_id);
          if($result)
          { 
            $obj=new database();
            $resultS=$obj->delete_post_category($post_id);
            if($resultS)
            {
              $obj=new database();
              $post_attachment=$obj->delete_post_attchment($post_id);
              if($post_attachment)
              {
                echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Post Deleted Successfully </p>";
              } 
              else
              {
                echo "<p style='color:red;width:500px; padding:16px; background-color:white; font-weight:bold;'>Post Attachment Not Deleted try later Successfully</p>";
              }
            } 
          }
          else
          {
            echo "<p style='color:red;width:500px; padding:16px; background-color:white; font-weight:bold;'>Post Not Deleted try later Successfully</p>";
          }
      }
       elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='view_post_details')
       {?>
         <h1 class="h3 mb-2  fw-bold text-center">PosT All Details</h1>
           
           <!-- DataTales Example -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
               </div>
               <div class="card-body">
                   <div class="table-responsive">
                       <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Post</th>
                            <th>Complete Details</th>
                          </tr>
                        </thead>
                           <tbody>

                              <?php 

                              $post_id=$_REQUEST['post_id'];
                              $obj=new database();
                              $result = $obj->view_post_details($post_id);
                              if($result->num_rows)
                              {
                                $sno=1;
                                $row=mysqli_fetch_assoc($result);
                              }?>
                               <tr>
                                   <th>Sno</th>
                                   <td><?php echo $sno?></td>
                                </tr>
                                <tr>
                                   <th>Post ID</th>
                                   <td><?php echo $row['post_id']?></td>
                                </tr>
                                <tr>
                                   <th>Blog ID</th>
                                   <td><?=$row['blog_id']?></td>
                                </tr>
                                <tr>
                                   <th>Post Title</th>
                                   <td><?=$row['post_title'] ?></td>
                                </tr>
                                <tr>
                                   <th>Post Summary</th>
                                   <td><?php  echo $row['post_summary']; ?></td>
                                </tr>
                                <tr>
                                    <th>Post_Description</th>
                                    <td ><?php echo $row['post_description']; ?></td>
                                </tr>
                                <tr>
                                   <th>Featured_Image</th>
                                   <td><img src="<?=$row['featured_image'] ?>" alt="" width="60px"></td>
                                </tr>
                                <tr>
                                   <th>Time</th>
                                    <td><?php $time=strtotime($row['created_at']); echo date('Y-M-D, h:i a',$time); ?></td>
                                </tr>
                                <?php 

                                   $obj=new database();
                                   $post_category=$obj->select_post_category($post_id);

                                   if($post_category->num_rows)
                                   {
                                    $str="";
                                     while ($post_categories=mysqli_fetch_assoc($post_category)) {

                                         $str.=$post_categories['category_id']." ";
                                      ?>
                                      <?php
                                     }
                                   }

                                 ?>
                                 <?php 
                                 ?>
                                 <tr>
                                    <th>Post Categories</th>
                                     <td>
                                 
                                        
                                         
                                 <?php
                                   $category_array=explode(" ", $str);
                                   $obj=new database();
                                   foreach($category_array as $category_id)
                                   {
                                     $category=$obj->category_fetch($category_id);
                                     if($category)
                                     {
                                       while($fetch=mysqli_fetch_assoc($category))
                                       {?>
                                        <?php echo $fetch['category_title'] ?>
                                        <?php
                                       }
                                     }
                                   }?>
                                   </td>
                                 </tr>

                                   <?php

                                   $obj=new database();
                                   $attachment=$obj->fetch_attachment($post_id);
                                   if($attachment)
                                   {
                                     while($attcment=mysqli_fetch_assoc($attachment))
                                     {?>

                                       <tr>
                                         <th>Attachment</th>
                                         <th>
                                          <?php
                                            if($attcment['post_attachment_title']=="File")
                                            {
                                               $check_file=substr($attcment['post_attachment_path'], -3);
                                               if($check_file=="pdf")
                                               {?>
                                                <img src="../images/pdf.png" style="width: 26px" alt=""><a href="<?php echo $attcment['post_attachment_path'];?>"><?php echo $attcment['post_attachment_path'];?></a> 
                                                <?php

                                               }
                                               elseif($check_file=="doc" || $check_file=="ocx")
                                               {?>
                                                <img src="../images/doc.png" style="width: 26px" alt=""><a href="<?php echo $attcment['post_attachment_path'];?>"><?php echo $attcment['post_attachment_path'];?></a> 
                                                <?php
                                               }

                                               elseif($check_file=="xls" || $check_file=="lsx")
                                               {?>
                                                <img src="../images/xls.png" style="width: 26px" alt=""><a href="<?php echo $attcment['post_attachment_path'];?>"><?php echo $attcment['post_attachment_path'];?></a> 
                                                <?php
                                               }
                                               elseif($check_file=="zip" || $check_file=="rar")
                                               {?>
                                                <img src="../images/zip.jpg" style="width: 26px" alt=""><a href="<?php echo $attcment['post_attachment_path'];?>"><?php echo $attcment['post_attachment_path'];?></a> 
                                                <?php
                                               }

                                              ?>

                                              <?php
                                            }
                                            elseif($attcment['post_attachment_title']=="Image")
                                            {?>
                                              <img src="<?php echo $attcment['post_attachment_path'];?>" style="width: 300px;" alt="Image Not Found">

                                              <?php

                                            }
                                          ?>  
                                          </th>
                                       </tr>

                                      <?php
                                     }
                                   }
                                  ?>

                                <tr>
                                   <th>Post Status</th>
                                   <td><?php 
                                         if($row['post_status']=='Active')
                                         {?>
                                           <button class="btn btn-success" onclick="inactive_post(<?php echo $row['post_id']?>)">Active</button>
                                         <?php
                                         }elseif($row['post_status']=='InActive')
                                         {?>
                                           <button class="btn btn-danger" onclick="active_post(<?php echo $row['post_id']?>)">InActive</button>
                                         <?php
                                         }
                                    ?></td>
                                </tr>

                                <tr>
                                   <th width="200">Comment_Allow/Not</th>
                                   <td><?php 
                                        if($row['is_comment_allowed']==1)
                                        {?>
                                          <button class="btn btn-success" onclick="post_comment_allow(<?php echo $row['post_id']?>)">Allowed</button>
                                        <?php
                                        }elseif($row['is_comment_allowed']==0)
                                        {?>
                                          <button class="btn btn-danger" onclick="post_comment_not_allow(<?php echo $row['post_id']?>)">Not Allowed</button>
                                        <?php
                                        }
                                   ?></td>
                                </tr>
                                <tr>
                                   <th>Update Delete </th>
                                   <td>
                                     <button onclick="update_post(<?php echo $row['post_id']?>)" class="btn btn-primary"><i class="fas fa-edit fa-1x text-gray-300"></i>Edit</button>
                                   <button style="width: 100px;" onclick="delete_post(<?php echo $row['post_id']?>)" class="btn btn-danger"><i class="fas fa-trash fa-1x text-gray-300"></i>&nbsp;Delete</button></td>
                                </tr>
                           </tbody>

                       </table>
                   </div>
               </div>
           </div>
        <?php
      }
      elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="update_post")
      {
          $post_id=$_REQUEST['post_id'];
          $obj=new database();
          $result=$obj->select_post($post_id);

          if($result)
          {
            $row=mysqli_fetch_assoc($result);
        ?>
               <h1 class="fw-bold text-center">UPDATE POST</h1>
                <div class="row p-4 " >
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <form  method="POST" class="shadow-lg p-4 rounded"  action="database-process.php" enctype="multipart/form-data" >
                       <div class="mb-2">
                         <label for="exampleFormControlInput1" class="form-label">Post Title</label>
                         <span class="span"  id="blog_title_msg"></span>
                         <input type="text" required='true' name="post_title" value="<?php echo $row['post_title']?>" class="form-control" id="blog_title" id="exampleFormControlInput1" placeholder="Enter blog Title">
                         <input type="hidden" name="post_id" value="<?php echo $row['post_id'] ?>">
                       </div>

                        <div class="mb-2">
                          <label for="exampleFormControlTextarea1" class="form-label">Post Summary</label><br>
                          <textarea name="post_summary" id="" required='true' class="form-control" rows="3" placeholder="Enter Post Summary"><?php echo $row['post_summary'] ?></textarea>
                        </div>
                        <div class="mb-2">
                          <label for="exampleFormControlTextarea1" class="form-label">Post Description</label><br>
                          <textarea name="post_description" id="" required='true' class="form-control" rows="3" placeholder="Enter Post Description"><?php echo $row['post_description'] ?></textarea>
                        </div>

                        <div class="mb-2">
                          <label for="exampleFormControlTextarea1" class="form-label">Select Post Category</label><br>
                            <?php
                               $obj=new database();
                               $result=$obj->show_categories();

                               if($result)
                               {
                                 while($rows=mysqli_fetch_assoc($result))
                                 {

                                  $reults=$obj->show_post_category($post_id,$rows['category_id']);

                                  ?>
                                    <input type="checkbox" name="category[]" <?php if ($reults) { echo "checked"; } ?> value="<?php echo $rows['category_id']?>">&nbsp;&nbsp;<?php echo $rows['category_title']?>
                                  <?php
                                 }
                               }

                             ?>
                        </div>
                        
                       <div class="mb-2">
                         <label for="exampleFormControlTextarea1" class="form-label">Post Featured Image</label><br>
                        <img src="<?php echo $row['featured_image'] ?>" alt="" style='width: 100px; height: 50px;'>
                         <input type="file"  name="post_featured_image" class="form-control"  id="exampleFormControlInput1" placeholder="Blog Per Page">
                       </div>
                       <p class="pt-1 pb-0">Already File Attached</p>

                       <?php 
                         $sql="SELECT * FROM post_atachment WHERE post_id=".$row['post_id'];
                         $result=mysqli_query($conn,$sql);
                         if($result)
                         {
                           while($attachment=mysqli_fetch_assoc($result)) 
                           {
                             if($attachment['post_attachment_title']=='File')
                             {?>
                              <input type="checkbox" checked name="attachment[]" value="<?=$attachment['post_attachment_path']?>"><a href="">&nbsp;<?php echo substr($attachment['post_attachment_path'],16)?><br><br></a>

                              <?php
                             }
                            elseif($attachment['post_attachment_title']=='Image')
                           {
                             ?>
                              <input type="checkbox" checked name="attachment[]" value="<?=$attachment['post_attachment_path']?>">  <img src="<?php echo $attachment['post_attachment_path']?>" style="width: 150px; height:100px"><br><br>

                              <?php
                            }
                             

                           }
                         }

                        ?>
                  <div class="mb-2">
                         <label for="exampleFormControlTextarea1" class="form-label">Attach New File if you Have</label>
                         <input type="file"  name="post_attachment" multiple class="form-control" id="blog_background_image" id="exampleFormControlInput1" >
                       </div> 

                       <div class="mb-3 mt-5 text-center">
                         <button class="btn btn-success" name="update_post" >Update Post</button>
                       </div>
                  </div>
                  <div class="col-md-1"></div>

                </div>
               </form>
             <?php
            }
    }
    elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="comment")
      {
         $post_id=$_REQUEST['post_id'];
         $user_id=$_REQUEST['user_id'];
         $user_comment=$_REQUEST['user_comment'];
         
         $obj=new database();
         $result=$obj->insert_comment($post_id,$user_id,$user_comment);
         if($result)
         {
            echo "Comment Sent Successfully";
         }
         else
         {
           echo "Comment not Send Successfully try Again Later";
         }
      }
       elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='show_comments')
       {?>
         <h1 class="h3 mb-2  fw-bold text-center">ALL Comments</h1>
           
           <!-- DataTales Example -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
               </div>
               <div class="card-body">
                   <div class="table-responsive">
                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                               <tr>
                                   <th>Sno</th>
                                   <th>Post ID</th>
                                   <th>User ID</th>
                                   <th>Comment</th>
                                   <th>Time</th>
                                   <th>is_Active</th>
                                   <th>Delete</th>
                               </tr>
                           </thead>
                           <tbody>
                              <?php 

                              $obj=new database();
                              $result = $obj->show_comments();
                              if($result->num_rows)
                              {
                                $sno=1;
                                  while ($row=mysqli_fetch_assoc($result))
                                  {
                                   ?>
                                      <tr>
                                          <td><?php echo $sno?></td>
                                         
                                          <td><?=$row['post_id']?></td>
                                          <td><?=$row['user_id'] ?></td>
                                          <td><?=$row['comment_description'] ?></td>
                                          <td><?php $time=strtotime($row['created_at']); echo date('Y-M-D, h:i a',$time); ?></td>

                                          <td>
                                            <?php 
                                          if($row['is_active']=='Active')
                                             { ?>
                                                <button class="btn btn-primary" onclick="active_comment_status(<?php echo $row['post_comment_id']?>)">Active</button><?php
                                             }elseif($row['is_active']=='InActive')
                                             {?>
                                                <button class="btn btn-warning" onclick="inactive_comment_status(<?php echo $row['post_comment_id']?>)">InActive</button>
                                             <?php
                                             }?></td>
                                          
                                          <td><button style="width: 100px;" onclick="delete_comment(<?php echo $row['post_comment_id']?>)" class="btn btn-danger"><i class="fas fa-trash fa-1x text-gray-300"></i>&nbsp;Delete</button></td>
                                           
                                       </tr>
                                   <?php
                                   $sno++;
                                  }
                              }
                               ?>
                            </tbody>
                       </table>
                   </div>
               </div>
           </div>
        <?php
      }
      elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="active_comment_status")
      {
         $post_comment_id=$_REQUEST['post_comment_id'];
         
         $obj=new database();
         $result=$obj->inactive_comments($post_comment_id);
         if($result)
         {?>
            <p style="color:green; font-weight:bold">Comment Status is InActived</p>
          <?php
           
         }
         else
         {?>
            <p style="color:red; font-weight:bold">Comment Status Not InActived</p>

            <?php
         }
      }elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="inactive_comment_status")
      {
          $post_comment_id=$_REQUEST['post_comment_id'];
          
          $obj=new database();
          $result=$obj->active_comments($post_comment_id);
          if($result)
          {?>
             <p style="color:green; font-weight:bold">Comment Status is Actived</p>
           <?php   
          }
          else
          {?>
             <p style="color:red; font-weight:bold">Comment Status Not Actived</p>
               <?php
          }
      }

      elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="delete_comment")
      {
         $post_comment_id=$_REQUEST['post_comment_id'];
         
         $obj=new database();
         $result=$obj->delete_comment($post_comment_id);
         if($result)
         {?>
            <p style="color:green; font-weight:bold">Comment Deleted</p>
          <?php
           
         }
         else
         {?>
            <p style="color:red; font-weight:bold">Comment Not Deleted</p>

            <?php
         }
      }

      elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="update_user_profile")
      { 
        $user_id=$_REQUEST['user_id'];
        $obj=new database();
        $result=$obj->update_user_record($user_id);

        if($result->num_rows)
        {
          
           $row=mysqli_fetch_assoc($result);
        ?>
         
         <div class="row justify-content-center mb-5 " style="margin-top:8%">
           <div class="col-lg-12 col-xl-11">
             <div class="card text-black mb-5 mt-3" style="border-radius: 25px; ">
         <h1 class="fw-bold  text-center mt-3">UPDATE YOUR RECORD</h1>
               <div class="card-body p-md-5">
                 <div class="row justify-content-center">
                   <div class="col-md-10 col-lg-10 col-xl-10 order-2 order-lg-1">
                 
                      
                     <span class='span' id="match_email_msg"></span><br>
                     <span class='span' id="match_password_msg"></span>
                     
                     <form class="mx-1 mx-md-4" method="POST" onsubmit="return update_validation()"  action="database-process.php" enctype="multipart/form-data">

                       <div class="d-flex flex-row align-items-center mb-4">
                         <i class="fas fa-user fa-lg me-3 fa-fw"></i>&nbsp;
                         <div class="form-outline flex-fill mb-0">
                           <span class="span" id="first_name_msg"></span>
                           <input type="text" id="first_name" required="true" name="first_name" value="<?php echo $row['first_name']?>" class="form-control" />
                           <label class="form-label" >First Name</label>
                           <input type="hidden" name="user_id" value="<?php echo $row['user_id']?>" class="form-control" />

                         </div>
                       </div>
                       <div class="d-flex flex-row align-items-center mb-4">
                         <i class="fas fa-user fa-lg me-3 fa-fw"></i>&nbsp;
                         <div class="form-outline flex-fill mb-0">
                           <span id="last_name_msg"></span>
                           <input type="text" required="true"   value="<?php echo $row['last_name']?>" id="last_name" name="last_name" class="form-control" />
                           <label class="form-label" for="form3Example1c">Last Name</label>
                         </div>
                       </div>

                       <div class="d-flex flex-row align-items-center mb-4">
                         <i class="fas fa-user fa-lg me-3 fa-fw"></i>&nbsp;
                         <div class="form-outline flex-fill mb-0">
                           <span id="role_id"></span>
                           <input type="text" required="true"  value="<?php echo $row['role_id']?>" id="role_id" name="role_id" class="form-control" />
                           <label class="form-label" for="form3Example1c">User Role ID</label>
                         </div>
                       </div>

                       <div class="d-flex flex-row align-items-center mb-4">
                         <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>&nbsp;
                         <div class="form-outline flex-fill mb-0">
                           <span class="span" id="email_msg"></span>
                           <input type="email"   required="true" value="<?php echo $row['email']?>" id="email" name="email"  class="form-control" />
                           <label class="form-label" >Email</label>
                         </div>
                       </div>

                      

                       <div class="d-flex flex-row align-items-center mb-4">
                         <i class="fas fa-lock fa-lg me-3 fa-fw"></i>&nbsp;
                         <div class="form-outline flex-fill mb-0">
                           <span class="span" id="password_msg"></span>
                           <input type="text" required="true"  value="<?php echo $row['password']?>" name="password" id="password"   class="form-control" />
                           <label class="form-label" >Password</label>
                         </div>
                       </div>

                       <div class="d-flex flex-row align-items-center mb-4">
                         <img src="../images/user-icon.png" width="30">&nbsp;
                         <div class="form-outline flex-fill mb-0">
                           <span class="span" id="image_msg"></span>
                           <img src="<?php echo substr($row['user_image'],3)?>" alt="" style="height: 150px; width: 150px;">
                           <input type="file" name="file" id="image" accept="image/*"  class="form-control" />
                           <label class="form-label" >Select Profile <span class="span">Maximum Size 1MB</span></label>
                         </div>
                       </div>


                       <div class="d-flex flex-row align-items-center mb-4">
                         <i class="fa-solid fa-lg me-3 fa-location-dot"></i>&nbsp;
                         <div class="form-outline flex-fill mb-0">
                           <span class="span" id="address_msg"></span>
                           <textarea id="address" required="true"  name="address" class="form-control" placeholder="Enter User Address Here"><?php echo $row['address']?></textarea>
                           <label class="form-label" >Address</label>
                         </div>
                       </div>

                          <br>
                       <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                         <button type="submit" name="update_user_profile"  class="btn btn-primary btn-lg" >Update Record</button>
                       </div>
                     </form>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
      <?php

        }
      }elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="change_user_pass")
   {
      $password=$_REQUEST['olpassword'];
      $email=$_REQUEST['email'];
      $obj=new database();
      $result=$obj->forgotpasswor($email);
      if($result->num_rows)
      {
        $row=mysqli_fetch_assoc($result);
        if($password==$row['password'])
        {
          ?>
           <div class="row justify-content-center">
               <div class="col-lg-5">
                   <div class="card shadow-lg border-0 rounded-lg mt-5">
                       <div class="card-header"><h3 class="text-center font-weight-light my-4">Enter New Password</h3></div>
                       <div class="card-body">           
                               <div class="form-floating mb-3">
                                   <input type="password" class="form-control" id="password"  placeholder="**********" />
                                   <label for="password">Password</label>
                               </div> 
                               <div class="form-floating mb-3">
                                   <input type="password" class="form-control" id="cpassword"  placeholder="**********" />

                                   <label for="password">Confirm Password</label>
                                   <input type="hidden" value="<?php echo $_SESSION['user']['email']?>" class="form-control" id="email" />
                               </div>         
                               <div class="d-flex align-items-center justify-content-between mt-4 mb-0 offset-4">
                                    <button class="btn btn-dark"  Value="Set New Password" class="btn btn-info text-white" onclick="set_user_password_check()"><i class="fa fa-check" ></i> Set New Password</button>  
                              </div>
                       </div>
                   </div>
               </div>
           </div>
         <?php
        }else
        {

           ?>
            <div class="row justify-content-center">
                <div class="col-lg-5" style="margin-top: 7%;">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Password Does Not Match</h3></div>

                    </div>
                </div>
            </div>
          <?php
        }
      }
      else
      {?>

        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Enter New Password</h3></div>
                    <div class="card-body">           
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password"  placeholder="**********" />
                                <label for="password">Password</label>
                            </div> 
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="cpassword"  placeholder="**********" />

                                <label for="password">Confirm Password</label>
                                <input type="hidden" value="<?php echo $_SESSION['user']['email']?>" class="form-control" id="email" />
                            </div>         
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0 offset-4">
                                  
                           </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
      }
   }
   elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="set_new_user_password")
   {
      $password=$_REQUEST['password'];
      $email=$_REQUEST['email'];
      $cpassword=$_REQUEST['cpassword'];
      if($password==$cpassword)
      {
        $obj=new database();
        $result=$obj->set_new_password($email,$password);
        if($result)
        {
           echo "<p style='color:green;width:500px; padding:16px; background-color:white; font-weight:bold;'>Your New Password Successfully Set</p>";
        }
        else
        {
            echo "<p style='color:red;width:500px; padding:16px; background-color:white; font-weight:bold;'>Your New Password Not Set Try Again Later</p>";
        }
      }
      else
      {

         ?>
          <div class="row justify-content-center">
              <div class="col-lg-5" style="margin-top: 7%;">
                  <div class="card shadow-lg border-0 rounded-lg mt-5">
                      <div class="card-header"><h3 class="text-center font-weight-light my-4">Password and Confirm Password Does Not Matched</h3></div>
                  </div>
              </div>
          </div>
        <?php
      }
   }
    elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='show_post_attachment')
    {?>
      <h1 class="h3 mb-2  fw-bold text-center">ALL POST ATTACHMENTS</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Post ID</th>
                                <th>Attachment Title</th>
                                <th>Attachment</th>
                                <th>Time</th>
                                <th>Attachment Status</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php 

                           $objs=new database();
                           $result = $objs->show_post_attachments();
                           if($result->num_rows)
                           {
                             $sno=1;
                               while($row=mysqli_fetch_assoc($result))
                               {
                                ?>
                                   <tr>
                                       <td><?php echo $sno?></td>
                                      
                                       <td><?=$row['post_id']?></td>
                                       <td><?=$row['post_attachment_title'] ?></td>
                                       <td>

                                          <?php 

                                              if($row['post_attachment_title']=="Image")
                                              {?>

                                                 <img src="<?php echo $row['post_attachment_path'] ?>" style='width: 100px;'>

                                                <?php
                                              }
                                              if($row['post_attachment_title']=='File')
                                              {?>
                                                <a href=""><?php echo substr($row['post_attachment_path'],16) ?></a>

                                                <?php
                                              }

                                           ?>
                                         
                                       </td>
                                       <td><?php $time=strtotime($row['created_at']); echo date('Y-M-D, h:i a',$time); ?></td>

                                       <td>
                                        <?php

                                         if($row['is_active']=="Active")
                                         {?>
                                             <button class="btn btn-primary" onclick="active_attachment(<?php echo $row['post_atachment_id']?>);">Active</button>
                                          <?php
                                         } 
                                         elseif($row['is_active']=="InActive")
                                         {?>
                                             <button class="btn btn-danger" onclick="inactive_attachment(<?php echo $row['post_atachment_id']?>);">InActive</button>
                                            
                                          <?php

                                         }
                                         ?>
                                         
                                       </td>
                                       
                                       <td><button style="width: 100px;" onclick="delete_attachment(<?php echo $row['post_atachment_id']?>)" class="btn btn-danger"><i class="fas fa-trash fa-1x text-gray-300"></i>&nbsp;Delete</button></td>
                                        
                                    </tr>
                                <?php
                                $sno++;
                               }
                           }
                            ?>
                         </tbody>
                    </table>
                </div>
            </div>
        </div>
     <?php
   }
   elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='active_attachment')
   {

     $post_attachment_id=$_REQUEST['post_attachment_id'];
      $obj=new database();
      $result=$obj->inactive_post_attachment($post_attachment_id);
      if($result) 
     {?>
        <p style="color:green; font-weight:bold">Post Attachment Status is InActived</p>
      <?php       
      }
     else
     {?>
        <p style="color:red; font-weight:bold">Post Attachment Status Not InActived</p>
        <?php
     }
   }

    elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='inactive_attachment')
   {

     $post_attachment_id=$_REQUEST['post_attachment_id'];
      $obj=new database();
      $result=$obj->active_post_attachment($post_attachment_id);
      if($result) 
     {?>
        <p style="color:green; font-weight:bold">Post Attachment Status is Actived</p>
      <?php       
      }
     else
     {?>
        <p style="color:red; font-weight:bold">Post Attachment Status Not Actived</p>
        <?php
     }
    }

     elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='delete_attachment')
    {

      $post_attachment_id=$_REQUEST['post_attachment_id'];
       $obj=new database();
       $result=$obj->delete_attachment($post_attachment_id);
       if($result) 
      {?>
         <p style="color:green; font-weight:bold">Post Attachment Status is Actived</p>
       <?php       
       }
      else
      {?>
         <p style="color:red; font-weight:bold">Post Attachment Status Not Actived</p>
         <?php
      }
     }
    elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='show_title_setting_form')
    {
      ?>

      <h1 class="mt-3 mb-4" >POST TITLE SETTING</h1>
      <form action="" method="POST" class="shadow-lg p-3">
        <table class="table table-bordered text-center">
          <tr>
            <th>
              <label for="" class="fw-bold">Pick Color For Post Title</label><br>
            </th>
            <td>
              <input type="color" name="title_color">
            </td>
          </tr>
          <tr>
            <th>
              <label for="" class="fw-bold">Select Text Align</label>
            </th>
            <td>
              <input type="checkbox" name="align[]" checked value="Left">Left
              <input type="checkbox" name="align[]" value="right">Right
              <input type="checkbox" name="align[]" value="center">Center 
            </td>
          </tr>
          <tr>
            <th>
              <label for="" class="fw-bold">Select Font Style</label>
            </th>
            <td>
              <input type="checkbox" name="font_style[]"  value="italic">Italic
              <input type="checkbox" name="font_style[]" checked value="normal">Normal <br>
            </td>
          </tr>
          <tr>
            <th>
              <label for="" class="fw-bold">Enter Font size</label>
            </th>
            <td>
              <input type="text" name="font_size" value="18" class="form-control" placeholder="Enter Font Size">
            </td>
          </tr>
          <tr>
            <th>
              <label for="" class="fw-bold">Select Font Family</label>
            </th>
            <td>
              <select name="font_family" id="" class="form-control">
                <option value="Arial">Arial</option>
                <option value="Times New Roman">Times New Roman</option>
                <option value="Elephant">Elephant</option>
                <option value="Arial Black">Arial Black</option>
                <option value="Verdana">Verdana</option>
              </select>
            </td>
          </tr>
        </table>

        <button class="btn btn-success" name="title_setting">Set Setting</button>
        
      </form>
      <?php
    }


     elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='show_bg_setting_form')
    {
      ?>

      <h1 class="mt-3 mb-4" >POST Background SETTING</h1>
      <form action="" method="POST" class="shadow-lg p-3">
        <table class="table table-bordered text-center">
          <tr>
            <th>
              <label for="" class="fw-bold">Pick Color For Post Background</label><br>
            </th>
            <td>
              <input type="color" name="bg_color">
            </td>
          </tr>
        </table>
        
        <button class="btn btn-success" name="background_setting">Set Setting</button>
        
      </form>
      <?php
    }
    elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='show_summary_setting_form')
    {
      ?>

      <h1 class="mt-3 mb-4" >POST SUMMARY SETTING</h1>
      <form action="" method="POST" class="shadow-lg p-3">
        <table class="table table-bordered">
          <tr>
            <th>
             <label for="" class="fw-bold">Pick Color For Post Summary</label><br>
            </th>
            <td>
              <input type="color" name="color">
            </td>
          </tr>
          <tr>
            <th>
            <label for="" class="fw-bold">Select Font Style</label>
            </th>
            <td>
              <input type="checkbox" name="font_style[]"  value="italic">Italic
              <input type="checkbox" name="font_style[]" checked value="normal">Normal <br>
            </td>
          </tr>
          <tr>
            <th>
              <label for="" class="fw-bold">Enter Font size</label>
            </th>
            <td>
                <input type="text" name="font_size" value="18" class="form-control" placeholder="Enter Font Size">
            </td>
          </tr>
          <tr>
            <th>
              <label for="" class="fw-bold">Select Font Family</label>
            </th>
            <td>
              <select name="font_family" id="" class="form-control">
                <option value="Arial">Arial</option>
                <option value="Times New Roman">Times New Roman</option>
                <option value="Elephant">Elephant</option>
                <option value="Arial Black">Arial Black</option>
                <option value="Verdana">Verdana</option>
              </select>
            </td>
          </tr>
        </table>
        <button class="btn btn-success" name="summary_setting">Set Setting</button>
        
      </form>
      <?php
    }
    elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='show_description_setting_form')
    {
      ?>

      <h1 class="mt-3 mb-4" >POST Description SETTING</h1>
      <form action="" method="POST" class="shadow-lg p-3">
        <table class="table table-bordered">
          <tr>
              <th>
               Pick Color For Post Description
              </th>
             <td>
              <input type="color" name="color">
            </td>
          </tr>
          <tr>
            <th >
              Select Font Style
            </th>
            <td>
              <input type="checkbox" name="font_style[]"  value="italic">Italic
              <input type="checkbox" name="font_style[]" checked value="normal">Normal <br>
            </td>
          </tr>
          <tr>
            <th>
              Enter Font size
            </th>
            <td>
                <input type="text" name="font_size" value="18" class="form-control" placeholder="Enter Font Size">
            </td>
          </tr>
          <tr>
            <th>
              Select Font Famil
            </th>
            <td  width="50%">
              <select name="font_family" id="" class="form-control">
                <option value="Arial">Arial</option>
                <option value="Times New Roman">Times New Roman</option>
                <option value="Elephant">Elephant</option>
                <option value="Arial Black">Arial Black</option>
                <option value="Verdana">Verdana</option>
              </select>
              
            </td>
          </tr>
        </table>
        <br>
        
        <button class="btn btn-success" name="description_setting">Set Setting</button>
        
      </form>
      <?php
    }
    elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='add_follower')
    {
      $user_id=$_REQUEST['user_id'];
      $blog_id=$_REQUEST['blog_id'];

      $obj=new database();
      $result=$obj->add_follower($user_id,$blog_id);
      if($result)
      {
        echo "Follower_inserted";
      }
      else
      {
        echo "Follower not inserted";

      }
    }

    elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='delete_follower')
    {
      $user_id=$_REQUEST['user_id'];

      $sql="DELETE FROM user_blog_following WHERE follower_id=".$user_id;
      $result=mysqli_query($conn,$sql);
      if($result)
      {
        echo "Follower Deleted";
      }
      else
      {
        echo "Follower not Deleted";

      }
    }


 ?>