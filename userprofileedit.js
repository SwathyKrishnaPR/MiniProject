$(function() {

    $("#demo1").hide();
    $("#demo2").hide();
    $("#demo3").hide();
    $("#demo4").hide();
   

    var error_name = false;
    var error_address = false;
    var error_email = false;
    var error_phone = false;
   

    $("#name").focusout(function(){
       check_name();
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
   

    function check_name() {
       var pattern = /^[a-zA-Z]*$/;
       var name = $("#name").val();
       if (name == '') {
          $("#demo1").show();
          $("#demo1").html("Please Enter Name");
          $("#name").css("border","3px solid #F90A0A");
          error_name = false;
       }
       else if (!pattern.test(name) ) {
          $("#demo1").show();
          $("#demo1").html("Should contain only Characters");
          $("#name").css("border","3px solid #F90A0A");
          error_name = false;
       } else {
          $("#demo1").hide();
          $("#name").css("border","3px solid green");
       }
    }

    function check_address() {
       var address = $("#address").val();
       var address_length = $("#address").val().length;
       if (address == '') {
          $("#demo2").show();
          $("#demo2").html("Please Enter Address");
          $("#address").css("border","3px solid #F90A0A");
          error_address = false;
       }
       else if (address_length <5 ) {
          $("#demo2").show();
          $("#demo2").html("Contain Atleast  Characters");
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
          $("#demo3").html("Please Enter Email");
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
          $("#demo4").html("Please Enter Phone Number");
          $("#phone").css("border","3px solid #F90A0A");
          error_phone = false;
       }
       else if (!pattern.test(phone) ) {
          $("#demo4").show();
          $("#demo4").html("Should Contain 10 Digit");
          $("#phone").css("border","3px solid #F90A0A");
          error_phone = false;
       } else {
          $("#demo4").hide();
          $("#phone").css("border","3px solid green");
          error_phone = true;
       }
    }
 
   
    
    $("#form").submit(function() {
       error_name = true;
       error_address = true;
       error_email = true;
       error_phone = true;
  

       check_name();
       check_address();
       check_email();
       check_phone();
  

       if (error_name === true&& error_address === true&& error_email === true && error_phone === true) {
          return true;
       } else {
 
          return false;
       }


    });
 });
 