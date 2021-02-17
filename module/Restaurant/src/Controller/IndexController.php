<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
/**
 * Description of IndexController
 *
 * @author Seva
 */
class IndexController extends AbstractActionController {
    //put your code here
    
    /**
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;
    
    public function __construct($entityManager){
        $this->entityManager = $entityManager;
        
    }
    public function indexAction()
    {
        echo 'only hello';
        die();
        return new ViewModel();
    }
    
    public function onDispath(\Laminas\Mvc\MvcEvent $e)
    {
        $response = parent::onDispatch($e);
        
        $this->layout()->setTemplate('layout/layout2');
        
        return $response;
    }
    
}
