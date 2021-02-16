<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Onemodule\designer_pattern\Singleton;

trait SingletonTrait
{
    private static $instance = null;
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
    
    static public function getInstance()
    {
        if( static::$instance == null ){
            static::$instance = new static();
        }
        //return static::$instance ?? (static::$instance = new static());
        return static::$instance;
    }
}
