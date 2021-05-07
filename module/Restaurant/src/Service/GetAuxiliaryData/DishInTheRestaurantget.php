<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\GetAuxiliaryData;

use Restaurant\Entity\DishInTheRestaurant;
/**
 * Description of DishInTheRestaurantget
 *
 * @author Seva
 */
class DishInTheRestaurantget {
    //put your code here
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function WriteInDatabase($dishName, $linkToDish, $priceDish, $thePopularityOfTheDish = '1',
            $recipe, $photoForDish, Object $typeDish){
        $dish_sort_id = $typeDish->getId();
        $db_dish_in_the_rest = $this->entityManager->createQueryBuilder()
            ->select('d')
            ->from(DishInTheRestaurant::class,'d')
            ->where("d.typeDish = ?1")
            ->andWhere("d.dishName = ?2")
            ->setParameter('1', $dish_sort_id)
            ->setParameter('2', $dishName);
        $get_db = $db_dish_in_the_rest->getQuery()->getResult();
        
        if( $get_db == null ){
            $dbDishInTheRestaurant = new DishInTheRestaurant();
            $dbDishInTheRestaurant->setDishName($dishName)
                    ->setLinkToDish($linkToDish)
                    ->setPhotoForDish($photoForDish)
                    ->setPriceDish($priceDish)
                    ->setRecipe($recipe)
                    ->setThePopularityOfTheDish($thePopularityOfTheDish)
                    ->setTypeDish($typeDish);
            $this->entityManager->persist($dbDishInTheRestaurant);
            $this->entityManager->flush();
            
            $db_dish_in_the_rest = $this->entityManager->createQueryBuilder()
            ->select('d')
            ->from(DishInTheRestaurant::class,'d')
            ->where("d.typeDish = ?1")
            ->andWhere("d.dishName = ?2")
            ->setParameter('1', $dish_sort_id)
            ->setParameter('2', $dishName);
            $get_db = $db_dish_in_the_rest->getQuery()->getResult();
            
            $data_result = $get_db[0];
        }else{
            $data_result = $get_db[0];
        }
        
        return $data_result;
    }
    
}
