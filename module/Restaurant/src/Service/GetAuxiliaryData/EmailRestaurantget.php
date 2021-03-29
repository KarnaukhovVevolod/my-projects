<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\GetAuxiliaryData;
use Restaurant\Entity\Emailrestaurant;

/**
 * Description of EmailRestaurant
 *
 * @author Seva
 */
class EmailRestaurantget {
    
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    //записали и получили или просто получили экземпляр класса email
    public function WriteInDatabase($dataEmail){
        $email = $dataEmail['email'];
        $was = 1;
        $db_emailrestaurant = $this->entityManager->createQueryBuilder()
                ->select('e')
                ->from(Emailrestaurant::class,'e')
                ->where("e.email = ?1")
                ->setParameter('1',$email);
        $get_db = $db_emailrestaurant->getQuery()->getResult();
        
        if($get_db == null){
            $Email = new Emailrestaurant(); 
            $Email->setActive(1)
                  ->setEmail($email);
            $this->entityManager->persist($Email);
            $this->entityManager->flush();
          
            $db_emailrestaurant = $this->entityManager->createQueryBuilder()
                ->select('e')
                ->from(Emailrestaurant::class,'e')
                ->where("e.email = ?1")
                ->setParameter('1',$email);
            $get_db = $db_emailrestaurant->getQuery()->getResult();
            $data_result = $get_db[0];
            $was = 0;
        }
        else{
            $data_result = $get_db[0];
        }
        /*
        else{
            $data_result = $get_db[0];
            debug($data_result);//die();
            $id = $data_result->getId();
            $active = $data_result->getActive();
            if($active == 1){
                
            }else{
                $data_result->setActive(1);
                debug($data_result);
                $this->entityManager->persist($data_result);
                $this->entityManager->flush();
            }
        }*/
        //debug('Обновилось');die();
        return [$data_result, $was];
    }
    
    //увеличиваем активность email пользователя +1
    public function increaseActiveEmail($dataEmail){
        $Email = $this->WriteInDatabase($dataEmail);
        $Email = $Email[0];
        $active = $Email->getActive() + 1;
        $Email->setActive($active);
        $this->entityManager->persist($Email);
        $this->entityManager->flush();
        return $Email;
    }
    
    //уменьшаем активность email пользователя -1
    public function reduceActiveEmail($dataEmail){
        $Email = $this->WriteInDatabase($dataEmail);
        $Email = $Email[0];
        $active = $Email->getActive();
        if( $active > 0 ){
            $active = $active - 1;
        }
        $Email->setActive($active);
        $this->entityManager->persist($Email);
        $this->entityManager->flush();
        return $Email;
    }
    
    //обнуляем активность email пользователя
    public function reset_to_zeroActiveEmail($dataEmail){
        $Email = $this->WriteInDatabase($dataEmail);
        $Email = $Email[0];
        $active = 0;
        
        $Email->setActive($active);
        $this->entityManager->persist($Email);
        $this->entityManager->flush();
        return $Email;
    }
}
