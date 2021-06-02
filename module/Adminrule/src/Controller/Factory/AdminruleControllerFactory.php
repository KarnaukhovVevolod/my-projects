<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Controller\Factory;

use Adminrule\Controller\AdminruleController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Adminrule\Service\AdminroleManager;

/**
 * Description of AdminruleControllerFactory
 *
 * @author Seva
 */
class AdminruleControllerFactory implements FactoryInterface {
    //put your code here
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $userManager = $container->get(AdminroleManager::class);
        
        // Instantiate the controller and inject dependencies
        return new AdminruleController($entityManager, $userManager);
    }
}
