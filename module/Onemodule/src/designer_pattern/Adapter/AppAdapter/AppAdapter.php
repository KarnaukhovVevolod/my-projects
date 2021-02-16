<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Adapter\AppAdapter;
use Onemodule\designer_pattern\Adapter\Clases\Animals;
use Onemodule\designer_pattern\Adapter\Clases\Cats;
/**
 * Description of AppAdapter
 *
 * @author Seva
 */
class AppAdapter {
    //put your code here
    public function App()
    {
        /**/
        $animals = new Animals();
        debug($animals->getbirds());
        debug($animals->getcats());
        debug($animals->getdogs());
        /* адаптированный интерфейс */
        $animals = new Adapter();
        debug('Адаптированный интерфейс');
        debug($animals->getbirds());
        debug($animals->getcats());
        debug($animals->getdogs());
        die();
        
    }
}
