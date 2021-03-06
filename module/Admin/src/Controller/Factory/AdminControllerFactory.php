<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller\Factory;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Admin\Controller\AdminController;
use Zend\Session\SessionManager;
use Zend\Authentication\AuthenticationService;

/**
 * Description of AdminControllerFactory
 *
 * @author Seva
 */
class AdminControllerFactory implements FactoryInterface {
    //put your code here
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $sessionManager = $container->get(SessionManager::class);
        $sessionContainer_2 = $container->get('ContainerNamespaceDiffer');
        $authManager = $container->get(\Zend\Authentication\AuthenticationService::class);
        return new AdminController($entityManager, $sessionContainer_2, $sessionManager, $authManager);
    }
    
}
