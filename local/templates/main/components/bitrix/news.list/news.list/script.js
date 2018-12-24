
$( document ).ready(function() {
  
    $('.js-delete-book').click(function(){
      
      var idd=$(this).attr("data-id");
      $.ajax({
           type: "POST",
           url: '/ajax/remove_book.php',
           data: {id:idd},
           success: function(data){
             location.reload();
             console.log(data);
           }
         });
        });
        
       });