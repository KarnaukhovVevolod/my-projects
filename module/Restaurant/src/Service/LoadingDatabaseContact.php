<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service;

use Restaurant\Entity\Photorestaurant;
use Restaurant\Entity\ContactCompanyRestaurant;

/**
 * Description of LoadingDatabaseContact
 *
 * @author Seva
 */
class LoadingDatabaseContact {
    //put your code here
    
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function setDataContact()
    {
        $contact = new ContactCompanyRestaurant();
        
        $photo_restaurant = $this->entityManager
                ->getRepository(Photorestaurant::class)->find('16');
        debug($photo_restaurant);
                //die();
        $contentWithAdress = "<img src= '/restaurant/public/images/Moscow.png' class='image address' >" ;
        $contact1 = $this->entityManager
                ->getRepository(ContactCompanyRestaurant::class)->find(1);
        $contact1->setPhotoHeadId($photo_restaurant)
                ->setContentWithAdress($contentWithAdress)
                ->setAdressCompanyText('г. Москва ул.Енисейского <br> дом Полицейского №8')
                ->setTelephoneCompany('+7(495)-333-44-67 <br> +7(495)-123-45-67')
                ->setEmailCompany("emailcompany@mail.com")
                ->setLinkAdressSite("<a href='/restaurant/public/index.php/restaurant')>adress your website</a>");
        $this->entityManager->persist($contact1);
        $this->entityManager->flush();
        debug('Загрузили');die();
    }
    
}
