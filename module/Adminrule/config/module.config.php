<?php
namespace Adminrule;

use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Router\Http\Literal as Literal;
use Zend\Router\Http\Segment as Segment;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver as AnnotationDriver;  

use Zend\Cache\Storage\Adapter\Filesystem;


return [
    'controllers' => [
        'factories' => [
            Controller\AdminruleController::class => InvokableFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'adminrule' => [
                'type'    => Segment::class,
                'options' => [
                    // Change this to something specific to your module
                    'route'    => '/adminrule[/:action]',
                    'defaults' => [
                        'controller'    => Controller\AdminruleController::class,
                        'action'        => 'index',
                    ],
                ],
                //'may_terminate' => true,
                //'child_routes' => [
                    // You can place additional routes that match under the
                    // route defined above here.
               // ],
            ],
            
            'login'=>[
                'type' => Literal::class,
                'options' => [
                    'route'    => '/login',
                    'defaults' => [
                        'controller' => Controller\AuthController::class,
                        'action'     => 'login',
                    ],
                ],
            ],
            'logout' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/logout',
                    'defaults' => [
                        'controller' => Controller\AuthController::class,
                        'action'     => 'logout',
                    ],
                ],
            ],
            'not-authorized' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/not-authorized',
                    'defaults' => [
                        'controller' => Controller\AuthController::class,
                        'action'     => 'notAuthorized',
                    ],
                ],
            ],
            'reset-password' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/reset-password',
                    'defaults' => [
                        'controller' => Controller\AdminruleController::class,
                        'action'     => 'resetPassword',
                    ],
                ],
            ],
            'set-password' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/set-password',
                    'defaults' => [
                        'controller' => Controller\AdminruleController::class,
                        'action'     => 'setPassword',
                    ],
                ],
            ],
            'users' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/users[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z0-9_-]*',
                    ],
                    'defaults' => [
                        'controller'    => Controller\AdminruleController::class,
                        'action'        => 'index',
                    ],
                ],
            ],
            'roles' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/roles[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]*',
                    ],
                    'defaults' => [
                        'controller'    => Controller\RoleController::class,
                        'action'        => 'index',
                    ],
                ],
            ],
            'permissions' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/permissions[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]*',
                    ],
                    'defaults' => [
                        'controller'    => Controller\PermissionController::class,
                        'action'        => 'index',
                    ],
                ],
            ],
            'siteediting' =>[
                'type'    => Segment::class,
                'options' => [
                    'route' => '/siteediting[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]*',
                    ],
                    'defaults' => [
                        'controller' => Controller\SiteeditingController::class,
                        'action'     => 'contact'
                    ],
                ],
            ]
        ]
    ],
    'controllers' => [
        'factories' => [
            Controller\AdminruleController::class => Controller\Factory\AdminruleControllerFactory::class,
            Controller\AuthController::class => Controller\Factory\AuthControllerFactory::class,
            Controller\PermissionController::class => Controller\Factory\PermissionControllerFactory::class,
            Controller\RoleController::class => Controller\Factory\RoleControllerFactory::class,
            Controller\SiteeditingController::class => Controller\Factory\SiteeditingControllerFactory::class
        ]
    ],
    // 
    // We register module-provided controller plugins under this key.
    'controller_plugins' => [
        'factories' => [
            Controller\Plugin\AccessPlugin::class => Controller\Plugin\Factory\AccessPluginFactory::class,
            Controller\Plugin\CurrentUserPlugin::class => Controller\Plugin\Factory\CurrentUserPluginFactory::class,
        ],
        'aliases' => [
            'access' => Controller\Plugin\AccessPlugin::class,
            'currentUser' => Controller\Plugin\CurrentUserPlugin::class,
        ],
    ],
    // Настройка кэша
    //The 'access_filter' key is used by the User module to restrict or permit
    // access to certain controller actions for unauthorized visitors.
    'access_filter' => [
        'controllers' =>[
            Controller\AdminruleController::class =>[
                // Give access to "resetPassword", "message" and "setPassword" actions
                //to anyone.
                ['actions'=>['resetPassword','message','setPassword'], 'allow' => '*' ],
                // Give access to "index", "add", "edit", "view", "changePassword"
                //actions to users having the "user.manage" permission.
                ['actions'=>['index', 'add', 'edit', 'view', 'changePassword'],'allow'=>'+user.manage']
            ],
            Controller\RoleController::class => [
                //Allow access to authenticated users having the "role.manage" permission.
                ['actions'=>'*', 'allow' => '+role.manage']
            ],
            Controller\PermissionController::class => [
                //Allow access to authenticated users having "permission.manage" permission.
                ['actions' =>'*','allow'=> '+permission.manage']
            ],
             Controller\SiteeditingController::class => [
                 ['actions' => '*', 'allow' => '+user.manage']
             ],
        ]
    ],
    'caches' => [
        'FilesystemCache'=>[
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
                    ]
                ]
            ]
        ],
        /*'aliases' =>[
            'FilesystemCache' => Filesystem::class,
            
        ]*/
    ],
    
    'service_manager' =>[
        'factories' => [
            \Zend\Authentication\AuthenticationService::class => Service\Factory\AuthenticationServiceFactory::class,
             Service\AuthAdapter::class => Service\Factory\AuthAdapterFactory::class,
             Service\AuthManager::class => Service\Factory\AuthManagerFactory::class,
             Service\PermissionManager::class => Service\Factory\PermissionManagerFactory::class,
             Service\RbacManager::class => Service\Factory\RbacManagerFactory::class,
             Service\RoleManager::class => Service\Factory\RoleManagerFactory::class, 
            Service\AdminroleManager::class => Service\Factory\AdminroleManagerFactory::class,
            //Filesystem::class=>InvokableFactory::class
    
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
             __DIR__ . '/../view',
        ],
    ],
    // We register module-provided view helpers under this key.
    'view_helpers'=>[
        'factories' => [
            View\Helper\Access::class => View\Helper\Factory\AccessFactory::class,
             View\Helper\CurrentUser::class=> View\Helper\Factory\CurrentUserFactory::class
        ],
        'aliases' =>[
            'access'=> View\Helper\Access::class,
            'currentUser'=> View\Helper\CurrentUser::class
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
