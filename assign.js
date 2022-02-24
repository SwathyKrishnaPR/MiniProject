$(function() {

    $("#demo1").hide();
    $("#demo2").hide();
    $("#demo3").hide();
    $("#demo4").hide();
    

    var error_remark = false;
    var error_assigned_mechanic = false;
    var error_time = false;
    var error_status= false;
   

    $("#remark").focusout(function(){
       check_remark();
    });
    $("#assigned_mechanic").focusout(function() {
       check_assigned_mechanic();
    });
    $("#time").focusout(function() {
       check_time();
    });
    $("#status").focusout(function() {
       check_status();
    });
    

    function check_remark() {
       var remark = $("#remark").val();
       if (remark == '') {
          $("#demo1").show();
          $("#demo1").html("Please Enter Remark");
          $("#remark").css("border","3px solid #F90A0A");
          error_remark = false;
       }
       else {
          $("#demo1").hide();
          $("#remark").css("border","3px solid green");
       }
    }

    function check_assigned_mechanic() {
       var assigned_mechanic = $("assigned_mechanic").val();
       var assigned_mechanic_length = $("#problem").val().length;
       if (assigned_mechanic == '') {
          $("#demo2").show();
          $("#demo2").html("Please Enter Address");
          $("#assigned_mechanic").css("border","3px solid #F90A0A");
          error_assigned_mechanic = false;
       }
       
       else {
          $("#demo2").hide();
          $("#assigned_mechanic").css("border","3px solid green");
          
       }
    }
  
 
   
    function check_time() {
       var time = $("#time").val();
       if (time == '') {
          $("#demo3").show();
          $("#demo3").html("Please Enter time");
          $("#time").css("border","3px solid #F90A0A");
          error_time = false;
       }
       else {
          $("#demo3").hide();
          $("#time").css("border","3px solid green");
          
       }
    }
    function check_status() {
       var status= $("#location").val();
       if (status== '') {
          $("#demo4").show();
          $("#demo4").html("Please Choose Status");
          $("#status").css("border","3px solid #F90A0A");
          error_status = false;
       }
        else {
          $("#demo4").hide();
          $("#location").css("border","3px solid green");
          error_status = true;
       }
    }


    $("#form").submit(function() {
       error_remark = true;
       error_assigned_mechanic = true;
       error_time = true;
       error_status = true;
       
       check_remark();
       check_assigned_mechanic();
       check_date();
       check_time();
       check_status();
     
       if (error_remark === true&& error_assigned_mechanic === true && error_time === true && error_status === true) {
          document.getElementById("demo").innerHTML = 'Thank You for registering';
          return true;
       } else {
         
          return false;
       }


    });
 });
 