<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\GetAuxiliaryData;

use Restaurant\Entity\SortedKindsOfEventsRestaurant;
 


/**
 * Description of SortedKindsOfEventsRestaurantget
 *
 * @author Seva
 */
class SortedKindsOfEventsRestaurantget {
    //put your code here
    
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function WriteInDatabase($photo, Object $typeEvent, $link, $numberOfPosts)
    {
        $typeEvent_id = $typeEvent->getId();
        
        $db_sorted_kinds_of_event_rest = $this->entityManager->createQueryBuilder()
            ->select('s')
            ->from(SortedKindsOfEventsRestaurant::class,'s')
            ->where("s.typeEvent = ?1")
            ->setParameter('1',$typeEvent_id);
        $get_db = $db_sorted_kinds_of_event_rest->getQuery()->getResult();
        if($get_db == null){
            $db_sorted_kinds_of = new SortedKindsOfEventsRestaurant();
            $db_sorted_kinds_of->setPhoto($photo)
                    ->setTypeEvent($typeEvent)
                    ->setLinkSortedTypeEvent($link)
                    ->setNumberOfPosts($numberOfPosts);
            $this->entityManager->persist($db_sorted_kinds_of);
            $this->entityManager->flush();
            
            $db_sorted_kinds_of_event_rest = $this->entityManager->createQueryBuilder()
                ->select('s')
                ->from(SortedKindsOfEventsRestaurant::class,'s')
                ->where("s.typeEvent = ?1")
                ->setParameter('1',$typeEvent_id);
            $get_db = $db_sorted_kinds_of_event_rest->getQuery()->getResult();
            $data_result = $get_db[0];
        }else{
            
            $data_result = $get_db[0];
        }
        
        return $data_result;
    }
    
    
}
