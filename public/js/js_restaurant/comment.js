$(function(){

    $(document).ready(function(){
        
        //функция replay
        $('.reply').on('click', function(){
            //alert('reply click');
            $('.newcomment__form').remove();
            //var clone_form = $('.comment__form').cloneNode(false);
            //клонируем форму и заполняем её доп. данными 
            $('.comment__form').css({'display':'block'});
            var clone_form = $('.comment__form').clone(true);
            clone_form.removeClass('comment__form');
            clone_form.addClass('newcomment__form');
            clone_form.find('a').attr({'name':'form-com'});
            clone_form.find('#id_message_user_comment').val('');
            clone_form.find('.reply_client').css({'display':'block'});
            var class_copy = $(this).closest('.comment-message').find('.children');
            var id_comment = class_copy.attr('data-id-comment');
            clone_form.find('#id__id_commentDish').val(id_comment);
            clone_form.find('#id_replay').attr('checked',true);
            var name_user =  $(this).closest('.comment-body').find('h3').text();
            clone_form.find('.link-form').text('Ответить '+ name_user);
            clone_form.find('#id_reply_name').val('Ответил '+ name_user);
            clone_form.find('.close--form').css({'display':'block'});
            //clone_form.find('.upload_image_').find('label').attr({'for':'id_image_user1'});
            $('.comment__form').css({'display':'none'});
            $('.comment__form').find('#id_message_user_comment').val('');
            
            clone_form.appendTo(class_copy);
        });
        
        //отменяем запись комментария и удаляем клонированную форму
        $('.close--form').on('click', function(){
            $('.newcomment__form').remove();
            $('.comment__form').css({'display':'block'});
        });
        
        //функция ajax-запрос для добавления комментария
        /**/
        $('.button__comment').on('click', function(event){
            //event.stopPropagation(); // остановка всех текущих JS событий
            event.preventDefault(); //осатновка события
            var url = $(this).closest('#comment-form').attr('action');
            var form = $(this).closest('#comment-form');
            
            var form_data_1 = new FormData($(this).closest('#comment-form')[0]);//читаем целиком форму 
            console.log(form_data_1);
            $.ajax({
                type: 'post',
                url: url,
                dataType: 'json',
                processData: false,
                contentType: false,
                data: form_data_1, //dat, //fdata, //form_data,
                success: function(data_server){
                    console.log(data_server);
                    if(data_server[0] != undefined && data_server[0] == 1 ) //выводим ошибки
                    {
                        $("#error_box").fadeIn(500).delay(1000).fadeOut(500);
                        if(data_server[1] != undefined){//name user comment
                            var name = form.find('#id_name_user_comment').closest('.form-group').next();
                            name.find('.toast2-body').text(data_server[1]);
                            name.css('display', 'block');
                        }
                        if(data_server[2] != undefined){//message user comment
                            var message = form.find('#id_message_user_comment').closest('.form-group').next();
                            message.find('.toast2-body').text(data_server[2]);
                            message.css('display', 'block');
                        }
                        if(data_server[3] != undefined){//photo user comment
                            var photo = form.find('#id_image_user').closest('.form-group').next();
                            photo.find('.toast2-body').text(data_server[3]);
                            photo.css('display', 'block');
                        }
                        if(data_server['photo_user'] != undefined){
                            if(data_server['photo_user'][3] != undefined){
                                var photo = form.find('#id_image_user').closest('.form-group').next();
                                photo.find('.toast2-body').text(data_server['photo_user'][3]);
                                photo.css('display', 'block');
                            }
                            if(data_server['photo_user'][4] != undefined){
                                var photo = form.find('#id_image_user').closest('.form-group').next();
                                photo.find('.toast2-body').text(data_server['photo_user'][4]);
                                photo.css('display', 'block');
                            }
                        }
                        if(data_server[4] != undefined){//email user comment
                            var email = form.find('#id_email_user_comment').closest('.form-group').next();
                            email.find('.toast2-body').text(data_server[4]);
                            email.css('display', 'block');
                        }
                        if(data_server[5] != undefined){//csrf
                            var csrf = form.find('.button__comment').closest('.form-group').next();
                            csrf.find('.toast2-body').text(data_server[5]);
                            csrf.css({'display':'block','padding-bottom':'20px'});
                        }
                    }
                    else //выводим сообщение
                    {
                        //alert('Сообщение добавлено');
                        $("#access_box").fadeIn(500).delay(3000).fadeOut(500);
                        //клонируем текстовый блок для комментария/
                        if( data_server[6]['reply'] == 0 )
                        {
                            var clone_comment_1 = $('.clone-comment-1').clone(true);
                            clone_comment_1.removeClass('clone-comment-1');
                            var data_comment = clone_comment_1.find('.comment-body');
                            data_comment.find('h3').text(data_server[6]['name_user_comment']);
                            data_comment.find('.meta').text(data_server['date']);
                            data_comment.find('.meta').next().text(data_server[6]['message_user_comment']);
                            clone_comment_1.find('.children').attr({'data-id-comment':data_server['id']});
                            if(data_server['path'] == null){
                                var clone_photo = clone_comment_1.find('.photo--com1');
                                clone_photo.remove();
                            }else{
                                var clone_photo = clone_comment_1.find('.photo--com2');
                                clone_photo.remove();
                                clone_comment_1.find('.photo--com1').find('img').attr('src', data_server['path']);
                            }
                            clone_comment_1.appendTo('.comment-list-all');
                            var class_s = clone_comment_1.offset().top - 60;
                            $('html, body').scrollTop(class_s);
                        }else{
                            var clone_comment_2 = $('.clone-comment-2').clone(true);
                            clone_comment_2.removeClass('clone-comment-2');
                            var data_comment = clone_comment_2.find('.comment-body');
                            data_comment.find('h3').text(data_server[6]['name_user_comment']);
                            data_comment.find('.meta').text(data_server['date']);
                            data_comment.find('.meta').next().text(data_server[6]['message_user_comment']);
                            data_comment.find('.reply_on_comment').text(data_server[6]['reply_name']);
                            if( data_server['path'] == null ){
                                var clone_photo = clone_comment_2.find('.photo--com1');
                                clone_photo.remove();
                            }else{
                                var clone_photo = clone_comment_2.find('.photo--com2');
                                clone_photo.remove();
                                clone_comment_2.find('.photo--com1').find('img').attr('src', data_server['path']);
                            }
                            //var child = $(this).closest(".children");
                            //child.after(clone_comment_2);
                            //$(this).closest('.newcomment__form').before(clone_comment_2);
                            //clone_comment_2.appendTo(child);
                            //clone_comment_2.appendChild(child);
                            var class_copy = $(this).closest('.comment-message').find('.children');
                            clone_comment_2.appendTo(class_copy);
                            //clone_comment_2.appendTo('.children');
                            //clone_comment_2.appendTo('.children');
                            //вставляем комментарий
                            $('.newcomment__form').before(clone_comment_2);
                            // прокручиваем окно на фиксированное кол-во
                            //window.scrollBy(0, -20);
                            //прокрутка до определённого элемента
                            var class_s = $('.newcomment__form').prev().offset().top - 60; 
                            
                            $('html, body').scrollTop(class_s);
                            form.remove();
                            $('.comment__form').css({'display':'block'});
                        }
                        
                    }
                },
                error: function(){
                    alert('ошибка');
                }
            });
            //запрещает перезагрузку
            
            return false;
            
        });
        /**/
        //$('');
        
        /*=== закрываем сообщение об ошибки для формы с отправкой комментария ===*/
        $('#id_name_user_comment').on('input', function(){
            $(this).closest('.form-group').next().css('display', 'none');
        });
        $('#id_message_user_comment').on('input', function(){
            $(this).closest('.form-group').next().css('display', 'none');
        });
        $('#id_message_user_comment').on('input', function(){
            $(this).closest('.form-group').next().css('display', 'none');
        });
        $('#id_email_user_comment').on('input', function(){
            $(this).closest('.form-group').next().css('display', 'none');
        });
        $('#id_image_user').on('click', function(){
            $(this).closest('.form-group').next().css('display', 'none');
        });
        
        //обрабатываем событие загрузка файла
        $('#id_image_user').on('change', function(){
            //alert('update file');
            var name = $('#id_image_user')[0].files[0];
            console.log(name);
            //alert(name['name']);
            
            var split_ = name['name'].split('.');
            var last_var = split_[split_.length - 1];
            if(last_var == 'jpeg' || last_var == 'jpg' || last_var == 'png'){
                var new_name = 'Файл: ' + name['name'];
                $('.name_my_file').css({'color':'#999999'});
                $('.name_my_file').text(new_name);
                
            }else{
                $('.name_my_file').css({'color':'red'});
                $('.name_my_file').text('Файл: ' + name['name'] + '. Имеет недопустимое расширение. Допустимые расширения: jpeg, jpg, png.');
            }
            //console.log(split_);
            
            $('.name_my_file').css({'display':'block'});
            $('.close_photo').css({'display':'block'});
            
        });
        $('.close_photo').on('click',function(){
            //var name = $('#id_image_user')[0].files[0];
            $('#id_image_user')[0].value = "";
            $('.name_my_file').css({'display':'none'});
            $('.close_photo').css({'display':'none'});
        });
        /*
        function ss(){
                alert(1);
        }
        window.addEventListener("load", function(){
             setTimeout(ss, 5000);   
        });
        $('.bio').on('click', function(){
                //alert(1);
                //ss();
                setTimeout(ss, 2000);
                setInterval(ss, 2000);
        });
        $('.click_message').on('click', function(str){
            $('#error_message').html(str);
            $("#error_box").fadeIn(500).delay(3000).fadeOut(500);
        });
        */
    });
});




