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

return [
    // ...
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
        
    ],
    
];
