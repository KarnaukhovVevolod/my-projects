<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\ObjectPull\UpdateObjectPull;

use Onemodule\designer_pattern\ObjectPull\Clases\Country;
use Onemodule\designer_pattern\ObjectPull\Clases\Human;
use Onemodule\designer_pattern\ObjectPull\Clases\Religion;
use Onemodule\designer_pattern\ObjectPull\Interfaces\InterfaceUpdateObject;

/**
 * Description of CreateObjectPull
 *
 * @author Seva
 */
class UpdateObjectPull implements InterfaceUpdateObject{
    //put your code here
    private $pull_object = [];
    private $pull_name = [];
    private $clone_object = [];
    
    
    public function addObjectPull($class, $name) {
        $object_class = null;
        if(!isset($this->pull_object[$class]) ){
            switch ($class){
                case 'Human': $object_class = Human::getInstance();
                    break;
                case 'Country': $object_class = Country::getInstance();
                    break;
                case 'Religion': $object_class = Religion::getInstance();
                    break;
                default:
                    return 'Нет такого класса';
                    break;
            }
            $this->pull_object[$class] = $object_class;
            $this->pull_name[$name] = $class;
            
        }
        else{
            $name = array_search($class, $this->pull_name);
            return "такой объект уже есть в массиве pull с названием: ".$name;
        }
        return true;
    }
    //get object from pull
    public function getObjectFromPull($name) {
        if(isset($this->pull_object[$this->pull_name[$name]]) ){
            
            if (isset($this->clone_object[$name])){
                return 'такой объект уже клонирован';
            }
            else{
                $this->clone_object[$name] = clone $this->pull_object[$this->pull_name[$name]];
                return $this->clone_object[$name];
            }
        }
        else{
            return ' объект под таким именем уже склонирован';
        }
    } 
    
    public function returnObjectInPull($name) {
        if (isset($this->clone_object[$name])){
                unset($this->clone_object[$name]);
                return true;
            }
        else{
            return 'Такого объекта не существует в клонированных';
        }    
    }
    public function deleteObjectFromPull($name) {
        if (isset($this->clone_object[$name])){
                unset($this->clone_object[$name]);
        }
        if(isset($this->pull_object[$this->pull_name[$name]]))
        {
            unset($this->pull_object[$this->pull_name[$name]]);
            unset($this->pull_name[$name]);
        }
        else{
            return 'нет такого объекта в pull';
        }
        return true;
    }
}
