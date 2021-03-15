<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\GetAllDataController;
use Restaurant\Service\GetOneAction\About;
use Restaurant\Service\DifferentOneClases\MenuSubscription;
use Restaurant\Service\GetAuxiliaryData\EmailRestaurantget;

use Restaurant\Service\GetAuxiliaryData\MainAuxiliary\MainAuxiliary;
/**
 * Description of GetAllDataController
 *
 * @author Seva
 */
class GetAllDataController {
    //put your code here
    
    private $entityManager;
    
    public function __construct($entityManager){
        $this->entityManager = $entityManager;
    }
    
    /*--- данная структура представляет шаблон делегирования ---*/
    /*--- делегирует работу в разные классы ---*/
    public function getDataAction($action)
    {
        $data_action = null;
        switch ($action)
        {
            case 'index':
                break;
            case 'about':
                $about = new About($this->entityManager);
                $data = null;
                $data_action = $about->getOneAction($data);
                
                break;
            case 'contact':
                break;
            case 'foods':
                break;
            case 'lifestyle':
                break;
            case 'single':
                break;
            
            case 'menuSubscription':
                $menuSubscription = new MenuSubscription($this->entityManager);
                $data_action = $menuSubscription->getMenuSubscription();
                break;
                
        }
        return $data_action;
        
    }
    //запись или чтение вспомогательных данных
    public function loadDataBase($database, $data) //
    {
        switch ($database)
        {
            case 'emailRestaurant':
                //$email_write = new EmailRestaurantget($this->entityManager);
                //$data_ = $email_write->WriteInDatabase($data);
                $email_write = new MainAuxiliary($this->entityManager);
                $email_write->writeEmail($data);
                break;
        }
        return true;
        
    }
}
