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
use Adminrule\Controller\Plugin\AccessPlugin;

/**
 * Description of AccessPluginFactory
 *
 * @author Seva
 */
/**
 * Это фабрика для AccessPlugin. Ее целями являются инстанцирование плагина
 * и внедрение зависимостей в его конструктор.
 */


class AccessPluginFactory implements FactoryInterface {
    //put your code here
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {   
        $rbacManager = $container->get(RbacManager::class);
        
        return new AccessPlugin($rbacManager);
    }
}
