<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Service\Factory;

use Interop\Container\ContainerInterface;
use Application\Service\RbacAssertionManager;

/**
 * Description of RbacAssertionManagerFactory
 *
 * @author Seva
 */
class RbacAssertionManagerFactory {
    //put your code here
    
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null ) {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $authService = $container->get(\Zend\Authentication\AuthenticationService::class);
        
        return new RbacAssertionManager($entityManager, $authService);
    }
}
