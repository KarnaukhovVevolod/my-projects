<?php

namespace Onemodule;

class Module {
    //put your code here
    
    public function getConfig()
    {
        return include __DIR__.'/../config/module.config.php';
    }
    
    public function getAutoloaderConfig()
    {
        return[
          'Zend\LoaderStandardAutoloader'=>[
              'namespaces'=>[__NAMESPACE__=>__DIR__.'/src/'.__NAMESPACE__,] 
          ]  
        ];
    }
    
    
    
}
