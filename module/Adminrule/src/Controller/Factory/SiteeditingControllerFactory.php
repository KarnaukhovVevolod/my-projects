<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Controller\Factory;

use Adminrule\Controller\SiteeditingController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\Factoryinterface;


/**
 * Description of SiteeditingControllerFactory
 *
 * @author Seva
 */
class SiteeditingControllerFactory implements FactoryInterface {
    //put your code here
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        
        return new SiteeditingController($entityManager);
    }
}
