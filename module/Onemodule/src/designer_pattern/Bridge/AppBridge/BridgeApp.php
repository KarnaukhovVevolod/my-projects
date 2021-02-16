<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Bridge\AppBridge;
use Onemodule\designer_pattern\Bridge\Abstraction\AbstractionMusic;
use Onemodule\designer_pattern\Bridge\Realization\Realization;
/**
 * Description of BridgeApp
 *
 * @author Seva
 */
class BridgeApp {
    //put your code here
    public function app(){
        //Realization
        $realization = new Realization();
        $data_1 = $realization->getMusic_1();
        $data_2 = $realization->getMusic_2();
        $data_3 = $realization->getMusic_3();
        
        
        //Abstraction
        //debug($data_1);
                
        $abstract = new AbstractionMusic($data_1);
        $abstract_1 = $abstract->getDataClass();
        //die();
        $abstract = new AbstractionMusic($data_2);
        $abstract_2 = $abstract->getDataClass();
        $abstract = new AbstractionMusic($data_3);
        $abstract_3 = $abstract->getDataClass();
        debug('шаблон мост');
        debug($abstract_1);
        debug($abstract_2);
        debug($abstract_3);
        die();
    }   
    
}
