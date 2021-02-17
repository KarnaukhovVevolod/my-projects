<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Restaurant\Controller\IndexController;
/**
 * Description of IndexControllerFactory
 *
 * @author Seva
 */
class IndexControllerFactory implements FactoryInterface {
    //put your code here
    
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        //$this->layout()->set
        return new IndexController($entityManager);
    }
}
