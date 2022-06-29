   function validation()
   {
 
      var validate=true;
      var name=/^[a-zA-Z]{3,15}$/
      var email_pattern=/^[\w]{3,20}[@][a-z]{5,}[.]com|org|pk$/;
      var address_pattern=/^[\w\W\s]{10,150}$/
      var password_pattern=/^[a-zA-Z0-9]{4,}[\W]$/

      var first_name=document.getElementById('first_name').value;
      var last_name=document.getElementById('last_name').value;
      var email=document.getElementById('email').value;
      var confirm_email=document.getElementById('confirm_email').value;
      var password=document.getElementById('password').value;
      var confirm_password=document.getElementById('confirm_password').value;
      var gender=document.getElementById('gender').value;
      var date_of_brith=document.getElementById('date').value;
      var address=document.getElementById('address').value;
      var image=document.getElementById('image');


      if(first_name=="")
     {
        document.getElementById("first_name_msg").innerHTML="Please Enter  First Name"
        validate=false;           
      }
      else{  
          if(!name.test(first_name))
         {
            document.getElementById("first_name_msg").innerHTML="Invalid Name First name only contain Alphabets 3-15";
            validate=false;
          }
          else{
                document.getElementById("first_name_msg").innerHTML="";
            }
      }

      if(last_name!="")
     {
        if(!name.test(last_name))
        {
            document.getElementById("last_name_msg").innerHTML="Invalid Last Name Last name only contain Alphabets 3-15";
             validate=false;
        }else{
              document.getElementById("last_name_msg").innerHTML="";   
        }
      }

      if(email=="")
     {
        document.getElementById("email_msg").innerHTML="Please Enter  Email"
           validate=false;
      }
      else
      {
        if(!email_pattern.test(email))
        {
          document.getElementById("email_msg").innerHTML="Invalid Email Should be like abcd@gmail.com";
           validate=false;
        }
        else
        {
          document.getElementById("email_msg").innerHTML="";
        }
      }

       if(confirm_email=="")
      {
          document.getElementById("confirm_email_msg").innerHTML="Please Enter Confirm Email"
          validate=false;
       }
       else
       {
          document.getElementById("confirm_email_msg").innerHTML="";
       }

     if(password=="")
     {
        document.getElementById("password_msg").innerHTML="Please Enter  Password ";
        validate=false;
      }
      else
     {
         if(password.length > 7)
         {

            if(!password_pattern.test(password))
           {
              document.getElementById("password_msg").innerHTML="Invalid Password Should container alphabets number specilal character";
              validate=false;
            }
           else
           {
              document.getElementById("password_msg").innerHTML="";
            }
         }
         else
         {
            document.getElementById("password_msg").innerHTML="Password Should Be Minimum 8 character";
              validate=false;
         }
      }

      if(confirm_password=="")
      {
         document.getElementById("confirm_password_msg").innerHTML="Please Enter Confirm Password"
         validate=false;
      }
      else
     {
         document.getElementById("confirm_password_msg").innerHTML=""      
      }
      
     if(address=="")
     {
        document.getElementById("address_msg").innerHTML="Please Enter Address "
        validate=false;
      }else{
       
         if(!(address.length>=10))
         {
            document.getElementById("address_msg").innerHTML="Invalid Address Should between 10-150 words";
            validate=false;
          }
          if(!address_pattern.test(address))
         {
            document.getElementById("address_msg").innerHTML="Invalid Address Should between 10-150 words";
            validate=false;
         }
         else
        {
            document.getElementById("address_msg").innerHTML="";
         }
      }

      if(date_of_brith=="")
     {
         document.getElementById("dob_msg").innerHTML="Please Select Date of Brith";
         validate=false;
      }else{
         document.getElementById("dob_msg").innerHTML="";
      }

      if(gender=="")
     {
        document.getElementById("gender_msg").innerHTML="Please Select Gender"
        validate=false;
      }else{
         document.getElementById("gender_msg").innerHTML="";    
      }

      if(term.checked==false)
      {
         document.getElementById("term_msg").innerHTML="Please Agree Tick Term Box ";
         validate=false;
       }else{
          document.getElementById("term_msg").innerHTML="";    
       }


      if(image.value=="")
      {
         document.getElementById("image_msg").innerHTML="Please Select Profile Image";
         validate=false;
      }
      else
     {
         document.getElementById("image_msg").innerHTML="";
      }

      if(image.files[0].size>1000000)
      {
         document.getElementById("image_msg").innerHTML="Image Size is Greater Than 1MB";
         validate=false;
      }

      
         if(!validate)
        {
             return false;
         }      
         else if(validate==true)
         {
            if(email!=confirm_email)
            {
               document.getElementById("match_email_msg").innerHTML="Email and Confirm Email Not Matched ";
               validate=false;
            }else{
               document.getElementById("match_email_msg").innerHTML="";    
            }
            if(password!=confirm_password)
            {
               document.getElementById("match_password_msg").innerHTML="Password and Confirm Password Not Matched ";
               validate=false;
            }else{
               document.getElementById("match_password_msg").innerHTML="";    
            }
         } 
      if(!validate)
     {
         return false;
      }      
   }



    function create_blog()
   {
      var validate=true;  
      var blog_title=document.getElementById('blog_title').value;
      var blog_per_page=document.getElementById('blog_per_page').value;
      var blog_background_image=document.getElementById('blog_background_image').value;


      if(blog_title=="")
     {
        document.getElementById("blog_title_msg").innerHTML="Please Enter  Blog Title"
        validate=false;           
      }
      if(blog_per_page=="")
     {
        document.getElementById("blog_per_page_msg").innerHTML="Please Enter  Post Per Page"
        validate=false;           
      }
      if(blog_background_image=="")
     {
        document.getElementById("blog_imge_msg").innerHTML="Please Select Background Blog Image"
        validate=false;           
      }
      if(!validate)
     {
         return false;
      }      
   }

