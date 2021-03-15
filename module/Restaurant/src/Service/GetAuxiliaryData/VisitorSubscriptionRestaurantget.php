<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\GetAuxiliaryData;

use Restaurant\Entity\VisitorSubscriptionRestaurant;


/**
 * Description of VisitorSubscriptionRestaurantget
 *
 * @author Seva
 */
class VisitorSubscriptionRestaurantget {
    
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    //подписали email на рассылку новостей
    public function WriteInDatabase_subscribe($date,$email){
        $email_id = $email->getId();
        
        $db_subscriptionrestaurant = $this->entityManager->createQueryBuilder()
                ->select('r')
                ->from(VisitorSubscriptionRestaurant::class,'r')
                ->where("r.email = ?1")
                ->setParameter('1',$email_id)
                ->setMaxResults(1);
                
        $get_db = $db_subscriptionrestaurant->getQuery()->getResult();
        
        if($get_db == null){
            $Subscription = new VisitorSubscriptionRestaurant(); 
            $Subscription->setSigned(1)
                  ->setEmail($email)
                  ->setDate($date);
            $this->entityManager->persist($Subscription);
            $this->entityManager->flush();
          
        }
        else{
            $data_result = $get_db[0];
            if($data_result->getSigned() == 0 || $data_result->getSigned() == false)
            {
                $data_result->setSigned(1);
                $this->entityManager->persist($data_result);
                $this->entityManager->flush();
            }
        }
        
        return true;
    }
    
    //отписали email с рассылки новостей
    public function WriteInDatabase_unsubscribe($date,$email){
        $email_id = $email->getId();
        
        $db_subscriptionrestaurant = $this->entityManager->createQueryBuilder()
                ->select('r')
                ->from(VisitorSubscriptionRestaurant::class,'r')
                ->where("r.email = ?1")
                ->setParameter('1',$email_id)
                ->setMaxResults(1);
                
        $get_db = $db_subscriptionrestaurant->getQuery()->getResult();
        
        if($get_db == null){
            $Subscription = new VisitorSubscriptionRestaurant(); 
            $Subscription->setSigned(0)
                  ->setEmail($email)
                  ->setDate($date);
            $this->entityManager->persist($Subscription);
            $this->entityManager->flush();
          
        }
        else{
            $data_result = $get_db[0];
            if($data_result->getSigned() == 1 || $data_result->getSigned() == true)
            {
                $data_result->setSigned(0);
                $this->entityManager->persist($data_result);
                $this->entityManager->flush();
            }
        }
        
        return true;
    }
}
