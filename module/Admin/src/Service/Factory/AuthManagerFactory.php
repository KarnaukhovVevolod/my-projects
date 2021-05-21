<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace Admin\Service\Factory;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Authentication\AuthenticationService;
use Zend\Session\SessionManager;
use Admin\Service\AuthManager;
use Admin\Service\AdminManager;


/**
 * Description of AuthManagerFactory
 *
 * @author Seva
 */
class AuthManagerFactory implements FactoryInterface {
    
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $authenticationService = $container->get(\Zend\Authentication\AuthenticationService::class);
        $sessionManager = $container->get(SessionManager::class);
        $config = $container->get('Config');
        if(isset($config['access_filter']))
            $config = $config['access_filter'];
        else
            $config = [];
        
        return new AuthManager($authenticationService, $sessionManager, $config);
    }
    //put your code here
}
