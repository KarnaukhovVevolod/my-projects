<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Clone_\Clases;
use Onemodule\designer_pattern\Clone_\Interfaces\HumanInterface;

/**
 * Description of Human
 *
 * @author Seva
 */
class Human implements HumanInterface {
    //put your code here
    private $name;
    
    private $age;
    
    private $country;
    
    private $parametr;
    /*
    public function __construct(name $name, age $age, country $country, params $parametr) {
        $this->name = $name;
        $this->age = $age;
        $this->country = $country;
        $this->parametr = $parametr;
    }*/
    public function setName($name) {
        $this->name = $name;
        return $this;
    }
    
    public function setAge($age){
        $this->age = $age;
        return $this;
    }
    
    public function setCountry($country) {
        $this->country = $country;
        return $this;
    }
    
    public function setParams($parametr) {
        $this->parametr = $parametr;
        return $this;
    }
    public function getHuman(){
        return $this;
    }
    /*
    public function __clone() {
        $this->name = $this->name . '_copy';
        $this->parametr = clone $this->parametr;
        $this->age = clone $this->age;
        $this->country = clone $this->country;
        
    }
    */
}
