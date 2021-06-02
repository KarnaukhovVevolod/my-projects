<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Controller\Factory;

use Interop\Container\ContainerInterface;
use Adminrule\Controller\AuthController;
use Zend\ServiceManager\Factory\FactoryInterface;
use Adminrule\Service\AuthManager;
use Adminrule\Service\AdminroleManager;


/**
 * Description of AuthControllerFactory
 *
 * @author Seva
 */
class AuthControllerFactory implements FactoryInterface {
    //put your code here
    
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $authManager = $container->get(AuthManager::class);
        $userManager = $container->get(AdminroleManager::class);

        return new AuthController($entityManager, $authManager, $userManager);
    }
    
}
