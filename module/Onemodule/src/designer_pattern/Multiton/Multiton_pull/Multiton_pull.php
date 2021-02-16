<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Multiton\Multiton_pull;
use Onemodule\designer_pattern\Multiton\Interfaces\MultitonInterfaces;


/**
 * Description of Multiton_pull
 *
 * @author Seva
 */
class Multiton_pull implements MultitonInterfaces  {
    //put your code here
    use MultitonTrait;
    
    private $name ;
    
    public function setName($value){
        $this->name = $value;
        return $this;
    }
    
    
}
