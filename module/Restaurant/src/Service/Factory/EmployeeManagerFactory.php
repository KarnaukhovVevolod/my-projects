<?php


namespace Restaurant\Service\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Restaurant\Service\EmployeeManager;

class EmployeeManagerFactory implements FactoryInterface{
    //put your code here
    
    // Инстанцируем сервис и внедряем зависимости.
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        return new EmployeeManager($entityManager);
        
    }
}
