<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\GetAuxiliaryData;

use Restaurant\Entity\CategoryFoodsEventRestaurant;


/**
 * Description of CategoryFoodsEventRestaurantget
 *
 * @author Seva
 */
class CategoryFoodsEventRestaurantget {
    //put your code here
    
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function WriteInDatabase($dataTypeFoodsEvent){
        
        $db_category_foods_event = $this->entityManager->createQueryBuilder()
                ->select('c')
                ->from(CategoryFoodsEventRestaurant::class,'c')
                ->where("c.namecategory = ?1")
                ->setParameter('1',$dataTypeFoodsEvent[0]);
        $get_db = $db_category_foods_event->getQuery()->getResult();
        
        if ($get_db == null){
            $db_type_foods_event = new CategoryFoodsEventRestaurant();
            $db_type_foods_event->setNameCategory($dataTypeFoodsEvent[0])
                    ->setFoodsEvent($dataTypeFoodsEvent[1])
                    ->setLink($dataTypeFoodsEvent[2]);
            $this->entityManager->persist($db_type_foods_event);
            $this->entityManager->flush();
            
            $db_category_foods_event = $this->entityManager->createQueryBuilder()
                ->select('c')
                ->from(CategoryFoodsEventRestaurant::class,'c')
                ->where("c.namecategory = ?1")
                ->setParameter('1',$dataTypeFoodsEvent[0]);
            $get_db = $db_category_foods_event->getQuery()->getResult();
            $data_result = $get_db[0];
            
            
        }
        else{
            $data_result = $get_db[0];
        }
        
        return $data_result;
    }
    
    
}
