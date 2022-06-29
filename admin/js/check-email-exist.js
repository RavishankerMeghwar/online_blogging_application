   
   function check_email_exist()
   {
      var email=document.getElementById('email').value;  
      var xhr=null;
      if(window.XMLHttpRequest)
      {
         xhr=new XMLHttpRequest();
      }
      else
      {
         xhr=new ActiveXObject('Microsoft.XMLHTTP');
      }
        xhr.open("GET",'admin/ajax-process.php?action=check_email_exist&email='+email,true);

        xhr.onreadystatechange=function() {

            if(xhr.readyState==4 && xhr.status==200)
           {
               document.getElementById('email_msg').innerHTML=xhr.responseText;
            }
         }
      xhr.send();

   }

   function forget_password_email()
   {
      var email=document.getElementById('email').value; 
      var xhr=null;
      if(window.XMLHttpRequest)
      {
         xhr=new XMLHttpRequest();
      }
      else
      {
         xhr=new ActiveXObject('Microsoft.XMLHTTP');
      }
        xhr.open("GET",'admin/ajax-process.php?action=forget_password_email&email='+email,true);

        xhr.onreadystatechange=function() {

            if(xhr.readyState==4 && xhr.status==200)
           {
               document.getElementById('email_msg').innerHTML=xhr.responseText;
            }
         }
      xhr.send();

   }
   function check_email_exists()
   {
      var email=document.getElementById('email').value;  
      var xhr=null;
      if(window.XMLHttpRequest)
      {
         xhr=new XMLHttpRequest();
      }
      else
      {
         xhr=new ActiveXObject('Microsoft.XMLHTTP');
      }
        xhr.open("GET",'ajax-process.php?action=check_email_exist&email='+email,true);

        xhr.onreadystatechange=function() {

            if(xhr.readyState==4 && xhr.status==200)
           {
               document.getElementById('email_msg').innerHTML=xhr.responseText;
            }
         }
      xhr.send();

   }
