/*$.ajax({
    type: "POST",
    url: "template.php",
    data: {id: }
  
    });
    */

$( document ).ready(function() {
   
 $('#id1').click(function(){
   var dt=$("#id1").attr("data-id");
   $.ajax({
        type: "POST",
        url: '/ajax/add_book.php',
        data: {id:dt},
        success: function(data){
          console.log(data);
        }
      });
      $('.take').remove();
      jQuery('<div/>', {
       class: "tmppp1",
       text: 'Вы взяли книгу'
    }).appendTo('#zv');
  
  });

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

