$(function() {
         
    $("#demo1").hide();
    
 
    var error_remark = false;
    
 
    $("#remark").focusout(function(){
       check_remark();
    });
    
 
    
    
    function check_remark() {
       var remark = $("#remark").val();
       var remark_length = $("#remark").val().length;
       if (remark == '') {
          $("#demo1").show();
          $("#demo1").html("Please Enter remark");
          $("#remark").css("border","3px solid #F90A0A");
          error_remark = false;
       }
       else if (remark_length <5 ) {
          $("#demo1").show();
          $("#demo1").html("Contain Atleast 5 Characters");
          $("#remark").css("border","3px solid #F90A0A");
          error_remark= false;
       }
       else {
          $("#demo1").hide();
          $("#remark").css("border","3px solid green");
          error_remark= true;
          
       }
    }
 
   
 
    $("#form").submitrej(function() {
       error_remark = true;
       
 
       check_remark();
     
       if (error_remark === true ) {
       
          return true;
       } else {
          return false;
       }
 
 
    });
 });
 