<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\FormProcessing;

use Restaurant\Form\ComentForm;
use Restaurant\Service\GetAuxiliaryData\DateRestaurantget;
use Restaurant\Entity\PhotoCommentRestaurant;
use Restaurant\Service\GetAuxiliaryData\EmailRestaurantget;
use Restaurant\Entity\CommentDishRestaurant;
use Restaurant\Entity\CommentOnCommentDishRestaurant;
use Restaurant\Entity\CommentEventRestaurant;
use Restaurant\Entity\CommentOnCommentEventRestaurant;
use Restaurant\Entity\TableWithDishDescriptionRestaurant;
use Restaurant\Entity\TableWithEventDescriptionRestaurant;
/**
 * Description of ProcessingSingleForm
 *
 * @author Seva
 */

class ProcessingSingleForm {
    //put your code here
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function ProcessingForm($data, $action)
    {
        $comment_form = new ComentForm($action);
        //объединяем данные с формы с данными файла
        ///$return_data[6] = $data;
        
        if(strlen($data['photo_user']['name']) > 140){
            $return_data['photo_user'][4] = 'Имя файла должно быть не более 140 символов.';
            $return_data[0] = 1;
            return $return_data;
        }
        
        $comment_form->setData($data);
        //$comment_form->setData($data['form']);
        if($comment_form->isValid()){
            $get_data = $comment_form->getData();
            /*
            if(isset($get_data['photo_user']['name']) && $get_data['photo_user']['name'] != null){
                /*   
                if(file_exists("public/photo_comment/")){
                    //debug('папка существует');
                    //debug($get_data);//die();
                }else{
                    //debug('папки не существует');die();
                }
                
                $path = "public/photo_comment/".$get_data['photo_user']['name'];

                $allowedExtension = ['jpg','jpeg','png'];
                $extension = explode('.', $get_data['photo_user']['name']);
                $extension = end($extension);
                $fileName = $get_data['photo_user']['name'];
                if(0 === $get_data['photo_user']['error'] && in_array($extension, $allowedExtension)){
                    move_uploaded_file($get_data['photo_user']['tmp_name'], $path);
                    //debug('Загрузил фото');
                    $return_data[7] = $path; //добавляем путь к фото
                }else{
                    $return_data[3] = 'Доступные форматы для фото jpg, jpeg, png';
                    $return_data[0] = 1;
                    return $return_data;
                }
            *1/
                
            }*/
            $action_1 = explode('index.php', $action);
            $return_data[0] = 0;
            $return_data[1] = 'Сообщение отправлено';
            $Date = new \DateTime();
            $date_object = $this->updateDate($Date);//плучаем объект даты
            
            if($get_data['photo_user']['name'] != null){
                $return_data['path'] = $action_1[0].'photo_comment/'.$get_data['photo_user']['name']; // '/restaurant/public/photo_comment/'.$get_data['photo_user']['name'];
                $path_photo = 'photo_comment/'.$get_data['photo_user']['name'];
                $photo_object = $this->updatePhotoComment($path_photo);
            }
            else{
                $return_data['path'] = null;
                $photo_object = null;
            }
            if($get_data['email_user_comment'] != null && $get_data != "" ){
                $email_user['email'] = $get_data['email_user_comment'];
                $email_object = $this->updateEmail($email_user);
            }else{
                $email_object = null;
            }
            
            $comment['nameUser'] = $get_data['name_user_comment'];
            $comment['messageUser'] = $get_data['message_user_comment'];
            $comment['photoUser'] = $photo_object;
            $comment['email'] = $email_object;
            $comment['dateMessage'] = $date_object;
            $comment['reply'] = $get_data['reply_name'];
            $comment['idDescriptionDish'] = (int) $get_data['id_descriptionDish'];
            $comment['idCommentDish'] = (int) $get_data['id_commentDish'];
            $comment['idDescriptionEvent'] = (int) $get_data['id_descriptionDish'];
            $comment['idCommentEvent'] = (int) $get_data['id_commentDish'];
            if( $get_data['reply'] == 0 ){ //записываем 
                if($get_data['foods-life'] == 1){
                    $comment_object = $this->updateCommentAll('commentDish', $comment);
                    $id = $comment_object->getId();
                }else{
                    $comment_object = $this->updateCommentAll('commentEvent', $comment);
                    $id = $comment_object->getId();
                }
                //$id = 1;
                $return_data['id'] = $id;
            }else{
                if($get_data['foods-life'] == 1){
                    $comment_object = $this->updateCommentAll('commentOnDish', $comment);
                    
                }else{
                    $comment_object = $this->updateCommentAll('commentOnEvent', $comment);
                    
                }
                $return_data['id'] = null;
            }
            
            $return_data['date'] = $Date->format('Y-m-d');
            $return_data[6] = $get_data;
            return $return_data;
        }
        else {
            $message_error = $comment_form->getMessages();
            
            $return_data = $this->messageError($message_error);
            $return_data[0] = 1;
            $return_data[6] = $message_error;
            //$get_data = 'ошибка валидации';
            //$return_data = [0=>1,'1'=>'name','2'=>'message','3'=>'photo','4'=>'email',5=>'CSRF',6=>'Ошибка другая',7=>$message_error];
            //die();
            return $return_data;
        }
    
    }
    //Сообщения об ошибках переписываем на русский язык
    public function messageError($message_error){ //переписывает ошибки на русский язык
        if(isset($message_error['csrf'])){
            $return_data[5] = 'Ошибка с формой. Перезагрузите страницу и заново отправьте сообщение.';   
        }
        if(isset($message_error['reply_name'])){
            if(isset($message_error['reply_name']['stringLengthTooLong'])){
                $return_data[5] = 'Ошибка. Имя комментария на который вы отвечаете более 100 символов.';
                
            }
        }
        if(isset($message_error['name_user_comment'])){
            if(isset($message_error['name_user_comment']['isEmpty'])){
                $return_data[1] = 'Это поле необходимо заполнить';
            }
            if(isset($message_error['name_user_comment']['stringLengthTooLong'])){
                $return_data[1] = 'Слишком длинное Имя фамилия (не более 100 символов)'; 
            }
        }
        if(isset($message_error['message_user_comment'])){
            if(isset($message_error['message_user_comment']['isEmpty'])){
                $return_data[2] = 'Это поле необходимо заполнить';
            }
            if(isset($message_error['message_user_comment']['stringLengthTooLong'])){
                $return_data[2] = 'Слишком длинный комментарий (не более 1000 символов)'; 
            }
        }
        if(isset($message_error['email_user_comment'])){
            //$return_data
            if(isset($message_error['email_user_comment']['emailAddressInvalidFormat'])){
                $return_data[4] = 'Неверный E-mail формат';
            }
            if(isset($message_error['email_user_comment']['emailAddressLengthExceeded'])){
                $return_data[4] = 'Слишком длинный E-mail адрес (не более 100 символов)';
            }
        }
        if(isset($message_error['photo_user'])){
            if(isset($message_error['photo_user']['fileImageSizeNotDetected'])){
                $return_data['photo_user'][1] = 'Размер изображения невозможно определить';    
            }
            if(isset($message_error['photo_user']['fileIsImageFalseType'])){
                $return_data['photo_user'][2] = 'Файл не является изображением. Неверный формат.';
            }
            if(isset($message_error['photo_user']['fileMimeTypeFalse'])){
                $return_data['photo_user'][3] = 'Неверный формат для фото. Доступный формат для фото: jpg, jpeg, png.';
            }
            if(isset($message_error['photo_user']['fileImageSizeHeightTooSmall'])){
                $return_data['photo_user'][4] = 'Фото по вертикали слишком маленькое. Минимальный размер фото по вертикали 32px. ';
            }
            if(isset($message_error['photo_user']['fileImageSizeWidthTooSmall'])){
                $return_data['photo_user'][4] = $return_data['photo_user'][4] . 'Фото по горизонтали слишком маленькое. Минимальный размер фото по горизонтали 32px. ';
            }
            if(isset($message_error['photo_user']['fileImageSizeHeightTooBig'])){
                $return_data['photo_user'][4] = 'Фото по вертикали слишком большое. Максимальный размер фото по вертикали 4096px. ';
            }
            if(isset($message_error['photo_user']['fileImageSizeWidthTooBig'])){
                $return_data['photo_user'][4] = $return_data['photo_user'][4] . 'Фото по горизонтали слишком большое. Максимальный размер фото по горизонтали 4096px. ';
            }
            
        }
        return $return_data;    
    }
    
    //вставить комментарий в таблицу photo_comment_restaurant
    public function updatePhotoComment($photo_name){
        $photo_comment = $this->entityManager->createQueryBuilder()
            ->select('photo')
            ->from(PhotoCommentRestaurant::class,'photo')
            ->where('photo.photo = ?1')    
            ->setParameter('1', $photo_name)
            ->setMaxResults(1);
        $get_db = $photo_comment->getQuery()->getResult();
        
        if( $get_db == null ){ //если нету такой записи, то записываем
            $photo_comment = new PhotoCommentRestaurant();
            $photo_comment->setPhoto($photo_name);
            $this->entityManager->persist($photo_comment);
            $this->entityManager->flush();
            
            $get_db_photo = $this->entityManager->createQueryBuilder()
                    ->select('photo')
                    ->from(PhotoCommentRestaurant::class, 'photo')
                    ->where('photo.photo = ?1')
                    ->setParameter('1', $photo_name)
                    ->orderBy('photo.id','DESC')
                    ->setMaxResults(1);
            $get_db = $get_db_photo->getQuery()->getResult();
            
        }
        return $get_db[0];
    }
    
    //вставить дату в таблицу
    public function updateDate($date){
        $current_date = new DateRestaurantget($this->entityManager);
        $get_db = $current_date->WriteInDatabase($date);
        return $get_db;
    }
    //вставим email в таблицу
    public function updateEmail($email1){
        $email = new EmailRestaurantget($this->entityManager);
        $get_db = $email->WriteInDatabase($email1);
        return $get_db[0];
    }
    //Создаём запрос сразу для 4-х таблиц комментариев
    public function updateCommentAll($table, $comment){
        switch($table){
            case 'commentDish':
                $classComment = new CommentDishRestaurant();
                $id_desc_dish = $this->entityManager->getRepository(TableWithDishDescriptionRestaurant::class)
                        ->find($comment['idDescriptionDish']); 
                $classComment->setIdDescriptionDish($id_desc_dish);
                break;
            case 'commentOnDish':
                $classComment = new CommentOnCommentDishRestaurant();
                $id_comment_dish = $this->entityManager->getRepository(CommentDishRestaurant::class)
                        ->find($comment['idCommentDish']);
                $classComment->setIdCommentDish($id_comment_dish)
                    ->setReply($comment['reply']);
                break;
            case 'commentEvent':
                $classComment = new CommentEventRestaurant();
                $id_desc_event = $this->entityManager->getRepository(TableWithEventDescriptionRestaurant::class)
                        ->find($comment['idDescriptionEvent']);
                $classComment->setIdDescriptionEvent($id_desc_event);
                break;
            case 'commentOnEvent':
                $classComment = new CommentOnCommentEventRestaurant();
                $id_comment_event = $this->entityManager->getRepository(CommentEventRestaurant::class)
                        ->find($comment['idCommentEvent']);
                $classComment->setIdCommentEvent($id_comment_event)
                    ->setReply($comment['reply']);
                break;
        }
        $classComment->setNameUser($comment['nameUser'])
                ->setMessageUser($comment['messageUser'])
                ->setPhotoUser($comment['photoUser'])
                ->setEmail($comment['email'])
                ->setDateMessage($comment['dateMessage']);
        $this->entityManager->persist($classComment);
        $this->entityManager->flush();
        
        if( $table == 'commentDish' || $table == 'commentEvent' ){
            $get_comment = $this->entityManager->createQueryBuilder()
                    ->select('comment')        
                    ->orderBy('comment.id', 'DESC')
                    ->setMaxResults(1);
            if( $table == 'commentDish' ){
                $get_comment->from(CommentDishRestaurant::class,'comment');
            }else{
                $get_comment->from(CommentEventRestaurant::class,'comment');
            }
            $get_db = $get_comment->getQuery()->getResult();
        }
        else{
            $get_db[0] = null;
        }
        return $get_db[0];
    }
    /*
    //вставляем комментарий в таблицу comment_dish_restaurant
    public function updateCommentDish($commentDish){
        //записываем комментарий 
        $class_commentDish = new CommentDishRestaurant();
        $class_commentDish->setNameUser($commentDish['nameUser'])
                ->setMessageUser($commentDish['messageUser'])
                ->setPhotoUser($commentDish['photoUser'])
                ->setEmail($commentDish['email'])
                ->setDateMessage($commentDish['dateMessage'])
                ->setIdDescriptionDish($commentDish['idDescriptionDish']);
        $this->entityManager->persist($class_commentDish);
        $this->entityManager->flush();
        //считываем последний комментарий
        $get_comment = $this->entityManager->createQueryBuilder()
                ->select('comment')
                ->from(CommentDishRestaurant::class,'comment')
                ->orderBy('comment.id', 'DESC')
                ->setMaxResults(1);
        $get_db = $get_comment->getQuery()->getResult();
        return $get_db[0];
    }
    
    //вставляем комментарий в таблицу comment_on_comment_dish_restaurant
    public function updateCommentOnDish($commentOnDish){
        //записываем комментарий
        $class_commentOnDish = new CommentOnCommentDishRestaurant();
        $class_commentOnDish->setNameUser($commentOnDish['nameUser'])
                ->setMessageUser($commentOnDish['messageUser'])
                ->setPhotoUser($commentOnDish['photoUser'])
                ->setEmail($commentOnDish['email'])
                ->setDateMessage($commentOnDish['dateMessage'])
                ->setIdCommentDish($commentOnDish['idCommentDish'])
                ->setReply($commentOnDish['reply']);
        $this->entityManager->persist($class_commentOnDish);
        $this->entityManager->flush();
        
        //считываем последний комментарий
        //$get_comment = $this->entityManager->createQueryBuilder()
        //        ->select('comment')
        //        ->from(CommentOnCommentDishRestaurant::class,'comment')
        //        ->orderBy('comment.id', 'DESC')
        //        ->setMaxResults(1);
        //$get_db = $get_comment->getQuery()->getResult();
        //return $get_db[0];
         
        return null;
    }
    
    // вставляем комментарий в таблицу comment_event_restaurant
    public function updateCommentEvent($commentEvent){
         //записываем комментарий 
        $class_commentEvent = new CommentEventRestaurant();
        $class_commentEvent->setNameUser($commentEvent['nameUser'])
                ->setMessageUser($commentEvent['messageUser'])
                ->setPhotoUser($commentEvent['photoUser'])
                ->setEmail($commentEvent['email'])
                ->setDateMessage($commentEvent['dateMessage'])
                ->setIdDescriptionEvent($commentEvent['idDescriptionEvent']);
        $this->entityManager->persist($class_commentEvent);
        $this->entityManager->flush();
        //считываем последний комментарий
        $get_comment = $this->entityManager->createQueryBuilder()
                ->select('comment')
                ->from(CommentEventRestaurant::class,'comment')
                ->orderBy('comment.id', 'DESC')
                ->setMaxResults(1);
        $get_db = $get_comment->getQuery()->getResult();
        return $get_db[0];
    }
    
    //вставляем комментарий в таблицу comment_on_comment_event_restaurant
    public function updateCommentOnEvent($commentOnEvent){
        //записываем комментарий
        $class_commentOnEvent = new CommentOnCommentEventRestaurant();
        $class_commentOnEvent->setNameUser($commentOnEvent['nameUser'])
                ->setMessageUser($commentOnEvent['messageUser'])
                ->setPhotoUser($commentOnEvent['photoUser'])
                ->setEmail($commentOnEvent['email'])
                ->setDateMessage($commentOnEvent['dateMessage'])
                ->setIdCommentEvent($commentOnEvent['idCommentEvent'])
                ->setReply($commentOnEvent['reply']);
        $this->entityManager->persist($class_commentOnDish);
        $this->entityManager->flush();
        
        //считываем последний комментарий
        //$get_comment = $this->entityManager->createQueryBuilder()
        //        ->select('comment')
        //        ->from(CommentOnCommentEventRestaurant::class,'comment')
        //        ->orderBy('comment.id', 'DESC')
        //        ->setMaxResults(1);
        //$get_db = $get_comment->getQuery()->getResult();
        //return $get_db[0];
        
        //return null;
    }
    */
}
