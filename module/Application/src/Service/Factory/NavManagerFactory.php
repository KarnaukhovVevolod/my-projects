<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



namespace Application\Service\Factory;

use Interop\Container\ContainerInterface;
use Application\Service\NavManager;
use Adminrule\Service\RbacManager;
/**
 * Description of NavManagerFactory
 *
 * @author Seva
 */
class NavManagerFactory {
    //put your code here
    /**
     * This method creates the NavManager service and returns its instance. 
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {        
        $authService = $container->get(\Zend\Authentication\AuthenticationService::class);
        
        $viewHelperManager = $container->get('ViewHelperManager');
        $urlHelper = $viewHelperManager->get('url');
        $rbacManager = $container->get(RbacManager::class);
        
        return new NavManager($authService, $urlHelper, $rbacManager);
    }
}
