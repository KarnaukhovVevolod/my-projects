$(function(){
   $(document).ready(function(){
       
       $('.emailbutton').on('click', function(){
           
           var fdata = $('#E_mail-form').serialize();
           //alert(fdata);
           var url = $('#E_mail-form').attr('action');
           //alert(url);
           $.ajax({
               type: 'post',
               url: url,
               dataType: 'json',
               data: fdata,
               success: function(data_server){
                   console.log(data_server);
                   if(data_server['param'] == 1){
                       $('.toast1').css({'box-shadow': '0 0 10px #10ff00'});
                   }else{
                       $('.toast1').css({'box-shadow': '0 0 10px #ff1700'});
                   }
                   $('.error_message').find('.toast1-body').text(data_server['text']);
                   $('.error_message').css('display', 'block');
               },
               error: function(){
                   alert('ошибка');
               }
           });
           //запрещаем перезагрузку
           return false;
       });/**/
       
       $('.close_message_email').on('click', function(){
           $('.error_message').css('display', 'none');
       });
   }) 
});

