<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Facade\AppFacade;

use Onemodule\designer_pattern\Facade\Clases\BaidenClass;
use Onemodule\designer_pattern\Facade\Clases\Donbass;
use Onemodule\designer_pattern\Facade\Clases\DonetskClass;
use Onemodule\designer_pattern\Facade\Clases\HumanClass;
use Onemodule\designer_pattern\Facade\Clases\NorthKorea;


/**
 * Description of Facade
 *
 * @author Seva
 */
class Facade {
    //put your code here
    private $class_1;
    private $class_2;
    private $class_3;
    private $class_4;
    private $class_5;
    
    public function __construct() {
        $this->class_1 = new BaidenClass();
        $this->class_2 = new Donbass();
        $this->class_3 = new DonetskClass();
        $this->class_4 = new HumanClass();
        $this->class_5 = new NorthKorea();
        return $this;
    } 
    
    public function facade_function($data){
        
        $data_n = $this->class_1->addclass($data);
        $data_n = $this->class_2->addclass($data_n);
        $data_n = $this->class_3->addclass($data_n);
        $data_n = $this->class_4->addclass($data_n);
        $data_n = $this->class_5->addclass($data_n);
        debug('шаблон Facade ');
        debug($data_n);die();
        
    }
    
            
}
