<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Restaurant\Service\GetAllDataController\GetAllDataController;
use Restaurant\Form\ContactForm;


/**
 * Description of SiteeditingController
 *
 * @author Seva
 */
class SiteeditingController extends AbstractActionController {
    //put your code here
    
    private $entityManager;
    
    private $getalldata;
    
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
        $this->getalldata = new GetAllDataController($entityManager);
    }
    
    public function onDispatch(\Laminas\Mvc\MvcEvent $e)
    {
        $response = parent::onDispatch($e);
        $this->layout()->setTemplate('layout/layout3');
    }
    
    public function contactAction()
    {
        $action = $this->url()->fromRoute('restaurant',['action'=>'contact']);
        $contact_form = new ContactForm($action);
        
        $data_action_contact = $this->getalldata->getDataAction('contact');
        
        return new ViewModel(['data_action'=>$data_action_contact, 'contact_form'=>$contact_form]);

    }
    
    
    
    
}
