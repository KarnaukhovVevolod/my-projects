<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\GetAuxiliaryData;

use Restaurant\Entity\MessagesFromUserRestaurant;

/**
 * Description of MessagesFURestaurantget
 *
 * @author Seva
 */
class MessagesFURestaurantget {
    //put your code here
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    //записываем сообщение от пользователя в базу
    public function writeMessage($message, Object $date,Object $email){
        $db_message = new MessagesFromUserRestaurant();
        $db_message->setAnswered(0)
                ->setDate($date)
                ->setEmail($email)
                ->setMessageSubjectUser($message['human_topic'])
                ->setNameUser($message['name_human'])
                ->setTextMessage($message['human_message']);
        $this->entityManager->persist($db_message);
        $this->entityManager->flush();
        
        return true;
    }
    
}
