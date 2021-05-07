$(function(){
   $(document).ready(function(){
       //ajax для формы с подпиской email
       
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
                   //console.log(data_server);
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
       
       //закрывает сообщение об ошибки для формы с email подпиской
       $('.close_message_email').on('click', function(){
           $('.error_message').css('display', 'none');
       });
       
       //===== РАБОТАЕМ С КОНТАКТНОЙ ФОРМОЙ ===== начало =====//
       
        //ajax для контактной формы
       
        $('.submitContact').on('click', function(){
           
           var fdata = $('#contact-form').serialize();
           //alert(fdata);
           var url = $('#contact-form').attr('action');
           //alert(url);
           //fdata = '45';
           $.ajax({
               type: 'post',
               url: url,
               dataType: 'json',
               data: fdata,
               success: function(data_server){
                   console.log(data_server);
                   dataType: 'json';
                   console.log(data_server['text']['name_human']);
                   
                   if(data_server['param'] == 1){
                       $('.message_contact_all').find('.toast2').css({'box-shadow': '0 0 10px #10ff00'});
                       $('.message_contact_all').find('.toast2-body').text(data_server['text']);
                       $('.message_contact_all').css('display','block');
                       $('#name_human').val('');
                       $('#human_email').val('');
                       $('#human_topic').val('');
                       $('#human_message').val('');
                   }else{
                       var error = data_server['text'];
                       
                       if(error['name_human'] != undefined)  {
                           var block = $('#name_human').closest('.form-group').next();
                           block.find('.toast2-body').text(error['name_human']['message']);
                           block.find('.error_message_contact').find('.toast2').css({'box-shadow': '0 0 10px #ff1700'});
                           block.css('display','block');
                       }else{
                           var block = $('#name_human').closest('.form-group').next();
                           block.css('display','none');
                       }
                       if(error['human_email'] != undefined){
                           var block = $('#human_email').closest('.form-group').next();
                           block.find('.toast2-body').text(error['human_email']['message']);
                           block.find('.error_message_contact').find('.toast2').css({'box-shadow': '0 0 10px #ff1700'});
                           block.css('display','block');
                       }else{
                           var block = $('#human_email').closest('.form-group').next();
                           block.css('display','none');
                       }
                       if(error['human_topic'] != undefined){
                           var block = $('#human_topic').closest('.form-group').next();
                           block.find('.toast2-body').text(error['human_topic']['message']);
                           block.find('.error_message_contact').find('.toast2').css({'box-shadow': '0 0 10px #ff1700'});
                           block.css('display','block');
                       }else{
                           var block = $('#human_topic').closest('.form-group').next();
                           block.css('display','none');
                       }
                       if(error['human_message'] != undefined){
                           var block = $('#human_message').closest('.form-group').next();
                           block.find('.toast2-body').text(error['human_message']['message']);
                           block.find('.error_message_contact').find('.toast2').css({'box-shadow': '0 0 10px #ff1700'});
                           block.css('display','block');
                       }else{
                           var block = $('#human_message').closest('.form-group').next();
                           block.css('display','none');
                       }
                       
                   }
                   
                   //$('.error_message').find('.toast1-body').text(data_server['text']);
                   //$('.error_message').css('display', 'block');
               },
               error: function(){
                   alert('ошибка');
               }
           });
           //запрещаем перезагрузку
           return false;
       });/**/
       
       //закрывает сообщение об ошибки для формы с отправкой сообщения
       $('.close_message_contact').on('click', function(){
           $(this).closest('.error_message_contact').css('display', 'none');
       });
       
       $('#name_human').on('input', function(){
           var block = $('#name_human').closest('.form-group').next();
           block.css('display','none');
       });
       $('#human_email').on('input', function(){
           var block = $('#human_email').closest('.form-group').next();
           block.css('display','none');
       });
       $('#human_topic').on('input', function(){
           var block = $('#human_topic').closest('.form-group').next();
           block.css('display','none');
       });
       $('#human_message').on('input', function(){
           var block = $('#human_message').closest('.form-group').next();
           block.css('display','none');
       });
       
       //===== РАБОТАЕМ С КОНТАКТНОЙ ФОРМОЙ ===== конец =====//
   }) ;
});

