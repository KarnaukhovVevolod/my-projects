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
            'admin' =>[
                'type' => Segment::class,
                'options' => [
                    'route' =>'/admin[/:action]',
                    //'route' => '/admin[/:action][/:id][/:sort]',
                    'constraints'=>[
                        //'id' => '[a-zA-Z][a-zA-Z][=][0-9]*'
                        //'id' => '[a-zA-Z][a-zA-Z0-9_=-a-zA-Z0-9-]*',
                        //'sort' => '[a-zA-Z][a-zA-Z0-9_=-a-zA-Z0-9-]*',
                        
                    ],
                    'defaults' => [
                        'controller' => Controller\AdminController::class,
                        'action' => 'index',
                    ]
                ]
            ],
            'login' =>[
                'type' => Literal::class,
                'options' => [
                    'route' =>'/login',
                    'defaults' => [
                        'controller' => Controller\AuthController::class,
                        'action' => 'login',
                    ]
                ]
            ],
            'logout' =>[
                'type' => Literal::class,
                'options' => [
                    'route' => '/logout',
                    'defaults' => [
                        'controller' => Controller\AuthController::class,
                        'action' => 'logout',
                    ],
                ]
            ]
        ],
    ],
    
    'controllers' => [
        'factories' => [
            Controller\AdminController::class => Controller\Factory\AdminControllerFactory::class,
            Controller\AuthController::class => Controller\Factory\AuthControllerFactory::class
        ],
    ],
    
    // Ключ 'access_filter' используется модулем User, чтобы разрешить или запретить доступ к
    // определенным действиям контроллера для не вошедших на сайт пользователей.
    
    'access_filter' => [
        'options' => [
            // Фильтр доступа может работать в 'ограничительном' (рекомендуется) или 'разрешающем'
            // режиме. В ограничительном режиме все действия контроллера должны быть явно перечислены 
            // под ключом конфигурации 'access_filter', а доступ к любому не перечисленному действию
            // для неавторизованных пользователей запрещен. В разрешающем режиме, даже если действие не
            // указано под ключом 'access_filter', доступ к нему разрешен для всех (даже для  
            // неавторизованных пользователей. Рекомендуется использовать более безопасный ограничительный режим.
            'mode' => 'restrictive'
        ],
        'controllers' => [
            Controller\AdminController::class => [
                //Позволяем всем обращаться к действиям " "
                ['actions'=>['index'], 'allow' => '*'],
                //Позволяем вошедшим на сайт пользователям обращаться к действиям " "
                ['actions'=>['edit','change','reset'], 'allow' => '@'],
            ]
        ]
    ],
    
    
    'service_manager' => [
        'factories' => [
            //Service\EmployeeManager::class => Service\Factory\EmployeeManagerFactory::class,
            //Service\LoadingDatabaseManager::class => Service\Factory\LoadingDatabaseManagerFactory::class,
            \Zend\Authentication\AuthenticationService::class => Service\Factory\AuthenticationServiceFactory::class,
            Service\AuthAdapter::class => Service\Factory\AuthAdapterFactory::class,
            Service\AuthManager::class => Service\Factory\AuthManagerFactory::class, 
            Service\AdminManager::class => Service\Factory\AdminManagerFactory::class
        ],
        /*
        'aliases' =>[
            'Cur' => \Zend\Authentication\AuthenticationService::class
        ],
        **/
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
    'session_containers' => [
        'ContainerNamespaceDiffer'
    ],
    
];




?>