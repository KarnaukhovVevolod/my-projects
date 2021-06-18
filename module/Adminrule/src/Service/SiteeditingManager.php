<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Service;

use Adminrule\Edite\ContactEdite;
use Adminrule\Repository\ProcessingFormEdite;

/**
 * Description of SiteeditingService
 *
 * @author Seva
 */
/* Шаблон делегирования */
class SiteeditingManager {
    //put your code here
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function GetDataAction($data){
        $action = $data['action'];
        
        switch($action){
            case('contact'):
                $contact = new ContactEdite($this->entityManager);
                $Data['limit'] = 10;
                $Data['start'] = 0;
                $data_result = $contact->ReadDatabase($Data);
                
                
                break;
            case('about'):
                
                break;
        }
        
        return $data_result;
    }
    
    public function ProcessingForm($data){
        $processing_form = new ProcessingFormEdite($this->entityManager);
        $result = $processing_form->processingForm($data);
        return $result;
        
    }
    
    
}
