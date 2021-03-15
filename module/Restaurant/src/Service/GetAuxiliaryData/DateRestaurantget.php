<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\GetAuxiliaryData;
use Restaurant\Entity\Daterestaurant;
/**
 * Description of DateRestaurantget
 *
 * @author Seva
 */
class DateRestaurantget {
    
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    //записали и получили или просто получили экземпляр класса email
    public function WriteInDatabase($date){
        
        $db_daterestaurant = $this->entityManager->createQueryBuilder()
                ->select('d')
                ->from(Daterestaurant::class,'d')
                ->where("d.date = ?1")
                ->setParameter('1',$date);
        $get_db = $db_daterestaurant->getQuery()->getResult();
        
        if($get_db == null){
            $Date = new Daterestaurant(); 
            $Date->setDate($date);
            $this->entityManager->persist($Date);
            $this->entityManager->flush();
          
            $db_daterestaurant = $this->entityManager->createQueryBuilder()
                ->select('d')
                ->from(Daterestaurant::class,'d')
                ->where("d.date = ?1")
                ->setParameter('1',$date);
            $get_db = $db_daterestaurant->getQuery()->getResult();
            $data_result = $get_db[0];
        }
        else{
            $data_result = $get_db[0];
        }
        
        return $data_result;
    }
    
    
    
    
    
}
