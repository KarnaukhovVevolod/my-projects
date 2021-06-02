<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Service\Factory;
use Interop\Container\ContainerInterface;
use Adminrule\Service\AuthAdapter;
use Zend\ServiceManager\Factory\FactoryInterface;
/**
 * Description of AuthAdapterFactory
 *
 * @author Seva
 */
class AuthAdapterFactory implements FactoryInterface {
    //put your code here
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        // Get Doctrine entity manager from Service Manager.
        $entityManager = $container->get('doctrine.entitymanager.orm_default');        
                        
        // Create the AuthAdapter and inject dependency to its constructor.
        return new AuthAdapter($entityManager);
    }
}
