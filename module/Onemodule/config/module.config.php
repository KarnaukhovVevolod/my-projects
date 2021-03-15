<?php

namespace Onemodule;
use Zend\Router\Http\Literal as Literal;
use Zend\Router\Http\Segment as Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
//use Zend\ServiceManager\Factory\InvokableFactory;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return[
    /*
    'doctrine'=>[
        'driver' =>[
            
        ]
    ]
    */
    
    'router' => [
        'routes' => [
            'onemodule' =>[
                'type' => Segment::class,
                'options' => [
                    /*
                    'route' => '/onemodule[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' =>'[0-9]+',
                    ],
                    */
                    'route' =>'/onemodule[/:action]',
                    'defaults' => [
                        'controller' => Controller\OnemoduleController::class,
                        //'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ]
                ],
            ],
            /* not_working
            'onemoduleindex'=>[
                'type' => Segment::class,
                'options' =>[
                    'route' =>'/index[/:action]',
                    'defaults'=> [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ]
                ]
            ],*/
        ]
    ],
    'controllers' => [
      'factories' => [
          Controller\OnemoduleController::class => InvokableFactory::class,
          //Controller\IndexController::class => InvokableFactory::class,
          Controller\IndexController::class =>  Controller\Factory\IndexControllerFactory::class, 
      ],
    ],
    
    'view_manager' => [
        'template_path_stack' => [
            __DIR__.'/../view',
        ],
    ],
    
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../../Restaurant/src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ .'\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ]
    
    
];






?>



