<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            
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
            
            'onemodule' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/onemodule[/:action]',
                    'defaults'=>[
                        'controller'=> Controller\OnemoduleController::class,
                        //'action' => 'onemodule',
                        //'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'restaurant' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/restaurant[/:action]',
                    'defaults'=>[
                        'controller'=> Controller\RestaurantController::class,
                        'action' => 'index',
                    ]
                ],
            ],
            'admin' => [
                'type' => Segment::class,
                'options' =>[
                    'route' => '/admin[/:action]',
                    'defaults'=>[
                        'controller'=> Controller\AdminController::class,
                        'action' => 'index',
                    ]
                ]
            ],
            'auth' => [
                'type' => Segment::class,
                'options' =>[
                    'route' => '/auth[/:action]',
                    'defaults'=>[
                        'controller'=> Controller\AuthController::class,
                        'action' => 'login',
                    ]
                ]
            ],
            /* not working
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
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            //Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
        
        ],
    ],
    'access_filter' => [
        'options' => [
            // The access filter can work in 'restrictive' (recommended) or 'permissive'
            // mode. In restrictive mode all controller actions must be explicitly listed 
            // under the 'access_filter' config key, and access is denied to any not listed 
            // action for not logged in users. In permissive mode, if an action is not listed 
            // under the 'access_filter' key, access to it is permitted to anyone (even for 
            // not logged in users. Restrictive mode is more secure and recommended to use.
            'mode' => 'restrictive'
        ],
    ],
    
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../../Restaurant/src/Entity'],
                //'paths' => [__DIR__ . '/../src/Entity'],
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ]
    
];
