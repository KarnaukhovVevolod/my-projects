<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\ObjectPull\Clases;
use Onemodule\designer_pattern\ObjectPull\Interfaces\HumanInterface;
/**
 * Description of Human
 *
 * @author Seva
 */
class Human implements HumanInterface{
    //put your code here
    use SingleTrait;
    
    private $name;
    private $age;
    
    public function setName($name) {
        $this->name = $name;
        return $this;
    }
    public function setAge($age) {
        $this->age = $age;
        return $this;
    }
    public function getInfo() {
        return $this;
    }
    
    
}
