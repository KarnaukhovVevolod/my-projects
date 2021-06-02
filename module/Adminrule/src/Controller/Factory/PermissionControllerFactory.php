<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Adminrule\Controller\PermissionController;
use Adminrule\Service\PermissionManager;


/**
 * Description of PermissionController
 *
 * @author Seva
 */
class PermissionControllerFactory implements FactoryInterface {
    //put your code here
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $permissionManager = $container->get(PermissionManager::class);
        
        // Instantiate the controller and inject dependencies
        return new PermissionController($entityManager, $permissionManager);
    }
}
