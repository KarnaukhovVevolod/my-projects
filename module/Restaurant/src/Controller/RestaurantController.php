<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Mail;
use Laminas\Math\Rand;

/**
 * Description of RestaurantController
 *
 * @author Seva
 */
class RestaurantController extends AbstractActionController {
    //put your code here
    
    public function indexAction()
    {
        return new ViewModel();
    }
}
