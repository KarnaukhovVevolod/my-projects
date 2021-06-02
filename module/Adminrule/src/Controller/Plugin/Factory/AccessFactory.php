<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Controller\Plugin\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Adminrule\Service\RbacManager;
use Adminrule\View\Helper\Access;

/**
 * Description of AccessFactory
 *
 * @author Seva
 */
class AccessFactory {
    //put your code here
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {   
        $rbacManager = $container->get(RbacManager::class);
        
        return new Access($rbacManager);
    }
}
