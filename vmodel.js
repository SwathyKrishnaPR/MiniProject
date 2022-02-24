$(function() {
         
   $("#demo0").hide();
   

   var error_vmodel = false;
   

   $("#vmodel").focusout(function(){
      check_vmodel();
   });
   

   
   
   function check_vmodel() {
      var vmodel = $("#vmodel").val();
      var vmodel_length = $("#vmodel").val().length;
      if (vmodel == '') {
         $("#demo0").show();
         $("#demo0").html("Please Enter Model");
         $("#vmodel").css("border","3px solid #F90A0A");
         error_vmodel = false;
      }
      else if (vmodel_length <5 ) {
         $("#demo0").show();
         $("#demo0").html("Contain Atleast 5 Characters");
         $("#vmodel").css("border","3px solid #F90A0A");
         error_vmodel= false;
      }
      else {
         $("#demo0").hide();
         $("#vmodel").css("border","3px solid green");
         error_vmodel= true;
         
      }
   }

  

   $("#form").submit(function() {
      error_vmodel = true;
      

      check_vmodel();
    
      if (error_vmodel === true ) {
      
         return true;
      } else {
         return false;
      }


   });
});
