<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\View\Helper\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\View\Helper\Menu;
use Application\Service\NavManager;

/**
 * Description of MenuFactory
 *
 * @author Seva
 */
class MenuFactory implements FactoryInterface {
    
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $navManager = $container->get(NavManager::class);
        
        //Get menu items.
        $items = $navManager->getMenuItems();
        
        // Instantiate the helper.
        return new Menu($items);
    }
    //put your code here
}
