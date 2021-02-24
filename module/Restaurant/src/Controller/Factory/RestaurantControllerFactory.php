<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
//use Laminas\ServiceManager\FactoryInterface;
use Restaurant\Controller\RestaurantController;
use Restaurant\Service\EmployeeManager;
/**
 * Description of RestaurantControllerFactory
 *
 * @author Seva
 */
class RestaurantControllerFactory implements FactoryInterface {
    //put your code here
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $employeeManager = $container->get(EmployeeManager::class);
        return new RestaurantController($entityManager,$employeeManager);
    }
}
