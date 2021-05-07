<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\GetAuxiliaryData;

use Restaurant\Entity\SortedKindsOfDishRestaurant;


/**
 * Description of SortedKindsOfDishRestaurantget
 *
 * @author Seva
 */
class SortedKindsOfDishRestaurantget {
    //put your code here
    
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function WriteInDatabase($photo, Object $type_foods, $linkSortedTypeDish, $numberOfVarietiesOfTheDish = '1'){
        $type_foods_id = $type_foods->getId();
        
        $db_sorted_kinds_of_foods_rest = $this->entityManager->createQueryBuilder()
            ->select('s')
            ->from(SortedKindsOfDishRestaurant::class,'s')
            ->where("s.typeDish = ?1")
            ->setParameter('1',$type_foods_id);
        $get_db = $db_sorted_kinds_of_foods_rest->getQuery()->getResult();
        
        if($get_db == null){
            $db_sorted_kinds_of = new SortedKindsOfDishRestaurant();
            $db_sorted_kinds_of->setPhoto($photo)
                    ->setLinkSortedTypeDish($linkSortedTypeDish)
                    ->setNumberOfVarietiesOfTheDish($numberOfVarietiesOfTheDish)
                    ->setTypeDish($type_foods);
                    
            $this->entityManager->persist($db_sorted_kinds_of);
            $this->entityManager->flush();
            
            $db_sorted_kinds_of_dish_rest = $this->entityManager->createQueryBuilder()
                ->select('s')
                ->from(SortedKindsOfDishRestaurant::class,'s')
                ->where("s.typeDish = ?1")
                ->setParameter('1',$type_foods_id);
            $get_db = $db_sorted_kinds_of_dish_rest->getQuery()->getResult();
            $data_result = $get_db[0];
        }else{
            
            $data_result = $get_db[0];
        }
        /**/
        return $data_result;
        
        
    }
    
}
