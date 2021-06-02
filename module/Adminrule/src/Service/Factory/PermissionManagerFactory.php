<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Service\Factory;

use Interop\Container\ContainerInterface;
use Adminrule\Service\PermissionManager;
use Adminrule\Service\RbacManager;

/**
 * Description of PermissionManagerFactory
 *
 * @author Seva
 */
class PermissionManagerFactory {
    //put your code here
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {        
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $rbacManager = $container->get(RbacManager::class);
        
        return new PermissionManager($entityManager, $rbacManager);
    }
}
