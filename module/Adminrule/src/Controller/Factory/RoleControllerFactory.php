<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Adminrule\Controller\RoleController;
use Adminrule\Service\RoleManager;

/**
 * This is the factory for RoleController. Its purpose is to instantiate the
 * controller and inject dependencies into it.
 */
class RoleControllerFactory implements FactoryInterface {
    //put your code here
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $roleManager = $container->get(RoleManager::class);
        
        // Instantiate the controller and inject dependencies
        return new RoleController($entityManager, $roleManager);
    }
}
