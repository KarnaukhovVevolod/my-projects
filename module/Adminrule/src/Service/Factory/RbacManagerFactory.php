<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Service\Factory;

use Interop\Container\ContainerInterface;
use Adminrule\Service\RbacManager;
use Zend\Authentication\AuthenticationService;
use Zend\Cache\Storage\Adapter\Filesystem as Fsystem;
use Zend\Cache\StorageFactory;
use Zend\Serializer\Serializer;

/**
 * Это фабричный класс для сервиса RbacManager. Целями данной фабрики являются
 * инстанцирование сервиса и передача ему зависимостей (внедрение зависимостей).
 */
class RbacManagerFactory {
    //put your code here
    /**
     * Этот метод создает сервис RbacManager и возвращает его экземпляр. 
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $authService = $container->get(\Zend\Authentication\AuthenticationService::class);
        //$cache = $container->get('FilesystemCache');
        //$cache = $container->get('caches.FilesystemCache');
        /*
        $cache = [
            'adapter' =>[
                'name' => Filesystem::class,
                'options' => [
                    // Store cached data in this directory.
                    'cache_dir' =>'./data/cache',
                    // Store cached data for 1 hour.
                    'ttl' => 60*60*1
                ],
            ],
            'plugins'=> [
                [
                    'name'=> 'serializer',
                    'options'=>[
                    ],
                ],
            ],
        ];*/
        
        // версия с кэшем zend/cache
        
        $cache = StorageFactory::factory(
                [
                    'adapter' =>[
                        'name' => Fsystem::class,
                        'options' => [
                            // Store cached data in this directory.
                            'cache_dir' =>'./data/cache',
                            // Store cached data for 1 hour.
                            //'ttl' => 60*60*1
                            'ttl' => 60*60*3
                        ],
                    ],
                    'plugins'=> [
                        [
                            //'name'=> Serializer::class,
                            'name' => 'serializer',
                            'options'=>[
                            ],
                        ],
                    ],
                ]);
        
         /** 
         *///версия с сессией
        //$cache = $container->get('ContainerNamespaceDiffer');
        $assertionManagers = [];
        $config = $container->get('Config');
        if (isset($config['rbac_manager']['assertions'])) {
            foreach ($config['rbac_manager']['assertions'] as $serviceName) {
                $assertionManagers[$serviceName] = $container->get($serviceName);
            }
        }
        
        return new RbacManager($entityManager, $authService, $cache, $assertionManagers);
    }
}
