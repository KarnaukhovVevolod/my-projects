<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Repository;

use Restaurant\Entity\PhotoFonRestaurant;
use Restaurant\Entity\Photorestaurant;
use Restaurant\Entity\ContactCompanyRestaurant;

/**
 * Description of WriteUpdateDatabase
 *
 * @author Seva
 */
class DatabaseContactPage {
    //put your code here
    
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function PhotoFon($data)
    {
        //return $data;
        //$action=null;
        if(isset($data['create_record'])){
            if( $data['create_record'] == 0 ){
                $action = 'update';
            }
            if( $data['create_record'] == 1 ){
                $action = 'create';
            }
            if( $data['create_record'] == 'delete' ){
                $action = 'delete'; 
            }
        }
        else{
            $action = 'delete';
        }
        
        //return[$action,$data];
        if($data['table_update'] == 'fon'){ // работаем с заголовочным изображением
            switch ($action){
                case('update'):
                    $data_page = $this->PhotoFonUpdate($data);
                    break;
                case('delete'):
                    $data_page = $this->PhotoFonDelete($data);
                    break;
                case('create'):
                    $data_page = $this->PhotoFonCreate($data);
                    break;
            }
        }
        if($data['table_update'] == 'image'){ // работаем с изображением
            switch($action){
                case('update'):
                    //$data['path'] = 'images/31-min.jpeg';
                    //return [1, $data]; 
                    $data_page = $this->PhotoUpdate($data);
                    break;
                case('delete'):
                    //return [1, $data];
                    $data_page = $this->PhotoDelete($data);
                    break;
                case('create'):
                    //$data['path'] = 'images/31-min.jpeg';
                    //$data['id'] = '107';
                    //return [1, $data];
                    $data_page = $this->PhotoCreate($data);
                    break;
            }
        }
        if($data['table_update'] == 'contact' ){
            //$data['path'] = 'images/blog-2.jpg';
            
            //$data['content_address_'] = $data['contact_content_address'];//$contactCompany->getContentWithAdress();
            //$data['content_address_decoder'] = htmlspecialchars($data['contact_content_address']);
        
            //return [1, $data];
            switch($action){
                case('create'):
                    $data_page = $this->ContactCreate($data);
                    break;
                case('update'):
                    $data_page = $this->ContactUpdate($data);
                    break;
                case('delete'):
                    $data_page = $this->ContactDelete($data);
                    break;
            }
        }
            
        
        
        return $data_page;
    }
    
    //функции для работы с заголовочным изображением
    public function PhotoFonUpdate($data)
    {
        //return $data;
        $photo = $this->entityManager->getRepository(Photorestaurant::class)->find($data['fon_id_photo']);
        if($photo == null){
            return [0,'error_id' => 'В базе данных нет такой записи с таким id (Фото в табл. id)'];
        }
        $fon_photo = $this->entityManager->getRepository(PhotoFonRestaurant::class)->find($data['id']);
        if($fon_photo == null){
            return [0,'error_id_fon' => 'В базе данных нет такой записи с таким id (id)'];
        }
        
        $fon_photo->setPage($data['fon_page'])
            ->setPhoto($photo);
        $this->entityManager->flush();
        $data['path'] = $photo->getPhoto();
        return [1, $data];
    }
    public function PhotoFonDelete($data)
    {   
        //return $data;
        
        $photo_fon = $this->entityManager->getRepository(PhotoFonRestaurant::class)->find($data['id']);
        //return $photo_fon->getId();
        $this->entityManager->remove($photo_fon);
        $this->entityManager->flush();
        return[ 1, 'запись удалена' ];
    }
    public function PhotoFonCreate($data)
    {
        $photo = $this->entityManager->getRepository(Photorestaurant::class)->find($data['fon_id_photo']);
        if($photo == null){
            return [0,'error_id' => 'В базе данных нет такой записи с таким id'];
        }
        $fon_photo = new PhotoFonRestaurant();
        $fon_photo->setPage($data['fon_page'])
                ->setPhoto($photo);
        $this->entityManager->persist($fon_photo);
        $this->entityManager->flush();
        
        $data['path'] = $photo->getPhoto();
        //$data['id'] = $this->entityManager->getConnection()->lastInsertId();
        $data['id'] = $fon_photo->getId();
        return [1, $data];
    }
    
    //функции для работы с изображением
    public function PhotoCreate($data){
        if(strlen($data['photo_user']['name']) > 140){
            $return_data[1]['photo_user'] = 'Имя файла должно быть не более 140 символов.';
            $return_data[0] = 0;
            return $return_data;
        }
        
        //$action_1 = explode('index.php', $data['action_img']);
        
        if($data['photo_user']['name'] != null){
            //$return_data['path'] = $action_1[0].'images/'.$data['photo_user']['name']; // '/restaurant/public/photo_comment/'.$get_data['photo_user']['name'];
            $path_photo = 'images/'.$data['photo_user']['name'];
        }
        else{
            $return_data[1] = ['form-file'=>['Загрузите фотографию']];
            $return_data[0] = 0;
            return $return_data;
        }
        
        $photoRestaurant = new Photorestaurant();
        $photoRestaurant->setPhoto($path_photo);
        $this->entityManager->persist($photoRestaurant);
        $this->entityManager->flush();
        $data['path'] = $path_photo; //$return_data['path'];
        $data['id'] = $photoRestaurant->getId();
        
        
        return [1, $data];
        
    }
    public function PhotoUpdate($data){
        
        //return $data;
        $photo = $this->entityManager->getRepository(Photorestaurant::class)->find($data['id']);
        if($photo == null){
            return [0,1=>['error_id' => ['В базе данных нет такой записи с таким id ']]];
        }
        $photo->setPhoto($data['image_path']);
        $this->entityManager->flush();
        $data['path'] = $photo->getPhoto();
        
        return [1, $data];
    }
    public function PhotoDelete($data){
        
        $photo = $this->entityManager->getRepository(Photorestaurant::class)->find($data['id']);
        //return $photo_fon->getId();
        $path = $photo->getPhoto();
        $this->entityManager->remove($photo);
        $this->entityManager->flush();
        //$fileName_exp = __DIR__.'/../../../../public/images/31-min.jpeg';
        //$fileName = __DIR__.'/../../../../public/'.$path;
        //if(file_exists($fileName)){
        //    unlink($fileName);
        //}
        
        return[ 1, 'запись удалена' ];
        
    }
    
    //Функции для работы с контактами
    public function ContactCreate($data){
        $photo = $this->entityManager->getRepository(Photorestaurant::class)->find($data['contact_photo_path_head']);
        if($photo == null){
            return [0,'error_id' => 'В таблице с фотографий нет записи с таким id'];
        }
        
        $contactCompany = new ContactCompanyRestaurant();
        $contactCompany
            ->setPhotoHeadId($photo)
            ->setContentWithAdress($data['contact_content_address'])
            ->setAdressCompanyText($data['contact_address'])
            ->setTelephoneCompany($data['contact_telephone_company'])
            ->setEmailCompany($data['contact_email_company'])
            ->setLinkAdressSite($data['contact_link_site'])
            ;
        $this->entityManager->persist($contactCompany);
        $this->entityManager->flush();
        $data['id'] = $contactCompany->getId();
        $data['path'] = $photo->getPhoto();
        $data['content_address_'] = $contactCompany->getContentWithAdress();
        //$data['content_address_decoder'] = htmlspecialchars($contactCompany->getContentWithAdress());
        
        return[1, $data];
    }
    public function ContactUpdate($data){
        $photo = $this->entityManager->getRepository(Photorestaurant::class)->find($data['contact_photo_path_head']);
        if($photo == null){
            return [0,'error_id' => 'В таблицы фото нет записи с таким id'];
        }
        $contact_company = $this->entityManager->getRepository(ContactCompanyRestaurant::class)->find($data['id']);
        if($contact_company == null){
            return [0,'error_contact' => 'В таблице contact нет такой записи с таким id (id)'];
        }
        $contact_company->setPhotoHeadId($photo)
            ->setContentWithAdress($data['contact_content_address'])
            ->setAdressCompanyText($data['contact_address'])
            ->setTelephoneCompany($data['contact_telephone_company'])
            ->setEmailCompany($data['contact_email_company'])
            ->setLinkAdressSite($data['contact_link_site']);
        $this->entityManager->flush();
        $data['id'] = $contact_company->getId();
        $data['path'] = $photo->getPhoto();
        $data['content_address_'] = $contact_company->getContentWithAdress();
        //$data['content_address_decoder'] = htmlspecialchars($contact_company->getContentWithAdress());
        
        return[1, $data];
    }
    public function ContactDelete($data){
        $contactCompany = $this->entityManager->getRepository(ContactCompanyRestaurant::class)->find($data['id']);
        //return $photo_fon->getId();
        if($contactCompany == null){
            return[0,'Нет записи в таблице контакт с таким id'];
        }
        $this->entityManager->remove($contactCompany);
        $this->entityManager->flush();
        return [1, 'Запись удалена'];
    }
    
}
