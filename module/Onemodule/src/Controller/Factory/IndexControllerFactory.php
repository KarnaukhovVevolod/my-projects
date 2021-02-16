<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Onemodule\Controller\IndexController;

class IndexControllerFactory implements FactoryInterface {
    //put your code here
    
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null){
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        
        return new IndexController($entityManager);
    }
}
