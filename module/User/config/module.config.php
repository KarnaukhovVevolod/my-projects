<?php

namespace User;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
    'router' => [
        'routes' => [
            'user' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/user[/:action]',
                    'defaults' => [
                        //'controller' => Controller\IndexController::class,
                        'controller'=> Controller\UserController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            
            'user_1' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/index[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ] 
            ],
            
            'user_01' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/post[/:action]',
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'action' => 'post',
                    ],
                ] 
            ],
            
            
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\UserController::class => InvokableFactory::class,
            //Controller\IndexController::class => InvokableFactory::class,
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
            
        ],
    ],
    'view_manager' => [
        
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ .'\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ]
    
];





