
     function registration()
      {


          var pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
          var letters = /^[A-Za-z]+$/;
          var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          var regmob = /^[1-9]\d{9}$/;
          var regdate = /^\d{2}([./-])\d{2}\1\d{4}$/;
         
          if(document.getElementById("name").value =='')
          {
            name.style.border="3px solid red";
            document.getElementById("demo").innerHTML = 'Please enter your name';
              return false;
          }
          else if(!letters.test(document.getElementById("name").value))
          {  name.style.border="3px solid red";
            document.getElementById("demo").innerHTML = 'Name field required only alphabet characters';
              return false;
          }
          else{
            name.style.border="3px solid green";
          }
         
          if(document.getElementById("address").value=='')
          {
            address.style.border="3px solid red";
            document.getElementById("demo").innerHTML = 'Please enter your address';
              return false;

          }
          else{
            address.style.border="3px solid green";
          }
         
              
         if(document.getElementById("email").value=='')
          {
            email.style.border="3px solid red";
            document.getElementById("demo").innerHTML = 'Please enter your user email id';
              return false;

          }
          else if (!filter.test(document.getElementById("email").value))
          {
            email.style.border="3px solid red";
            document.getElementById("demo").innerHTML = 'Invalid email';
              return false;

          }
          else{
            email.style.border="3px solid green";
          }
         
           if(document.getElementById("phone").value=='')
          {
            phone.style.border="3px solid red";
             document.getElementById("demo").innerHTML = 'Please enter the Phone Number';
              return false;

          }
          
          else if (!regmob.test(document.getElementById("phone").value)) 
            {
                phone.style.border="3px solid red";
                document.getElementById("demo").innerHTML = "Please Enter 10 Digit Mobile Number only";
                return false;
            }
            else{
            phone.style.border="3px solid green";
          }
          if(document.getElementById("uname").value=='')
          {
            uname.style.border="3px solid red";
            document.getElementById("demo").innerHTML = 'Please enter the username.';
              return false;

          }
          else if(!letters.test(document.getElementById("uname").value==''))
          { 
            uname.style.border="3px solid red";
            document.getElementById("demo").innerHTML = 'User name field required only alphabet characters';
              return false;

          }
          else if(document.getElementById("uname").value.length < 6)
          {
            uname.style.border="3px solid red";
            document.getElementById("demo").innerHTML = 'Username  minimum length is 6';
              return false;

          }
          else{
            uname.style.border="3px solid green";
          }
          
          if(document.getElementById("pass").value=='')
          {
            pass.style.border="3px solid red";
            document.getElementById("demo").innerHTML = 'Please enter Password';
              return false;

          }
          else if(!pwd_expression.test(document.getElementById("pass").value))
          {
            pass.style.border="3px solid red";
            document.getElementById("demo").innerHTML = 'Upper case, Lower case, Special character and <br>Numeric letter are required in Password filed';
              return false;

          }
         
          else if(document.getElementById("pass").value.length < 6)
          {
            pass.style.border="3px solid red";
            document.getElementById("demo").innerHTML = 'Password minimum length is 6';
              return false;

          }
          else{
            pass.style.border="3px solid green";
          }

         if(document.getElementById("cpass").value=='')
          {
            cpass.style.border="3px solid red";
            document.getElementById("demo").innerHTML = 'Enter Confirm Password';
              return false;

          }
         
          else if(document.getElementById("cpass").value.length > 12)
          {
            cpass.style.border="3px solid red";
            document.getElementById("demo").innerHTML = 'Password max length is 12';
              return false;

          }
          else if(document.getElementById("pass").value != document.getElementById("cpass").value)
          {
            cpass.style.border="3px solid red";
            document.getElementById("demo").innerHTML = 'Password not Matched';
              return false;

          }
          else
          {		
            cpass.style.border="3px solid green";		                            
            document.getElementById("demo").innerHTML = 'Thank You for registering';
               return true;
          }
      }
      
       