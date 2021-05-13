<?php

namespace Admin;
use Zend\Router\Http\Literal as Literal;
use Zend\Router\Http\Segment as Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
//use Zend\ServiceManager\Factory\InvokableFactory;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver as AnnotationDriver;


return[
    
    'router' => [
        'routes' => [
            'restaurant' =>[
                'type' => Segment::class,
                'options' => [
                    //'route' =>'/restaurant[/:action/:id]',
                    'route' => '/restaurant[/:action][/:id][/:sort]',
                    'constraints'=>[
                        //'id' => '[a-zA-Z][a-zA-Z][=][0-9]*'
                        'id' => '[a-zA-Z][a-zA-Z0-9_=-a-zA-Z0-9-]*',
                        'sort' => '[a-zA-Z][a-zA-Z0-9_=-a-zA-Z0-9-]*',
                        
                    ],
                    'defaults' => [
                        'controller' => Controller\AdminController::class,
                        'action' => 'index',
                    ]
                ]
            ]
        ],
    ],
    'controllers' => [
        'factories' => [
            //Controller\RestaurantController::class => InvokableFactory::class,
            //Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
            Controller\AdminController::class => Controller\Factory\AdminControllerFactory::class,
            
        ],
    ],
    'service_manager' => [
        'factories' => [
            //Service\EmployeeManager::class => Service\Factory\EmployeeManagerFactory::class,
            //Service\LoadingDatabaseManager::class => Service\Factory\LoadingDatabaseManagerFactory::class,
        ],
    ],
    'view_manager' => [
        'template_map' =>[
            //'layout/layout'     => __DIR__ . '/../view/layout/layout.phtml',
            
            //'layout/layout'     => __DIR__ . '/../view/layout/layout2.phtml',
        ],
        'template_path_stack' => [
            __DIR__.'/../view',
        ],
    ],
    
    'doctrine' =>[
        'driver' => [
            __NAMESPACE__. '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths'  => [__DIR__ .'/../../Restaurant/src/Entity']
            ],
            'orm_default' =>[
                'drivers' =>[
                    __NAMESPACE__ .'\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ],
    
    
];




?>