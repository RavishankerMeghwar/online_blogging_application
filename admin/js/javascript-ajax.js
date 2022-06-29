          
        function add_new_user()
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
                xhr.open("GET",'ajax-process.php?action=show_add_user_form',true);
                xhr.onreadystatechange=function()
               {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                        document.getElementById('show-data').innerHTML=xhr.responseText;

                    }
                }
                xhr.send();
            }

            function show_all_user_information()
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
                xhr.open("GET",'ajax-process.php?action=show_all_user_information',true);
                xhr.onreadystatechange=function()
               {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                    $(document).ready(function() {
                           $('#dataTable').DataTable();
                         });
                        document.getElementById('show-data').innerHTML=xhr.responseText; 

                    }
                }
                xhr.send();
            }

            function reject(user_id)
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
                    xhr.open("GET",'ajax-process.php?action=reject&user_id='+user_id,true);
                   xhr.onreadystatechange=function() {
                         if(xhr.readyState==4 && xhr.status==200)
                        {
                              document.getElementById('show_msg').innerHTML=xhr.responseText;
                              show_all_user_information();
                         }
                    }
                   xhr.send();    
            }
            function approved(user_id)
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
                    xhr.open("GET",'ajax-process.php?action=approve&user_id='+user_id,true);
                   xhr.onreadystatechange=function() {
                         if(xhr.readyState==4 && xhr.status==200)
                        {
                              document.getElementById('show_msg').innerHTML=xhr.responseText;
                              show_all_user_information();
                         }
                    }
                   xhr.send();    
            }
            function active(user_id)
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
                    xhr.open("GET",'ajax-process.php?action=active&user_id='+user_id,true);
                   xhr.onreadystatechange=function() {
                         if(xhr.readyState==4 && xhr.status==200)
                        {
                              document.getElementById('show_msg').innerHTML=xhr.responseText;
                              show_all_user_information();
                         }
                    }
                   xhr.send();    
            }
            function inactive(user_id)
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
                    xhr.open("GET",'ajax-process.php?action=inactive&user_id='+user_id,true);
                   xhr.onreadystatechange=function() {
                         if(xhr.readyState==4 && xhr.status==200)
                        {
                              document.getElementById('show_msg').innerHTML=xhr.responseText;
                              show_all_user_information();
                         }
                    }
                   xhr.send();    
            }
            
            

            function pending_users_request()
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
                xhr.open("GET",'ajax-process.php?action=pending_request',true);
                xhr.onreadystatechange=function()
               {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                       $(document).ready(function() {
                           $('#dataTable').DataTable();
                         });
                        document.getElementById('show-data').innerHTML=xhr.responseText; 

                    }
                }
                xhr.send();
            }

            function inactive_users_records()
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
                xhr.open("GET",'ajax-process.php?action=inactive_users_records',true);
                xhr.onreadystatechange=function()
               {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                    $(document).ready(function() {
                           $('#dataTable').DataTable();
                         });
                        document.getElementById('show-data').innerHTML=xhr.responseText; 

                    }
                }
                xhr.send();
            }
            function update_user_data(user_id)
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
                xhr.open("GET",'ajax-process.php?action=update_record&user_id='+user_id,true);
                xhr.onreadystatechange=function()
               {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                        document.getElementById('show-data').innerHTML=xhr.responseText; 

                    }
                }
                xhr.send();
            }

            
            function delete_user_data(user_id)
            {
                var sure=confirm('Do You Want Do Delete Record of ID No '+user_id)
                if(sure)
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
                    xhr.open("GET",'ajax-process.php?action=delete_user_record&user_id='+user_id,true);
                    xhr.onreadystatechange=function()
                   {
                        if(xhr.readyState==4 && xhr.status==200)
                       {
                            document.getElementById('show_msg').innerHTML=xhr.responseText;
                            show_all_user_information();
                            
                        }
                    }
                    xhr.send();
                }
                else
                {
                    show_all_user_information();
                }
            }
        
            function show_all_feedback()
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
                xhr.open("GET",'ajax-process.php?action=show_all_feedback',true);
                xhr.onreadystatechange=function()
               {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                        $(document).ready(function() {
                            $('#dataTable').DataTable();
                          });
                        document.getElementById('show-data').innerHTML=xhr.responseText;   
                    }
                }
                xhr.send();
            }
            function delete_feedback(feedback_id)
            {
               var sure=confirm('Do You Want to Delete Feedback Record Which ID is '+feedback_id)
               if(sure)
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
                      xhr.open("GET",'ajax-process.php?action=delete_feedback&feedback_id='+feedback_id,true);
                      xhr.onreadystatechange=function()
                     {
                          if(xhr.readyState==4 && xhr.status==200)
                         {
                              document.getElementById('show-data').innerHTML=xhr.responseText; 
                              show_all_feedback();  
                          }
                      }
                      xhr.send();
                 }
                 else
                 {
                     show_all_feedback();
                 }
             }
              function update_feedback(feedback_id)
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
                 xhr.open("GET",'ajax-process.php?action=update_feedback&feedback_id='+feedback_id,true);
                 xhr.onreadystatechange=function()
                {
                     if(xhr.readyState==4 && xhr.status==200)
                    {
                        document.getElementById('show-data').innerHTML=xhr.responseText; 
                          
                     }
                 }
                 xhr.send();
             }
             
            function view_profile(user_id)
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
                xhr.open("GET",'ajax-process.php?action=view_profile&user_id='+user_id,true);
                xhr.onreadystatechange=function()
               {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                    $(document).ready(function() {
                           $('#dataTable').DataTable();
                         });
                        document.getElementById('show-data').innerHTML=xhr.responseText; 
                    }
                }
                xhr.send();
            }
            function update_admin_profile(user_id)
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
                xhr.open("GET",'ajax-process.php?action=update_admin_profile&user_id='+user_id,true);
                xhr.onreadystatechange=function()
               {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                    $(document).ready(function() {
                           $('#dataTable').DataTable();
                         });
                        document.getElementById('show-data').innerHTML=xhr.responseText; 
                    }
                }
                xhr.send();
            }
            function delete_admin_data(user_id)
            {
                var sure=confirm('Do You Want Do Delete Record of ID No '+user_id)
                if(sure)
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
                    xhr.open("GET",'ajax-process.php?action=delete_admin_record&user_id='+user_id,true);
                    xhr.onreadystatechange=function()
                   {
                        if(xhr.readyState==4 && xhr.status==200)
                       {
                            document.getElementById('show_msg').innerHTML=xhr.responseText;
                            show_all_admin_information();
                            
                        }
                    }
                    xhr.send();
                }
                else
                {
                    show_all_admin_information();
                }
            }


            function change_password_form()
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
                    xhr.open("GET",'ajax-process.php?action=change_password_form',true);
                   xhr.onreadystatechange=function() {
                         if(xhr.readyState==4 && xhr.status==200)
                        {
                              document.getElementById('show-data').innerHTML=xhr.responseText;
                              
                         }
                    }
                   xhr.send();    
            }
            function change_pass()
            {
                var password=document.getElementById('olpassword').value;
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
                    xhr.open("GET",'ajax-process.php?action=change_pass&olpassword='+password+'&email='+email,true);
                   xhr.onreadystatechange=function() {
                         if(xhr.readyState==4 && xhr.status==200)
                        {
                              document.getElementById('show-data').innerHTML=xhr.responseText;
                              
                         }
                    }
                   xhr.send();    
            }

            function set_password_check()
            {
                  var password=document.getElementById('password').value;
                  var cpassword=document.getElementById('cpassword').value;
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
                    xhr.open("GET",'ajax-process.php?action=set_new_password&email='+email+'&password='+password+'&cpassword='+cpassword,true);
                     xhr.onreadystatechange=function() {
                           if(xhr.readyState==4 && xhr.status==200)
                          {
                              document.getElementById('show_msg').innerHTML=xhr.responseText;
                              show_all_admin_information($user_id);  
                           }
                      }
                     xhr.send();     
            }


            function change_profile(user_id)
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
                    xhr.open("GET",'ajax-process.php?action=admin_image&user_id='+user_id,true);
                    xhr.onreadystatechange=function()
                   {
                        if(xhr.readyState==4 && xhr.status==200)
                       {
                            document.getElementById('show-data').innerHTML=xhr.responseText;              
                        }
                    }
                     xhr.send(); 
            }
            function add_new_blog()
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
                xhr.open("GET",'ajax-process.php?action=add_blog',true);
                xhr.onreadystatechange=function()
               {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                        document.getElementById('show-data').innerHTML=xhr.responseText;   
                    }
                }
                xhr.send();
            }

            function show_blogs()
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
                xhr.open("GET",'ajax-process.php?action=show_blogs',true);
                xhr.onreadystatechange=function()
               {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                    $(document).ready(function() {
                           $('#dataTable').DataTable();
                         });
                        document.getElementById('show-data').innerHTML=xhr.responseText; 

                    }
                }
                xhr.send();
            }

            function active_blog_status(blog_id)
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
                    xhr.open("GET",'ajax-process.php?action=active_blog&blog_id='+blog_id,true);
                   xhr.onreadystatechange=function() {
                         if(xhr.readyState==4 && xhr.status==200)
                        {
                              show_blogs();
                              document.getElementById('show_msg').innerHTML=xhr.responseText;
                               

                         }
                    }
                   xhr.send();    
            }
           
            function  inactive_blog(blog_id)
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
                    xhr.open("GET",'ajax-process.php?action=inactive_blog&blog_id='+blog_id,true);
                   xhr.onreadystatechange=function() {
                         if(xhr.readyState==4 && xhr.status==200)
                        {
                              show_blogs();
                              document.getElementById('show_msg').innerHTML=xhr.responseText;
                               

                         }
                    }
                   xhr.send();    
            }

            function update_blog(blog_id)
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
                    xhr.open("GET",'ajax-process.php?action=update_blog&blog_id='+blog_id,true);
                   xhr.onreadystatechange=function() {
                         if(xhr.readyState==4 && xhr.status==200)
                        {
                           document.getElementById('show-data').innerHTML=xhr.responseText;
                         }
                    }
                   xhr.send();    
            }
            function delete_blog_data(blog_id)
            {
                var sure=confirm('Do You Want Do Delete Blog of ID No '+blog_id)
                if(sure)
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
                    xhr.open("GET",'ajax-process.php?action=delete_blog&blog_id='+blog_id,true);
                    xhr.onreadystatechange=function()
                   {
                        if(xhr.readyState==4 && xhr.status==200)
                       {
                            document.getElementById('show_msg').innerHTML=xhr.responseText;
                            show_blogs();
                            
                        }
                    }
                    xhr.send();
                }
                else
                {
                   show_blog();
                }
            }

            function category_form()
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
                xhr.open("GET",'ajax-process.php?action=category_form',true);
                xhr.onreadystatechange=function()
               {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                    $(document).ready(function() {
                           $('#dataTable').DataTable();
                         });
                        document.getElementById('show-data').innerHTML=xhr.responseText; 

                    }
                }
                xhr.send();
            }
            function show_categories()
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
                xhr.open("GET",'ajax-process.php?action=show_categories',true);
                xhr.onreadystatechange=function()
               {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                    $(document).ready(function() {
                           $('#dataTable').DataTable();
                         });
                        document.getElementById('show-data').innerHTML=xhr.responseText; 

                    }
                }
                xhr.send();
            }
            function active_category_status(category_id)
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
                    xhr.open("GET",'ajax-process.php?action=active_category_status&category_id='+category_id,true);
                   xhr.onreadystatechange=function() {
                         if(xhr.readyState==4 && xhr.status==200)
                        {
                              show_categories();
                              document.getElementById('show_msg').innerHTML=xhr.responseText;
                               

                         }
                    }
                   xhr.send();    
            }

            function inactive_category(category_id)
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
                    xhr.open("GET",'ajax-process.php?action=inactive_category&category_id='+category_id,true);
                   xhr.onreadystatechange=function() {
                         if(xhr.readyState==4 && xhr.status==200)
                        {
                              show_categories();
                              document.getElementById('show_msg').innerHTML=xhr.responseText;
                               

                         }
                    }
                   xhr.send();    
            }
            function update_category(category_id)
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
                    xhr.open("GET",'ajax-process.php?action=update_category&category_id='+category_id,true);
                   xhr.onreadystatechange=function() {
                         if(xhr.readyState==4 && xhr.status==200)
                        {
                           document.getElementById('show-data').innerHTML=xhr.responseText;
                         }
                    }
                   xhr.send();    
            }

        function delete_category_record(category_id)
        {
            var sure=confirm('Do You Want Do Delete Blog of ID No '+category_id)
            if(sure)
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
                xhr.open("GET",'ajax-process.php?action=delete_category_record&category_id='+category_id,true);
                xhr.onreadystatechange=function()
               {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                        document.getElementById('show_msg').innerHTML=xhr.responseText;
                        show_categories();
                        
                    }
                }
                xhr.send();
            }
            else
            {
               show_categories();
            }
        }
        function post_form()
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
            xhr.open("GET",'ajax-process.php?action=post_form',true);
            xhr.onreadystatechange=function()
           {
                if(xhr.readyState==4 && xhr.status==200)
               {
                    document.getElementById('show-data').innerHTML=xhr.responseText;
                }
            }
            xhr.send();
        }
        function show_posts()
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
            xhr.open("GET",'ajax-process.php?action=show_posts',true);
            xhr.onreadystatechange=function()
           {
                if(xhr.readyState==4 && xhr.status==200)
               {
                    $(document).ready(function() {
                           $('#dataTable').DataTable();
                         });
                    document.getElementById('show-data').innerHTML=xhr.responseText;
                }
            }
            xhr.send();
        }
        function inactive_post(post_id)
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
                xhr.open("GET",'ajax-process.php?action=inactive_post&post_id='+post_id,true);
               xhr.onreadystatechange=function() {
                     if(xhr.readyState==4 && xhr.status==200)
                    {
                          show_posts();
                          document.getElementById('show_msg').innerHTML=xhr.responseText;
                           

                     }
                }
               xhr.send();    
        }

        function active_post(post_id)
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
                xhr.open("GET",'ajax-process.php?action=active_post&post_id='+post_id,true);
               xhr.onreadystatechange=function() {
                     if(xhr.readyState==4 && xhr.status==200)
                    {
                          show_posts();
                          document.getElementById('show_msg').innerHTML=xhr.responseText;
                    }
                }
               xhr.send();    
        }

        function post_comment_allow(post_id)
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
                xhr.open("GET",'ajax-process.php?action=post_comment_allow&post_id='+post_id,true);
               xhr.onreadystatechange=function() {
                     if(xhr.readyState==4 && xhr.status==200)
                    {
                          show_posts();
                          document.getElementById('show_msg').innerHTML=xhr.responseText;
                    }
                }
               xhr.send();    
        }
        function post_comment_not_allow(post_id)
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
                xhr.open("GET",'ajax-process.php?action=post_comment_not_allow&post_id='+post_id,true);
               xhr.onreadystatechange=function() {
                     if(xhr.readyState==4 && xhr.status==200)
                    {
                          show_posts();
                          document.getElementById('show_msg').innerHTML=xhr.responseText;
                    }
                }
               xhr.send();    
        }
        function delete_post(post_id)
        {
           var sure=confirm('Do You Want Do Delete Post of ID No '+post_id)
            if(sure)
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
                xhr.open("GET",'ajax-process.php?action=delete_post&post_id='+post_id,true);
                xhr.onreadystatechange=function()
               {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                        document.getElementById('show_msg').innerHTML=xhr.responseText;
                        show_posts();
                        
                    }
                }
                xhr.send();
            }
            else
            {
               show_posts();
            }
        }

        function view_post_details(post_id)
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
                xhr.open("GET",'ajax-process.php?action=view_post_details&post_id='+post_id,true);
                xhr.onreadystatechange=function() {
                    if(xhr.readyState==4 && xhr.status==200)
                   {

                        document.getElementById('show-data').innerHTML=xhr.responseText;
                    }
                }
               xhr.send();
        }

        function update_post(post_id)
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
                xhr.open("GET",'ajax-process.php?action=update_post&post_id='+post_id,true);
                xhr.onreadystatechange=function() {
                    if(xhr.readyState==4 && xhr.status==200)
                   {
                        document.getElementById('show-data').innerHTML=xhr.responseText;
                    }
                }
               xhr.send();
        }
        function show_comments()
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
            xhr.open("GET",'ajax-process.php?action=show_comments',true);
            xhr.onreadystatechange=function()
           {
                if(xhr.readyState==4 && xhr.status==200)
               {
                $(document).ready(function() {
                       $('#dataTable').DataTable();
                     });
                    document.getElementById('show-data').innerHTML=xhr.responseText; 

                }
            }
            xhr.send();
        }

            function active_comment_status(post_comment_id)
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
                    xhr.open("GET",'ajax-process.php?action=active_comment_status&post_comment_id='+post_comment_id,true);
                    xhr.onreadystatechange=function()
                   {
                        if(xhr.readyState==4 && xhr.status==200)
                       {
                    
                            document.getElementById('show_msg').innerHTML=xhr.responseText; 
                            show_comments();

                        }
                    }
                    xhr.send();
                }

            function inactive_comment_status(post_comment_id)
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
                xhr.open("GET",'ajax-process.php?action=inactive_comment_status&post_comment_id='+post_comment_id,true);
                    xhr.onreadystatechange=function()
                   {
                        if(xhr.readyState==4 && xhr.status==200)
                       {
                    
                            document.getElementById('show_msg').innerHTML=xhr.responseText; 
                            show_comments();

                        }
                    }
                    xhr.send();
                }

            function delete_comment(post_comment_id)
            {
               var sure=confirm('Do You Want Do Delete Comment of ID No '+post_comment_id)
               if(sure)
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
                    xhr.open("GET",'ajax-process.php?action=delete_comment&post_comment_id='+post_comment_id,true);
                        xhr.onreadystatechange=function()
                       {
                            if(xhr.readyState==4 && xhr.status==200)
                           {
                        
                                document.getElementById('show_msg').innerHTML=xhr.responseText; 
                                show_comments();

                            }
                        }
                        xhr.send();
                }
                else
                {
                    show_comments();
                }
            }

        function show_post_attachment()
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
             xhr.open("GET",'ajax-process.php?action=show_post_attachment',true);
             xhr.onreadystatechange=function()
            {
                 if(xhr.readyState==4 && xhr.status==200)
                {
                 $(document).ready(function() {
                        $('#dataTable').DataTable();
                      });
                     document.getElementById('show-data').innerHTML=xhr.responseText; 

                 }
             }
             xhr.send();

        }
        function active_attachment(post_attachment_id)
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
             xhr.open("GET",'ajax-process.php?action=active_attachment&post_attachment_id='+post_attachment_id,true);
             xhr.onreadystatechange=function()
            {
                 if(xhr.readyState==4 && xhr.status==200)
                {
                    // alert(xhr.responseText);
                     document.getElementById('show_msg').innerHTML=xhr.responseText; 
                     show_post_attachment();

                 }
             }
             xhr.send();

        }

        function inactive_attachment(post_attachment_id)
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
             xhr.open("GET",'ajax-process.php?action=inactive_attachment&post_attachment_id='+post_attachment_id,true);
             xhr.onreadystatechange=function()
            {
                 if(xhr.readyState==4 && xhr.status==200)
                {
                    // alert(xhr.responseText);
                     document.getElementById('show_msg').innerHTML=xhr.responseText; 
                     show_post_attachment();

                 }
             }
             xhr.send();
        }
        function delete_attachment(post_attachment_id)
        {
           var sure=confirm('Do You Want Do Delete Attachment of ID No '+post_attachment_id)
           if(sure)
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
                xhr.open("GET",'ajax-process.php?action=delete_attachment&post_attachment_id='+post_attachment_id,true);
                    xhr.onreadystatechange=function()
                   {
                        if(xhr.readyState==4 && xhr.status==200)
                       {
                    
                            document.getElementById('show_msg').innerHTML=xhr.responseText; 
                            show_post_attachment();

                        }
                    }
                    xhr.send();
            }
            else
            {
                show_post_attachment();
            }
        }





