<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Singleton\SingletonSimple;

/**
 * Description of SingletonSimple
 *
 * @author Seva
 */
class SingletonSimple {
    //put your code here
    
    private static $instance;
    
    private $text;
    
    static public function getInstance()
    {
        if( static::$instance == null ){
            static::$instance = new static();
        }
        //return static::$instance ?? (static::$instance = new static());
        return static::$instance;
    }
    
    public function setTest($value){
        $this->text = $value;
        return $this;
    }
    
    public function getTest(){
        return $this->text;
    }
            
    
}
