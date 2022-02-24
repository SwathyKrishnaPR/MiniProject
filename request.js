$(function() {

    $("#demo1").hide();
    $("#demo2").hide();
    $("#demo3").hide();
    $("#demo4").hide();
    $("#demo5").hide();
    

    var error_category = false;
    var error_problem = false;
    var error_date = false;
    var error_time = false;
    var error_location= false;
   

    $("#category").focusout(function(){
       check_category();
    });
    $("#problem").focusout(function() {
       check_problem();
    });
    $("#date").focusout(function() {
       check_date();
    });
    $("#time").focusout(function() {
       check_time();
    });
    $("#location").focusout(function() {
       check_location();
    });
    

    function check_category() {
       var category = $("#category").val();
       if (category == '') {
          $("#demo1").show();
          $("#demo1").html("Please Enter Category");
          $("#category").css("border","3px solid #F90A0A");
          error_category = false;
       }
       else {
          $("#demo1").hide();
          $("#category").css("border","3px solid green");
       }
    }

    function check_problem() {
       var problem = $("#problem").val();
       var problem_length = $("#problem").val().length;
       if (problem == '') {
          $("#demo2").show();
          $("#demo2").html("Please Enter Issue");
          $("#problem").css("border","3px solid #F90A0A");
          error_problem = false;
       }
       else if (problem_length <5 ) {
          $("#demo2").show();
          $("#demo2").html("Contain Atleast 5 Characters");
          $("#problem").css("border","3px solid #F90A0A");
          error_problem = false;
       }
       else {
          $("#demo2").hide();
          $("#problem").css("border","3px solid green");
          
       }
    }

    function check_date() {
       var date = $("#date").val();
       if (date == '') {
          $("#demo3").show();
          $("#demo3").html("Please Enter Date");
          $("#date").css("border","3px solid #F90A0A");
          error_date= false;
       }
       else {
          $("#demo3").hide();
          $("#date").css("border","3px solid green");
          
       }
    }

   
 
   
    function check_time() {
       var time = $("#time").val();
       if (time == '') {
          $("#demo4").show();
          $("#demo4").html("Please Enter time");
          $("#time").css("border","3px solid #F90A0A");
          error_uname = false;
       }
       else {
          $("#demo4").hide();
          $("#time").css("border","3px solid green");
          
       }
    }
    function check_location() {
      var location = $("#location").val();
      var location_length = $("#location").val().length;
      if (location == '') {
         $("#demo5").show();
         $("#demo5").html("Please Enter Destination");
         $("#location").css("border","3px solid #F90A0A");
         error_location = false;
      }
      else if (location_length <8 ) {
         $("#demo5").show();
         $("#demo5").html("Contain Atleast 8 Characters");
         $("#location").css("border","3px solid #F90A0A");
         error_location = false;
      }
      else {
         $("#demo5").hide();
         $("#location").css("border","3px solid green");
         error_location= true;
         
      }
   }

    $("#form").submit(function() {
       error_category = true;
       error_problem = true;
       error_date = true;
       error_time = true;
       error_location = true;
       
       check_category();
       check_problem();
       check_date();
       check_time();
       check_location();
     
       if (error_category === true&& error_problem === true&& error_date === true && error_time === true && error_location === true) {
          document.getElementById("demo").innerHTML = 'Thank You for requesting';
          return true;
       } else {
         
          return false;
       }


    });
 });
 