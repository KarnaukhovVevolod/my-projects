<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Clone_\AppClone;
use Onemodule\designer_pattern\Clone_\Clases\Human;
use Onemodule\designer_pattern\Clone_\Clases\ParametrHuman;
/**
 * Description of AppClone
 *
 * @author Seva
 */
class AppClone {
    //put your code here
    
    public function appHuman(){
        debug ('Clone start');
        $object_one = $this->createsimpleHuman();
        $object_two = clone $object_one;
        debug($object_one);
        debug('клонированный');
        debug($object_two);
        //изменяем клонированный объект
        $object_two->setParams('very strong');
        debug('изменённый');
        debug($object_one);
        debug($object_two);
        //для простых объектов изменяя второй экземпляр оставляя
        // первый без изменения
        
        //для сложного объекта
        $object_advanced_one = $this->createAdvancedHuman();
        $object_advanced_two = clone $object_advanced_one;
        
        debug('клонирование сложного объекта');
        debug($object_advanced_one);
        debug($object_advanced_two);
        debug('изменяем сложный объект');
        $object_advanced_two->setName("Горыныч 2");
        
        debug($object_advanced_one);
        debug($object_advanced_two);
        
        $object_advanced_two->setParams('нету');
        debug($object_advanced_one);
        debug($object_advanced_two);
        //вроде всё работает нормально
        //die();
    }
    public function createsimpleHuman(){
        $human = new Human();
        $human->setName('Горыныч')
                ->setAge(69)
                ->setCountry('Russia')
                ->setParams('агрессивный');
        
        return $human;
        
    }
    public function createAdvancedHuman(){
        $human = new Human();
        $parametr_human = new ParametrHuman();
        $parametr_human->setCharacter('страптивый')
                ->setPsychological_picture('Неуровновешенный когда пьяный')
                ->setDifferent_description('иногда весёлый');
                
        $human->setName('Горыныч')
                ->setAge(69)
                ->setCountry('Russia')
                ->setParams($parametr_human);
        return $human;
    }
    
    
}
