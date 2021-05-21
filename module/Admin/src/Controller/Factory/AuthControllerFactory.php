<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller\Factory;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Authentication\AuthenticationService;
use Admin\Service\AdminManager;
use Admin\Service\AuthManager;
use Admin\Controller\AuthController;
/**
 * Description of AuthControllerFactory
 *
 * @author Seva
 */
class AuthControllerFactory implements FactoryInterface {
    
    
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        
        
        $authManager = $container->get(AuthManager::class) ;
        $adminManager = $container->get(AdminManager::class); //new AdminManager($entityManager);
        return new AuthController($entityManager, $authManager, $adminManager);
    }
    
    //put your code here
}
