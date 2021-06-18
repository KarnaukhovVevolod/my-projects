$(function(){
    $(document).ready(function(){
        
        //таблица фон кнопка изменить
        $('.buttoneditefon').on('click', function(){
            alert('Изменить фон');
            var tr = $(this).closest('tr');
            //var id_fon = tr.find("td:first").text();
            //считываем данные с таблицы
            var id_fon;var page;var id_photo;
            tr.find('td').each(function(index, element){
                //console.log(element);//console.log(index);
                if(index == 0){
                    id_fon = $(element).text();
                }
                if(index == 1){
                    page = $(element).attr('data-td');
                }
                if(index == 2){
                    id_photo = $(element).text();
                }
            });
            
            //var fon = [id_fon, page, id_photo];
            //alert(fon);
            //заполняем форму для редактирования
            var form = $('#fon-form');
            form.find('.id_edite').val(id_fon);
            form.find('#fon__page').val(page);
            form.find('#fon_id_photo').val(id_photo);
            
            form.attr({'data__id_table':id_fon});
            
        });
        
        //таблица фон кнопка удалить
        $('.buttondeletefon').on('click', function(){
            alert('Удалить фон');
            var tr = $(this).closest('tr');
            var data = {'id':tr.find('td:first').text(),'table_update':'fon', 'create_record':'delete'};
            var url = $('#fon-form').attr('action');
            
            $.ajax({
                type: 'post',
                url: url,
                dataType: 'json',
                data: data,
                success: function(data_server){
                    console.log(data_server);
                    tr.remove();
                },
                error: function(){
                    alert('ошибка');
                }
            });
            return false;
        });
        
        //форма фон
        $('#submitefon').on('click',function(){
            var fdata = $('#fon-form').serialize();
            var url = $('#fon-form').attr('action');
            $('.error__fon').remove();
            
            $.ajax({
                type: 'post',
                url: url,
                dataType: 'json',
                data: fdata,
                success: function(data_server){
                    console.log(data_server);
                    if(data_server[0] == 0){
                        //выводим ошибки
                        $.each(data_server[1], function(key, value){
                            if(key == 'fon_id_photo')
                            {
                                $.each(value, function(key1, value1){
                                    var div = document.createElement('div');
                                    div.className = 'error__fon';
                                    div.innerHTML = "<strong>"+value1+"</strong>";
                                    $('#fon_id_photo').after(div);
                                });
                            }
                            if(key == 'fon_page')
                            {
                                $.each(value, function(key1, value1){
                                    var div = document.createElement('div');
                                    div.className = 'error__fon';
                                    div.innerHTML = "<strong>"+value1+"</strong>";
                                    $('#fon__page').after(div);
                                });
                            }
                            if(key == 'csrf')
                            {
                                var div = document.createElement('div');
                                    div.className = 'error__fon';
                                    div.innerHTML = "<strong>"+"Перезагрузите страницу для отправки формы"+"</strong>";
                                    $('#submitefon').after(div);
                            }
                            
                            if(key == 'error_id')
                            {
                                var div = document.createElement('div');
                                    div.className = 'error__fon';
                                    div.innerHTML = "<strong>"+value1+"</strong>";
                                    $('.fon_id_photo').after(div);
                            }
                            if(key == 'error_id_fon')
                            {
                                var div = document.createElement('div');
                                    div.className = 'error__fon';
                                    div.innerHTML = "<strong>"+value1+"</strong>";
                                    $('.id_edite').after(div);
                            }
                        });
                        
                    }
                    else{
                        //изменяем информацию или добавляем новую
                        var create_record = data_server[1]['create_record'];
                         
                        if(create_record == 0){ //ищем строчку в таблице и изменяем информацию
                            var table = $('.fon--table').find('table').find('tbody');
                            var id_update = $('#fon-form').attr('data__id_table');
                            var column = 0;
                            
                            table.find('tr').each(function(index,element){
                                
                                //console.log($(element).find('td'))
                                $(element).find('td').each(function(index1, element1){
                                    if(index1 == 0 && (id_update == $(element1).text()) ){
                                        column = 1;
                                        $(element1).text(data_server[1]['id']);
                                        
                                        $('#fon-form').attr({'data__id_table':data_server[1]['id']});
                                        $('#fon-form').find('.id_edite').val(data_server[1]['id']);
                                    }
                                    if(index1 == 0 && id_update != $(element1).text()){
                                        column = 0;
                                    }
                                    if(index1 == 1 && column == 1 ){
                                        switch(Number(data_server[1]['fon_page'])){
                                            case 1:
                                                $(element1).text('Страница с событиями');
                                                break;
                                            case 2:
                                                $(element1).text('Страница с едой');
                                                break;
                                            case 3:
                                                $(element1).text('Главная страница сайта');
                                                break;
                                            case 4:
                                                $(element1).text('Страница статья событие');
                                                break;
                                            case 5:
                                                $(element1).text('Страница статья еда');
                                                break;
                                        }
                                        
                                        $(element1).attr({'data-td':data_server[1]['fon_page']});
                                    }
                                    if(index1 == 2 && column == 1){
                                        $(element1).text(data_server[1]['fon_id_photo']);
                                    }
                                    if(index1 == 3 && column == 1){
                                        $(element1).text(data_server[1]['path']);
                                    }
                                    if(index1 == 4 && column == 1){
                                        
                                        var column_table = $('.copy-column-fon-table').find('td:last').prev().find('img').attr('src');
                                        var P_photo = column_table + '/' + data_server[1]['path'];
                                        $(element1).find('img').attr({'src':P_photo});
                                        
                                    }
                                    
                                    
                                });
                            });
                            
                            
                        }else{ //добавляем новую строчку в таблицу
                            var table = $('.fon--table').find('table:first');
                            
                            var column_table = $('.copy-column-fon-table').clone(true); 
                            column_table.removeClass('copy-column-fon-table');
                            /*
                            var column_table = "<tr>"+
                                    "<td>"+data_server[1]['id']+"</td>"+
                                    "<td>"+data_server[1]['fon_page']+"</td>"+
                                    "<td>"+data_server[1]['fon_id_photo']+"</td>"+
                                    "<td>"+"</td>"+
                                    "<td>"+"</td>"+
                                    "<td>"+'<input type="button" value="Изменить" class="button-table buttoneditefon">'+
                                           '<input type="button" value="Удалить" class="button-table buttondeletefon">'+
                                    "</td>"+
                                    "</tr>";*/
                            var td_first = column_table.find('td:first');
                            td_first.text(data_server[1]['id']);
                            switch(Number(data_server[1]['fon_page'])){
                                case 1:
                                    td_first.next().text('Страница с событиями');
                                    break;
                                case 2:
                                    td_first.next().text('Страница с едой');
                                    break;
                                case 3:
                                    td_first.next().text('Главная страница сайта');
                                    break;
                                case 4:
                                    td_first.next().text('Страница статья событие');
                                    break;
                                case 5:
                                    td_first.next().text('Страница статья еда');
                                    break;
                            }
                            //td_first.next().text(data_server[1]['fon_page']);
                            td_first.next().next().text(data_server[1]['fon_id_photo']);
                            td_first.next().next().next().text(data_server[1]['path']);
                            var attribute_path = td_first.next().next().next().next().find('img').attr('src'); //.text(data_server[1]['fon_id_photo']);
                            var new_attr_path = attribute_path + '/' + data_server[1]['path'];
                            td_first.next().next().next().next().find('img').attr({'src': new_attr_path});
                            
                            table.append(column_table);
                            //console.log(column_table);
                            //alert('Добавил');
                        }
                        
                        
                    }
                },
                error: function(){
                    alert('ошибка');
                }
            });
            //запрещаем перезагрузку
            return false;
        });
        //------------------------------
        
        //таблица фото кнопка изменить
        $('.buttonediteimage').on('click', function(){
            alert('Изменить фото');
            var tr = $(this).closest('tr');
            //считываем данные с таблицы
            var id; var path;
            tr.find('td').each(function(index, element){
                if(index == 0){
                    id = $(element).text();
                }
                if(index == 1){
                    path = $(element).text();
                }
            });
            
            //заполняем форму для редактирования
            var form = $('#image-form');
            form.find('.id_edite').val(id);
            form.find('#image_path').val(path);
            
            form.attr({'data__id_table':id});
            
        });
        
        //таблица фото кнопка удалить
        $('.buttondeleteimage').on('click', function(){
            alert('Удалить фото');
            var tr = $(this).closest('tr');
            var data = {'id':tr.find('td:first').text(),'table_update':'image', 'create_record':'delete'};
            var url = $('#image-form').attr('action');
            
            $.ajax({
                type: 'post',
                url: url,
                dataType: 'json',
                data: data,
                success: function(data_server){
                    console.log(data_server);
                    tr.remove();
                },
                error: function(){
                    alert('ошибка');
                }
            });
            return false;
        });
        //форма image
        $('#submitimage').on('click',function(){
            //var fdata = $('#image-form').serialize();
            var url = $('#image-form').attr('action');
            $('.error__fon').remove();
            var form_data = new FormData($(this).closest('#image-form')[0]);
            $.ajax({
                type: 'post',
                url: url,
                dataType: 'json',
                //data: fdata,
                processData: false,
                contentType: false,
                data: form_data,
                success: function(data_server){
                    console.log(data_server);
                    
                    /**/
                    if(data_server[0] == 0){
                        //выводим ошибки
                        $.each(data_server[1], function(key, value){
                            if(key == 'image_path')
                            {
                                $.each(value, function(key1, value1){
                                    var div = document.createElement('div');
                                    div.className = 'error__fon';
                                    div.innerHTML = "<strong>"+value1+"</strong>";
                                    $('#image_path').after(div);
                                });
                            }
                            if(key == 'error_id')
                            {
                                $.each(value, function(key1, value1){
                                    var div = document.createElement('div');
                                    div.className = 'error__fon';
                                    div.innerHTML = "<strong>"+value1+"</strong>";
                                    $('#image-form').find('.id_edite').after(div);
                                    //$('#fon__page').after(div);
                                });
                            }
                            if(key == 'form-file')
                            {
                                    //alert(value);
                                $.each(value, function(key1, value1){
                                    var div = document.createElement('div');
                                    div.className = 'error__fon';
                                    div.innerHTML = "<strong>"+value1+"</strong>";
                                    $('#id_image_user').after(div);
                                    //$('#fon__page').after(div);
                                });
                            }
                            if(key == 'photo_user')
                            {
                                
                                $.each(value, function(key1, value1){
                                    var div = document.createElement('div');
                                    div.className = 'error__fon';
                                    div.innerHTML = "<strong>"+value1+"</strong>";
                                    $('#id_image_user').after(div);
                                    //$('#fon__page').after(div);
                                });
                            }
                            if(key == 'csrf')
                            {
                                var div = document.createElement('div');
                                    div.className = 'error__fon';
                                    div.innerHTML = "<strong>"+"Перезагрузите страницу для отправки формы"+"</strong>";
                                    $('#submitimage').after(div);
                            }
                            
                            if(key == 'id_image_user')
                            {
                                var div = document.createElement('div');
                                    div.className = 'error__fon';
                                    div.innerHTML = "<strong>"+value1+"</strong>";
                                    $('#id_image_user').after(div);
                            }
                            
                        });
                        
                    }
                    else{
                        //изменяем информацию или добавляем новую
                        var create_record = data_server[1]['create_record'];
                         
                        if(create_record == 0){ //ищем строчку в таблице и изменяем информацию
                            var table = $('.image--table').find('table').find('tbody');
                            var id_update = $('#image-form').attr('data__id_table');
                            var column = 0;
                            
                            table.find('tr').each(function(index,element){
                                
                                //console.log($(element).find('td'))
                                $(element).find('td').each(function(index1, element1){
                                    if(index1 == 0 && (id_update == $(element1).text()) ){
                                        column = 1;
                                        $(element1).text(data_server[1]['id']);
                                        
                                        $('#image-form').attr({'data__id_table':data_server[1]['id']});
                                        $('#image-form').find('.id_edite').val(data_server[1]['id']);
                                    }
                                    if(index1 == 0 && id_update != $(element1).text()){
                                        column = 0;
                                    }
                                    if(index1 == 1 && column == 1 ){
                                        $(element1).text(data_server[1]['image_path']);
                                    }
                                    
                                    if(index1 == 2 && column == 1){
                                        
                                        var column_table = $('.copy-column-image-table').find('td:last').prev().find('img').attr('src');
                                        var P_photo = column_table + '/' + data_server[1]['image_path'];
                                        $(element1).find('img').attr({'src':P_photo});
                                        
                                    }
                                    
                                });
                            });
                            
                            
                        }else{ //добавляем новую строчку в таблицу
                            var table = $('.image--table').find('table:first');
                            
                            var column_table = $('.copy-column-image-table').clone(true); 
                            column_table.removeClass('copy-column-image-table');
                            
                            var td_first = column_table.find('td:first');
                            td_first.text(data_server[1]['id']);
                            td_first.next().text(data_server[1]['path']);
                    
                            var attribute_path = td_first.next().next().find('img').attr('src'); 
                            var new_attr_path = attribute_path + '/' + data_server[1]['path'];
                            td_first.next().next().find('img').attr({'src': new_attr_path});
                            
                            table.append(column_table);
                            
                        }
                        
                        
                    }
                    /**/
                },
                error: function(){
                    alert('ошибка');
                }
            });
            //запрещаем перезагрузку
            return false;
        });
        
        //кнопка для пагинации таблица image     
        $('.photo_pagination_contact').on('click', function(){
            //alert('подгрузить');
            var start = $(this).attr('data-current-start-count');
            var end = $(this).attr('data-current-max-count');
            var step = $(this).attr('data-step');
            
            var url = $(this).attr('data-url');
            var data = {0:start,1:end,2:step,'table_update':'image_load'};
            $.ajax({
                type: 'post',
                url: url,
                dataType: 'json',
                data: data,
                success: function(data_server){
                    console.log(data_server);
                    $('.current_count_photo').text(data_server[3]);
                    $('.photo_pagination_contact').attr({'data-current-start-count':data_server[0]});
                    var table = $('.image--table').find('table:first');
                    $.each(data_server[4], function(index,element){
                        
                        //
                        var column_table = $('.copy-column-image-table').clone(true); 
                        column_table.removeClass('copy-column-image-table');
                        
                        var td_first = column_table.find('td:first');
                        td_first.text(element['id']);
                        td_first.next().text(element['photo']);
                    
                        var attribute_path = td_first.next().next().find('img').attr('src'); 
                        var new_attr_path = attribute_path + '/' + element['photo'];
                        td_first.next().next().find('img').attr({'src': new_attr_path});
                            
                        table.append(column_table);
                        //
                        
                    });
                    
                    
                },
                error: function(){
                    alert('ошибка');
                }
            });
            return false;
        });
        
        //------------------------------
        //таблица контакты компании кнопка изменить
        $('.buttoneditecontact').on('click', function(){
            alert('Изменить контакты');
            var tr = $(this).closest('tr');
            //считываем данные с таблицы
            var id; var photo_id; var content_adress;
            var adress_text;var telephone_company;var email_company;
            var link_adress_site;
            var form = $("#contact-form");
            tr.find('td').each(function(index, element){
                switch(index){
                    case 0: id = $(element).text();
                        form.find('.id_edite').val(id);
                        break;
                    case 1: photo_id = $(element).text();
                        form.find('#contact_photo_path_head').val(photo_id);
                        break;
                    case 5: content_adress = $(element).html();
                        form.find('#contact_content_address').val(content_adress);
                        break;
                    case 6: adress_text = $(element).html();
                        form.find('#contact_address').val(adress_text);
                        break;
                    case 7: telephone_company = $(element).html();
                        form.find('#contact_telephone_company').val(telephone_company);
                        break;
                    case 8: email_company = $(element).html();
                        form.find('#contact_email_company').val(email_company);
                        break;
                    case 9: link_adress_site = $(element).html();
                        form.find('#contact_link_site').val(link_adress_site);
                        break;
                }
                if(index == 0){
                    id = $(element).text();
                }
                if(index == 1){
                    path = $(element).text();
                }
            });
            
            
            form.attr({'data__id_table':id});
            
        });
        //таблица контакты компании кнопка удалить
        $('.buttondeletecontact').on('click', function(){
            alert('Удалить Контакты');
           
            var tr = $(this).closest('tr');
            var data = {'id':tr.find('td:first').text(),'table_update':'contact', 'create_record':'delete'};
            var url = $('#contact-form').attr('action');
            //tr.remove();
            
            $.ajax({
                type: 'post',
                url: url,
                dataType: 'json',
                data: data,
                success: function(data_server){
                    console.log(data_server);
                    tr.remove();
                },
                error: function(){
                    alert('ошибка');
                }
            });
            return false;
        
        });
        //форма contact
        $('#submitcontact').on('click',function(){
            var fdata = $('#contact-form').serialize();
            var url = $('#contact-form').attr('action');
            $('.error__fon').remove();
            //var form_data = new FormData($(this).closest('#contact-form')[0]);
            $.ajax({
                type: 'post',
                url: url,
                dataType: 'json',
                data: fdata,
                
                success: function(data_server){
                    console.log(data_server);
                    /**/
                    if(data_server[0] == 0){
                        //выводим ошибки
                        var form = $('#contact-form');
                        $.each(data_server[1], function(key, value){
                            switch(key){
                                case 'error_contact':
                                    $.each(value, function(key1, value1){
                                        var div = document.createElement('div');
                                        div.className = 'error__fon';
                                        div.innerHTML = "<strong>"+value1+"</strong>";
                                        form.find('.id_edite').after(div);
                                    });
                                    break;
                                case 'error_id':
                                    $.each(value, function(key1, value1){
                                        var div = document.createElement('div');
                                        div.className = 'error__fon';
                                        div.innerHTML = "<strong>"+value1+"</strong>";
                                        form.find('#contact_photo_path_head').after(div);
                                    });
                                    break;
                                case 'csrf':
                                    var div = document.createElement('div');
                                    div.className = 'error__fon';
                                    div.innerHTML = "<strong>"+"Перезагрузите страницу для отправки формы"+"</strong>";
                                    $('#submitcontact').after(div);
                                    break;
                                default:var id_key;
                                    $.each(value, function(key1, value1){
                                        id_key = '#'+ key;
                                        var div = document.createElement('div');
                                        div.className = 'error__fon';
                                        div.innerHTML = "<strong>"+value1+"</strong>";
                                        form.find(id_key).after(div);
                                    });
                                break;
                            }
                        });
                    }
                    else{
                        //изменяем информацию или добавляем новую
                        var create_record = data_server[1]['create_record'];
                         
                        if(create_record == 0){ //ищем строчку в таблице и изменяем информацию
                            var table = $('.contact--table').find('table').find('tbody');
                            var id_update = $('#contact-form').attr('data__id_table');
                            var column = 0;
                            table.find('tr').each(function(index,element){
                                //console.log($(element).find('td'))
                                $(element).find('td').each(function(index1, element1){
                                    if(index1 == 0 && (id_update == $(element1).text()) ){
                                        column = 1;
                                        $(element1).text(data_server[1]['id']);
                                        $('#contact-form').attr({'data__id_table':data_server[1]['id']});
                                        $('#contact-form').find('.id_edite').val(data_server[1]['id']);
                                    }
                                    if(index1 == 0 && id_update != $(element1).text()){
                                        column = 0;
                                    }
                                    if(column == 1){
                                        switch(index1){
                                            case 1:$(element1).text(data_server[1]['contact_photo_path_head']);
                                                break;
                                            case 2:$(element1).text(data_server[1]['path']);
                                                break;
                                            case 3:
                                                var src = $('.copy-column-contact-table').find('.fon-photo-edite').attr('src'); //$(element1).find('img').attr('src');
                                                src = src + '/' + data_server[1]['path'];
                                                $(element1).find('img').attr({'src':src});
                                                $('.contact-head-fon').css('background-image',"url("+src+")");
                                                break;
                                            case 4:$(element1).text(data_server[1]['content_address_']);
                                                break;
                                            case 5:$(element1).html(data_server[1]['content_address_']);
                                                break;
                                            case 6:$(element1).text(data_server[1]['contact_address']);
                                                break;
                                            case 7:$(element1).html(data_server[1]['contact_telephone_company']);
                                                break;
                                            case 8:$(element1).text(data_server[1]['contact_email_company']);
                                                break;
                                            case 9:$(element1).html(data_server[1]['contact_link_site']);
                                                break;
                                            
                                        }
                                    }
                                });
                            });
                            
                            $('.contact-address-content').html(data_server[1]['content_address_']);
                            $('.contact-info').find('.d-flex-1').each(function(index,value){
                                switch(index){
                                    case 0:$(value).find('p').html(data_server[1]['contact_address']);
                                        break;
                                    case 1:$(value).find('p').html(data_server[1]['contact_telephone_company']);
                                        break;
                                    case 2:var mail = "mailto: " + data_server[1]['contact_email_company'];
                                        $(value).find('p').find('a').text(data_server[1]['contact_email_company']);
                                        $(value).find('p').find('a').attr({'href':mail});
                                        break;
                                    case 3:$(value).find('p').html(data_server[1]['contact_link_site']);
                                        break;
                                }
                            });
                            
                        }else{ //добавляем новую строчку в таблицу
                            
                            var table = $('.contact--table').find('table:first');
                            var column_table = $('.copy-column-contact-table').clone(true); 
                            column_table.removeClass('copy-column-contact-table');
                            //----
                            $(column_table).find('td').each(function(index1, element1){
                            
                                switch(index1){
                                    case 0:$(element1).text(data_server[1]['id']);
                                        $('#contact-form').attr({'data__id_table':data_server[1]['id']});
                                        $(element1).text(data_server[1]['id']);
                                        break;
                                    case 1:$(element1).text(data_server[1]['contact_photo_path_head']);
                                        break;
                                    case 2:$(element1).text(data_server[1]['path']);
                                        break;
                                    case 3:var src = $('.copy-column-contact-table').find('.fon-photo-edite').attr('src'); //$(element1).find('img').attr('src');
                                        src = src + '/' + data_server[1]['path'];
                                        $(element1).find('img').attr({'src':src});
                                        $('.contact-head-fon').css('background-image',"url("+src+")");
                                        break;
                                    case 4:$(element1).text(data_server[1]['content_address_']);
                                        break;
                                    case 5:$(element1).html(data_server[1]['content_address_']);
                                        break;
                                    case 6:$(element1).text(data_server[1]['contact_address']);
                                        break;
                                    case 7:$(element1).html(data_server[1]['contact_telephone_company']);
                                        break;
                                    case 8:$(element1).text(data_server[1]['contact_email_company']);
                                        break;
                                    case 9:$(element1).html(data_server[1]['contact_link_site']);
                                        break;
                                }
                               
                                    
                            });
                            //----
                            $('.contact-address-content').html(data_server[1]['content_address_']);
                            $('.contact-info').find('.d-flex-1').each(function(index, value){
                                switch(index){
                                    case 0:$(value).find('p').html(data_server[1]['contact_address']);
                                        break;
                                    case 1:$(value).find('p').html(data_server[1]['contact_telephone_company']);
                                        break;
                                    case 2:var mail = "mailto: " + data_server[1]['contact_email_company'];
                                        $(value).find('p').find('a').text(data_server[1]['contact_email_company']);
                                        $(value).find('p').find('a').attr({'href':mail});
                                        break;
                                    case 3:$(value).find('p').html(data_server[1]['contact_link_site']);
                                        break;
                                }
                            });
                            table.append(column_table);
                            $('#contact-form').find('.checkbox-create').prop('checked', false);
                            
                        }
                        
                        
                    }
                    /**/
                },
                error: function(){
                    alert('ошибка');
                }
            });
            //запрещаем перезагрузку
            return false;
        });
        
        
        
    });
})

