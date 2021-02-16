<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Multiton\Multiton_pull;

/**
 * Description of MultitonTrait
 *
 * @author Seva
 */
trait MultitonTrait {
    //put your code here
    
    protected static $instanceName = [];
    /*
     * Запрещаем прямое создание 
     */
    private function __construct()
    {
        
        
    }
    /**
     * Запрещаем клонирование
     */
    private function __clone()
    {
        
    }
    /**
     * запрещаем десереализацию
     * считывать этот объект из базы данных
     */
    private function __wakeup()
    {
        
    }
    
    static public function getInstance(string $instanceName)
    {
        if (isset(static::$instanceName[$instanceName]))
        {
            return static::$instanceName[$instanceName];
        }
        static::$instanceName[$instanceName] = new static();
        
        
        return static::$instanceName[$instanceName];
        
    }
}
