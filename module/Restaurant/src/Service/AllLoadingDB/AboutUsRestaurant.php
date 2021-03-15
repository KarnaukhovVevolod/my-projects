<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\AllLoadingDB;

use Restaurant\Service\LoadingDatabaseManager;
/**
 * Description of AboutUsRestaurant
 *
 * @author Seva
 */
class AboutUsRestaurant {
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
}
