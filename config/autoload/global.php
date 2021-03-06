<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

use Doctrine\DBAL\Driver\PDOMySql\Driver as PDOMySqlDriver;
use Doctrine\DBAL\Driver\PDOPgSql\Driver as PDOPgSqlDriver;

use Zend\Session\Storage\SessionArrayStorage;
use Zend\Session\Validator\RemoteAddr;
use Zend\Session\Validator\HttpUserAgent;
use Zend\Cache\Storage\Adapter\Filesystem;

return [
    // ...
    // Настройка кэша
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
                    ],
                ],
            ],
        ],
    ],
    'doctrine' => [
        
        'connection' => [
            'orm_default' => [
                //'driverClass' => PDOMySqlDriver::class,
                'driverClass' => PDOPgSqlDriver::class,
                'params' => [
                    'host' => 'localhost',
                    //'port' => 3306,
                    'port' => 5432,
                    //'user' => 'root',
                    'user' => 'postgres',
                    //'password' => '',
                    'password' => 'superuser_seva',
                    //'dbname' => 'zend3',
                    'dbname' => 'avecoder',
                    'charset' => 'utf8',
                ]
            ],
            'orm_passport' => [
                //'driverClass' => PDOMySqlDriver::class,
                'driverClass' => PDOPgSqlDriver::class,
                'params' => [
                    'host' => 'localhost',
                    //'port' => 3306,
                    'port' => 5432,
                    //'user' => 'root',
                    'user' => 'postgres',
                    //'password' => '',
                    'password' => 'superuser_seva',
                    //'dbname' => 'zend3',
                    'dbname' => 'avecoder',
                    'charset' => 'utf8',
                ]
            ],
            'entitymanager'=>[
                'orm_passport' => [
                    'connection' => 'orm_passport',
                    'configuration' => 'orm_passport',
                ]
            ],
        ],
        
        //настройка миграции
        
        'migrations_configuration' =>[
            'orm_default' => [
                //'directory' => 'data/Migrations',
                //'name'=> 'Doctrine Database Migrations',
                //'namespace' => 'Migrations',
                //'table'     => 'migrations',
                //'NAMESPACEgfhbfg'=>'Migrations'
                //'migrations_directory'=>'/data/Migrations',
            ]
        ]
         /* 
         * *
         */
        
    ],
    //Настройки сессии.
    'session_config' =>[
        // Срок действия сессии истечёт через 1 час.
        'cookie_lifetime' => 60*60*1,
        // Данные сессии будут храниться на сервере до 30 дней.
        'gc_maxlifetime' => 60*60*24*30,
    ],
    // Настройка менеджера сессий.
    'session_manager'=>[
        //Валидаторы сессии ( используются для безопасности ).
        'validators' => [
            RemoteAddr::class,
            HttpUserAgent::class,    
        ]
    ],
    // Настройка хранилища сессий.
    'session_storage' => [
        'type' => SessionArrayStorage::class
    ],
    /*
    // Настройка кэша
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
                    ],
                ],
            ],
        ],
    ]
    */
];
