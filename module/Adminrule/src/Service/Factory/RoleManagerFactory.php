<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Service\Factory;

use Interop\Container\ContainerInterface;
use Adminrule\Service\RoleManager;
use Adminrule\Service\RbacManager;
/**
 * Description of RoleManagerFactory
 *
 * @author Seva
 */
/**
 * This is the factory class for RoleManager service. The purpose of the factory
 * is to instantiate the service and pass it dependencies (inject dependencies).
 */
class RoleManagerFactory {
    //put your code here
    /**
     * This method creates the UserManager service and returns its instance. 
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {        
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $rbacManager = $container->get(RbacManager::class);
                        
        return new RoleManager($entityManager, $rbacManager);
    }
}
