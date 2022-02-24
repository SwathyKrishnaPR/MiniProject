$(function() {
    
    $("#demo0").hide();
    $("#demo1").hide();
    $("#demo2").hide();
    $("#demo3").hide();
    $("#demo4").hide();
    $("#demo5").hide();
    $("#demo6").hide();
  

    var error_mname = false;
    var error_mlname = false;
    var error_address = false;
    var error_email = false;
    var error_phone = false;
    var error_uname= false;
    var error_pass= false;
    

    $("#mname").focusout(function(){
       check_mname();
    });
    $("#mlname").focusout(function(){
      check_mlname();
   });
    $("#address").focusout(function() {
       check_address();
    });
    $("#email").focusout(function() {
       check_email();
    });
    $("#phone").focusout(function() {
       check_phone();
    });
    $("#uname").focusout(function() {
       check_uname();
    });
    $("#pass").focusout(function() {
       check_pass();
    });
  

    function check_mname() {
      var pattern = /^[a-zA-Z]*$/;
      var mname = $("#name").val();
      if (mname == '') {
         $("#demo0").show();
         $("#demo0").html("Enter First Name");
         $("#mname").css("border","3px solid #F90A0A");
         error_mname = false;
      }
      else if (!pattern.test(mname) ) {
         $("#demo0").show();
         $("#demo0").html("Should contain only Characters");
         $("#mname").css("border","3px solid #F90A0A");
         error_mname = false;
      } else {
         $("#demo0").hide();
         $("#mname").css("border","3px solid green");
      }
   }
   
   function check_mlname() {
      var pattern = /^[a-zA-Z]*$/;
      var mlname = $("#mlname").val();
      if (mlname == '') {
         $("#demo1").show();
         $("#demo1").html("Enter Last Name");
         $("#mlname").css("border","3px solid #F90A0A");
         error_mlname = false;
      }
      else if (!pattern.test(mlname) ) {
         $("#demo1").show();
         $("#demo1").html("Should contain only Characters");
         $("#mlname").css("border","3px solid #F90A0A");
         error_mlname = false;
      } else {
         $("#demo1").hide();
         $("#mlname").css("border","3px solid green");
      }
   }


    function check_address() {
       var address = $("#address").val();
       var address_length = $("#address").val().length;
       if (address == '') {
          $("#demo2").show();
          $("#demo2").html("Enter Address");
          $("#address").css("border","3px solid #F90A0A");
          error_address = false;
       }
       else if (address_length <5 ) {
          $("#demo2").show();
          $("#demo2").html("Contain Atleast 5 Characters");
          $("#address").css("border","3px solid #F90A0A");
          error_address= false;
       }
       else {
          $("#demo2").hide();
          $("#address").css("border","3px solid green");
          
       }
    }

    function check_email() {
       var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
       var email = $("#email").val();
       if (email == '') {
          $("#demo3").show();
          $("#demo3").html("Enter Email");
          $("#email").css("border","3px solid #F90A0A");
          error_email= false;
       }
       else if (!pattern.test(email) ) {
          $("#demo3").show();
          $("#demo3").html("Invalid Email");
          $("#email").css("border","3px solid #F90A0A");
          error_email= false;
       } else {
          $("#demo3").hide();
          $("#email").css("border","3px solid green");
          
       }
    }

    function check_phone() {
     var pattern = /^[1-9]\d{9}$/;
       var phone = $("#phone").val();
       if (phone == '') {
          $("#demo4").show();
          $("#demo4").html("Enter Phone Number");
          $("#phone").css("border","3px solid #F90A0A");
          error_phone = false;
       }
       else if (!pattern.test(phone) ) {
          $("#demo4").show();
          $("#demo4").html("Contain 10 Digit");
          $("#phone").css("border","3px solid #F90A0A");
          error_phone = false;
       } else {
          $("#demo4").hide();
          $("#phone").css("border","3px solid green");
         
       }
    }
 
   
    function check_uname() {
     var letters = /^[A-Za-z]+$/;
     var uname_length = $("#uname").val().length;
       var uname = $("#uname").val();
       if (uname == '') {
          $("#demo5").show();
          $("#demo5").html("Enter Username");
          $("#uname").css("border","3px solid #F90A0A");
          error_uname = false;
       }
       else if (uname_length <6 ) {
          $("#demo5").show();
          $("#demo5").html("Contain Atleast 6 Characters");
          $("#uname").css("border","3px solid #F90A0A");
          error_uname = false;
       } else {
          $("#demo5").hide();
          $("#uname").css("border","3px solid green");
          
       }
    }
    function check_pass() {
       var password_length = $("#pass").val().length;
       var pass= $("#pass").val();
       if (pass== '') {
          $("#demo6").show();
          $("#demo6").html("Enter Password");
          $("#pass").css("border","3px solid #F90A0A");
          error_pass = false;
       }
       else if (password_length < 8) {
          $("#demo6").html("Atleast 8 Characters");
          $("#demo6").show();
          $("#pass").css("border","3px solid #F90A0A");
          error_pass = false;
       } else {
          $("#demo6").hide();
          $("#pass").css("border","3px solid green");
          error_pass = true;
          
       }
    }

  

    

    $("#form").submit(function() {
       error_mname = true;
       error_mlname = true;
       error_address = true;
       error_email = true;
       error_phone = true;
       error_uname = true;
       error_pass = true;
     

       check_mname();
       check_mlname();
       check_address();
       check_email();
       check_phone();
       check_uname();
       check_pass();
      
       if (error_mname === true && error_mlname === true && error_address === true&& error_email === true && error_phone === true && error_uname === true &&  error_pass === true ) {
          
          return true;
       } else {
         
          return false;
       }


    });
 });
 