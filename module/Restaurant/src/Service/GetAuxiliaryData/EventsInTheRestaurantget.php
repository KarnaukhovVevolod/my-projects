<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\GetAuxiliaryData;

use Restaurant\Entity\EventsInTheRestaurant;



/**
 * Description of EventsInTheRestaurant
 *
 * @author Seva
 */
class EventsInTheRestaurantget {
    //put your code here
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function WriteInDatabase($photo, Object $type_sort, $date, $event_name, $brief_description, $link_to_event, $the_popularity)
    {
        $type_sort_id = $type_sort->getId();
        $db_event_in_the_rest = $this->entityManager->createQueryBuilder()
                ->select('e')
                ->from(EventsInTheRestaurant::class,'e')
                ->where("e.typeEvent = ?1")
                ->andWhere("e.eventName = ?2")
                ->setParameter('1', $type_sort_id)
                ->setParameter('2',$event_name);
        $get_db = $db_event_in_the_rest->getQuery()->getResult();
        
        if( $get_db == null ){
            $dbEventInTheRestaurant = new EventsInTheRestaurant();
            $dbEventInTheRestaurant->setBrefDescriptionEvent($brief_description)
                    ->setDateEvent($date)
                    ->setEventName($event_name)
                    ->setPhotoForEvents($photo)
                    ->setTypeEvent($type_sort)
                    ->setLinkToEvent($link_to_event)
                    ->setThePopularityOfTheEvent($the_popularity);
            $this->entityManager->persist($dbEventInTheRestaurant);
            $this->entityManager->flush();
            
            $db_event_in_the_rest = $this->entityManager->createQueryBuilder()
                ->select('e')
                ->from(EventsInTheRestaurant::class,'e')
                ->where("e.typeEvent = ?1")
                ->andWhere("e.eventName = ?2")
                ->setParameter('1', $type_sort_id)
                ->setParameter('2',$event_name);
            $get_db = $db_event_in_the_rest->getQuery()->getResult();
        
            $data_result = $get_db[0];
            
        }
        else{
            $data_result = $get_db[0];
        }
        
        return $data_result;
    }
    
}
