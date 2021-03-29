<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\GetAuxiliaryData\MainAuxiliary;

use Restaurant\Service\GetAuxiliaryData\DateRestaurantget;
use Restaurant\Service\GetAuxiliaryData\VisitorSubscriptionRestaurantget;
use Restaurant\Service\GetAuxiliaryData\EmailRestaurantget;
use Restaurant\Service\GetAuxiliaryData\MessagesFURestaurantget;


/**
 * 
 * Description of MainAuxiliary
 *
 * @author Seva
 */

/*описываем поведение описанных выше классов (похоже на структурный шаблон)*/
class MainAuxiliary {
    
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    /*записываем данные (email подписчика) в базу */
    
    public function writeEmail($dataemail)
    {
        $Emailrest = new EmailRestaurantget($this->entityManager);
        $class_email = $Emailrest->WriteInDatabase($dataemail);
        if( $class_email[1] == 0 )//если такой email впервые был записан
        {
            $class_email = $class_email[0];
            //записываем дату
            $date = new \DateTime();
            $Daterest = new DateRestaurantget($this->entityManager);
            $class_date = $Daterest->WriteInDatabase($date);
            //записываем связи и подписку
            $Visitor = new VisitorSubscriptionRestaurantget($this->entityManager);
            $Visitor->WriteInDatabase_subscribe($class_date, $class_email);
        }
        else
        {
            $class_email = $class_email[0];
            //записываем дату
            $date = new \DateTime();
            $Daterest = new DateRestaurantget($this->entityManager);
            $class_date = $Daterest->WriteInDatabase($date);
            //записываем связи и подписку
            $Visitor = new VisitorSubscriptionRestaurantget($this->entityManager);
            $Visitor->WriteInDatabase_subscribe($class_date, $class_email);
        }
        
        
        //проверяем одним запросом
        /*$get_all_data_email = $this->entityManager
                ->createQueryBuilder()
                ->select('e')
                ->from(Emailrestaurant::class,'e')
                ->leftjoin('e.id',)
        */
        //debug('Успешно прошло');
        //die();
    }
    
    /* записываем сообщение от пользователя (страница контакты) в базу */
    public function writeMessageContact($message)
    {
        $dataemail['email'] = $message['human_email'];
        $Emailrest = new EmailRestaurantget($this->entityManager);
        $class_email = $Emailrest->increaseActiveEmail($dataemail);
        
        //записываем дату
        $date = new \DateTime();
        $Daterest = new DateRestaurantget($this->entityManager);
        $class_date = $Daterest->WriteInDatabase($date);
        //записываем связи и подписку
        $MessagesFURest_get = new MessagesFURestaurantget($this->entityManager);
        $MessagesFURest_get->writeMessage($message, $class_date, $class_email);
        
    }
    
}
