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

use Restaurant\Entity\Emailrestaurant;
use Restaurant\Entity\Daterestaurant;
use Restaurant\Entity\VisitorSubscriptionRestaurant;


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
        //debug('зашли');
        //die();/**/
        //проверяем несколькими запросами
        $Emailrest = new EmailRestaurantget($this->entityManager);
        
        $class_email = $Emailrest->WriteInDatabase($dataemail);
        
        if( $class_email[1] == 0 )//если такой email впервые был записан
        {
            $class_email = $class_email[0];
            //записываем дату
            $date = new \DateTime();
            //$date = $date->format('Y-m-d');
            //die();
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
            //$date = $date->format('Y-m-d');
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
    
}
