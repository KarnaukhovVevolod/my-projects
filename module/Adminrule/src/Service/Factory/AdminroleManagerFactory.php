<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Adminrule\Service\Factory;

use Interop\Container\ContainerInterface;
use Adminrule\Service\AdminroleManager;
use Adminrule\Service\RoleManager;
use Adminrule\Service\PermissionManager;

/**
 * Description of AdminroleManagerFactory
 *
 * @author Seva
 */
/**
 * This is the factory class for UserManager service. The purpose of the factory
 * is to instantiate the service and pass it dependencies (inject dependencies).
 */
class AdminroleManagerFactory {
    //put your code here
    /**
     * This method creates the UserManager service and returns its instance. 
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {        
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $roleManager = $container->get(RoleManager::class);
        $permissionManager = $container->get(PermissionManager::class);
        $viewRenderer = $container->get('ViewRenderer');
        $config = $container->get('Config');
        
        return new AdminroleManager($entityManager, $roleManager, $permissionManager, $viewRenderer, $config);
    }
}
