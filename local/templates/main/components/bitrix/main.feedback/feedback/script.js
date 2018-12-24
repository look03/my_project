
$( document ).ready(function() {
   
    $('.js-massege-book').click(function(){

      var name1=$('#input-6').val(); 
      var email1=$('#input-9').attr("value");
      var text1=$('#input-10').val();
      $.ajax({
           type: "POST",
           url: '/ajax/feedback.php',
           data: {name:name1, email:email1, text:text1},
           success: function(data){
             console.log(data);
           }
         });
      });
    });
   