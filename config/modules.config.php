<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

/**
 * List of enabled modules for this application.
 *
 * This should be an array of module namespaces used in the application.
 */
return [
    'Zend\Serializer',
    'Zend\Mvc\Plugin\FilePrg',
    'Zend\Mvc\Plugin\FlashMessenger',
    'Zend\Mvc\Plugin\Identity',
    'Zend\Mvc\Plugin\Prg',
    'Zend\Mail',
    'Zend\Session',
    'Zend\Form',
    'Zend\InputFilter',
    'Zend\Filter',
    'Zend\Hydrator',
    'Zend\Router',
    'Zend\Validator',
    
    
    'ZendDeveloperTools',
    'DoctrineModule',
    'DoctrineORMModule',
    'Laminas\\DeveloperTools',
    
    
    'Application',
    
    //my modules
    
    //'User',
    //'Onemodule',
    'Restaurant',
    //'Admin',
    //'Adminrule'
    
];
