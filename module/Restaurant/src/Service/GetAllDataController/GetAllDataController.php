<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\GetAllDataController;
use Restaurant\Service\GetOneAction\About;
use Restaurant\Service\GetOneAction\Contact;
use Restaurant\Service\GetOneAction\Lifestyle;

use Restaurant\Service\DifferentOneClases\MenuSubscription;
use Restaurant\Service\GetAuxiliaryData\EmailRestaurantget;

use Restaurant\Service\GetAuxiliaryData\MainAuxiliary\MainAuxiliary;

use Restaurant\Service\LoadingDatabaseContact;
use Restaurant\Service\GetOneAction\Foods;
use Restaurant\Service\GetOneAction\Single;


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
    public function getDataAction($action, $param = null)
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
                $contact = new Contact($this->entityManager);
                $data = null;
                $data_action = $contact->getOneAction($data);
                break;
            case 'foods':
                $foods = new Foods($this->entityManager);
                $data = $param;
                $data_action = $foods->getOneAction($data);
                
                break;
            case 'lifestyle':
                $lifestyle = new Lifestyle($this->entityManager);
                $data = $param;
                //debug($data);
                //                die();
                $data_action = $lifestyle->getOneAction($data);
                break;
            case 'single':
                $single = new Single($this->entityManager);
                $data = $param;
                $data_action = $single->getOneAction($data);
                break;
            
            case 'menuSubscription':
                $menuSubscription = new MenuSubscription($this->entityManager);
                $data_action = $menuSubscription->getMenuSubscription();
                break;
                
        }
        return $data_action;
        
    }
    
    //записываем данные в базу данных
    public function writeDataBase($action ,$data)
    {
        switch($action){
            case 'contact':
                $contact = new LoadingDatabaseContact($this->entityManager);
                $contact->setDataContact();
                break;
            
        }
        return true;
        
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
