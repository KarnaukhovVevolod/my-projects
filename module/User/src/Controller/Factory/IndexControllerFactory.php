<?php

namespace User\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use User\Controller\IndexController;

class IndexControllerFactory implements FactoryInterface {
    //put your code here
    public function __invoke(ContainerInterface $container, $requestedName, array $optons = null) {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        
        return new IndexController($entityManager);
    }
}
