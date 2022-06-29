   function update_validation()
   {
 
      var validate=true;
      var name=/^[a-zA-Z]{3,15}$/
      var email_pattern=/^[\w]{3,20}[@][a-z]{5,}[.]com|org|pk$/;
      var address_pattern=/^[\w\W\s]{10,150}$/
      var password_pattern=/^[a-zA-Z0-9]{4,}[\W]$/

      var first_name=document.getElementById('first_name').value;
      var last_name=document.getElementById('last_name').value;
      var email=document.getElementById('email').value;
      var password=document.getElementById('password').value;
      var address=document.getElementById('address').value;
     

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

     
     if(password=="")
     {
        document.getElementById("password_msg").innerHTML="Please Enter  Password ";
        validate=false;
      }
      else
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
 
         if(!validate)
        {
             return false;
         }         
   }

 
