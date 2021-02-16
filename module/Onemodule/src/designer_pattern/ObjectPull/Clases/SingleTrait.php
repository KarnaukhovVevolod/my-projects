<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\ObjectPull\Clases;

/**
 * Description of SingleTrait
 *
 * @author Seva
 */
trait SingleTrait {
    //put your code here
    private static $instance = null;
    private function __construct()
    {
        
    }
    private function __wakeup()
    {
        
    }
    public static function getInstance() {
        if(static::$instance == null){
            static::$instance = new static();
        }
        return static::$instance;    
    }
}
