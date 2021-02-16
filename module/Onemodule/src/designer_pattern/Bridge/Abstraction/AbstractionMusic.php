<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Bridge\Abstraction;

/**
 * Description of AbstractionMusic
 *
 * @author Seva
 */
class AbstractionMusic {
    //put your code here
    private $get_class;
    
    public function __construct($class) {
        $this->get_class = $class;
    }
    
    public function getDataClass(){
        $title_new = $this->get_class->getTitle() . 'new';
        $description_new = $this->get_class->getDescription() . 'new';
        $params_new = $this->get_class->getParams();
        array_push($params_new,'new');
        return [$title_new,$description_new,$params_new];
    }
    
}
