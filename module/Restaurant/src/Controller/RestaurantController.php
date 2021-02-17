<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Controller;

use Zend\Mvc\Controller\AbstractActionController;
//use Zend\View\Model\ViewModel;
use Laminas\View\Model\ViewModel;
use Zend\Mail;
use Laminas\Math\Rand;

/**
 * Description of RestaurantController
 *
 * @author Seva
 */
class RestaurantController extends AbstractActionController {
    //put your code here
    public function onDispatch(\Laminas\Mvc\MvcEvent $e)
    {
        $response = parent::onDispatch($e);
        
        $this->layout()->setTemplate('layout/layout2');
        
        return $response;
    }
    public function indexAction()
    {
        //echo 'seva';die();
        return new ViewModel();
    }
    public function aboutAction()
    {
        return new ViewModel();
    }
    
    public function contactAction()
    {
        return new ViewModel();
    }
    public function foodsAction()
    {
        return new ViewModel();
    }
    public function lifestyleAction()
    {
        return new ViewModel();
    }
    public function singleAction()
    {
        return new ViewModel();
    }
    
}
