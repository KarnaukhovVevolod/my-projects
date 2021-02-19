<?php

namespace Restaurant;
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
                    'route' =>'/restaurant[/:action]',
                    'defaults' => [
                        'controller' => Controller\RestaurantController::class,
                        'action' => 'index',
                    ]
                ]
            ]
        ],
    ],
    'controllers' => [
        'factories' => [
            //Controller\RestaurantController::class => InvokableFactory::class,
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
            Controller\RestaurantController::class => Controller\Factory\RestaurantControllerFactory::class,
            
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
                'paths'  => [__DIR__ .'/../src/Entity']
            ],
            'orm_default' =>[
                'drivers' =>[
                    __NAMESPACE__ .'\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ]
    
];




?>