<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Restaurant\Service\LoadingDatabaseManager;

class LoadingDatabaseManagerFactory implements FactoryInterface{
    
    //put your code here
    // Инстанцируем сервис и внедряем зависимости.
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        return new LoadingDatabaseManager($entityManager);
        
    }
}
