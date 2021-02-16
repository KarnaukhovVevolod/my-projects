<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Onemodule\designer_pattern\Singleton;
use Onemodule\designer_pattern\Singleton\Interfaces\InterfaceSingletonApp;
use Onemodule\designer_pattern\Singleton\SingletonSimple\SingletonSimple;
use Onemodule\designer_pattern\Singleton\SingletonAdvanced\SingletonAdvanced;

/**
 * Description of AppSingleton
 *
 * @author Seva
 */
class AppSingleton implements InterfaceSingletonApp {
    //put your code here
    
    public function checkoutSimpleSingleton() {
       /*singleton - простой способ (с подводными камнями)
         *  позволяет в приложении один раз создавать экземпляр класса,
         * чтобы не перегружать память приложения */
        /*простой singleton*/
        debug('singleton');
        $singletone = SingletonSimple::getInstance();
        $singletone->setTest('первый экземпляр');
        debug($singletone->getTest());
        $singletone2 = SingletonSimple::getInstance();
        debug($singletone2->getTest());
        $result = $singletone === $singletone2;
        debug($result);
        return true;
        
    }
    
    public function checkoutAdvancedSingleton() {
        
        debug('singleton advanced');
        $singletone = SingletonAdvanced::getInstance();
        $singletone->setTest('первый экземпляр');
        debug($singletone->getTest());
        $singletone2 = SingletonAdvanced::getInstance();
        debug($singletone2->getTest());
        $result = $singletone === $singletone2;
        debug($result);
        return true;
        
    }
}
