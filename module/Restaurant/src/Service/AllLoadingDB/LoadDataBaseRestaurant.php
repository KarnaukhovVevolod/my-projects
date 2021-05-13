<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\AllLoadingDB;

use Restaurant\Service\LoadingDatabaseManager;
use Restaurant\Service\LoadingDatabaseLifestyle;
use Restaurant\Service\LoadingDatabaseFoods;
use Restaurant\Service\LoadingDatabaseSingle; 
use Restaurant\Service\GetAuxiliaryData\PhotoFonAndSideMenu;
/**
 * Description of AboutUsRestaurant
 *
 * @author Seva
 */
class LoadDataBaseRestaurant {
    //put your code here
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }


    public function addAboutUsData()
    {
        $loading_db = new LoadingDatabaseManager($this->entityManager);
        //$loading_db->setDataPhoto();
        //$loading_db->setDataAboutUs();
        $loading_db->getAboutUsData();
    }
    
    public function addLifestyle()
    {
        $load_db = new LoadingDatabaseLifestyle($this->entityManager);
        
        //$load_db->setDataLifeStyle();
        $load_db->writeFonAndSideMenu();
        
    }
    public function addFoods()
    {
        $load_db = new LoadingDatabaseFoods($this->entityManager);
        $load_db->setDataDish();
        $load_db->writeFonAndSideMenu();
        
    }
    public function addSingleFoods()
    {
        $load_db = new LoadingDatabaseSingle($this->entityManager);
        //$load_db->writeFonAndSideMenu();
        //$load_db->setDataSingleFoods();
        $load_db->updateDataSingleFoods();
    }
    
    public function addSingleEvents()
    {
        $load_db = new LoadingDatabaseSingle($this->entityManager);
        //$load_db->setDataSingleLifestyle();
        $load_db->writeFonAndSideMenuEvents();
    }
    
    public function addIndex()
    {
        $load_db = new PhotoFonAndSideMenu($this->entityManager);
        $load_db->writePhotoFonIndex();
    }
    
}
