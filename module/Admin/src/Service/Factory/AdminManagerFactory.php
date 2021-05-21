<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Service\Factory;

/**
 * Description of AdminManagerFactory
 *
 * @author Seva
 */
use Interop\Container\ContainerInterface;
//use Zend\ServiceManager\Factory\FactoryInterface;
use Admin\Service\AdminManager;

class AdminManagerFactory /*implements FactoryInterface*/ {
    //put your code here
    
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $viewRenderer = $container->get('ViewRenderer');
        $config = $container->get('Config');
        $adminManager = new AdminManager($entityManager, $viewRenderer, $config);
        return $adminManager;
        
    }
}
