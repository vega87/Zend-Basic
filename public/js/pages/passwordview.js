$(document).ready(function(){
   $('#show-password').click(function(){
       $.ajax({
           url: "/user/password/show/",
           type: "post",
           data: {id: $('#pid').val()},
           datatype: 'json',
           success: function(data){
               data = jQuery.parseJSON(data);
               $('#show-password').removeClass('zoom');
               $('#show-password').text(data.de_password);
           },
           error:function(){

           }
       });
   });
});