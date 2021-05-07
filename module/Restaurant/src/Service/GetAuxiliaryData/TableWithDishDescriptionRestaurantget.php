<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\GetAuxiliaryData;
use Restaurant\Entity\TableWithDishDescriptionRestaurant;

/**
 * Description of TableWithDishDescriptionRestaurantget
 *
 * @author Seva
 */
class TableWithDishDescriptionRestaurantget {
    //put your code here
    
    private $headDish1;
    private $headDish2;
    private $textDescription1;
    private $textDescription2;
    private $textDescription3;
    private $textDescription4;
    private $nameAutor;
    private $textAutora;
    private $photoAutor;
    private $photo1;
    private $photo2;
    private $dishId;
    
    
    private $entityManager;
    
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    public function WriteInDatabase(){
        $dish_id = $this->dishId->getId();
        
        $db_table_dish_description = $this->entityManager->createQueryBuilder()
                ->select('t')
                ->from(TableWithDishDescriptionRestaurant::class,'t')
                ->where("t.dishId = ?1")
                ->setParameter('1',$dish_id);
        
        $get_db = $db_table_dish_description->getQuery()->getResult();
        
        if($get_db == null){
            $table_with_dish_description = new TableWithDishDescriptionRestaurant();
            $table_with_dish_description
                ->setHeadDish1($this->headDish1)
                ->setHeadDish2($this->headDish2)
                ->setNameAutor($this->nameAutor)
                ->setPhoto1($this->photo1)
                ->setPhoto2($this->photo2)
                ->setPhotoAutor($this->photoAutor)
                ->setTextAutora($this->textAutora)
                ->setTextDescription1($this->textDescription1)
                ->setTextDescription2($this->textDescription2)
                ->setTextDescription3($this->textDescription3)
                ->setTextDescription4($this->textDescription4)
                ->setDishId($dish_id);
            $this->entityManager->persist($table_with_dish_description);
            $this->entityManager->flush();
            
            $db_table_dish_description = $this->entityManager->createQueryBuilder()
                ->select('t')
                ->from(TableWithDishDescriptionRestaurant::class,'t')
                ->where("t.dishId = ?1")
                ->setParameter('1',$dish_id);
            $get_db = $db_table_dish_description->getQuery()->getResult();
            $data_result = $get_db[0];
        }else{
            $data_result = $get_db[0];
        }
        return $data_result;
    }
    
    public function setHeadDish1($headDish1){
        $this->headDish1 = $headDish1;
        return $this;
    }
    public function setHeadDish2($headDish2){
        $this->headDish2 = $headDish2;
        return $this;
    }
    public function setNameAutor($nameAutor){
        $this->nameAutor = $nameAutor;
        return $this;
    }
    public function setPhoto1($photo1){
        $this->photo1 = $photo1;
        return $this;
    }
    public function setPhoto2($photo2){
        $this->photo2 = $photo2;
        return $this;
    }
    public function setPhotoAutor($photoAutor){
        $this->photoAutor = $photoAutor;
        return $this;
    }
    public function setTextAutora($textAutora){
        $this->textAutora = $textAutora;
        return $this;
    }
    public function setTextDescription1($textDescription1){
        $this->textDescription1 = $textDescription1;
        return $this;
    }
    public function setTextDescription2($textDescription2){
        $this->textDescription2 = $textDescription2;
        return $this;
    }
    public function setTextDescription3($textDescription3){
        $this->textDescription3 = $textDescription3;
        return $this;
    }
    public function setTextDescription4($textDescription4){
        $this->textDescription4 = $textDescription4;
        return $this;
    }
    public function setDishId($dishId){
        $this->dishId = $dishId;
        return $this;
    }
    
}
