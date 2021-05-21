<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Service\Factory;

/**
 * Description of AuthenticationServiceFactory
 *
 * @author Seva
 */
use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationService;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Session\SessionManager;
use Zend\Authentication\Storage\Session as SessionStorage;
use Admin\Service\AuthAdapter;

/**
 * Это фабрика, отвечающая за создание сервиса аутентификации. 
 */
class AuthenticationServiceFactory implements FactoryInterface {
    //put your code here
    /**
     * Этот метод создаёт сервис Zend\Authentication\AuthenticationService
     * и возвращает его экземпляр.
     */
    
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $sessionManager = $container->get(SessionManager::class);
        $authStorage = new SessionStorage('Zend_Auth', 'session', $sessionManager);
        $authAdapter = $container->get(AuthAdapter::class);
        
        //Создаём сервис и внедряем зависимости в его конструктор.
        return new AuthenticationService($authStorage, $authAdapter);
    }
    
}
