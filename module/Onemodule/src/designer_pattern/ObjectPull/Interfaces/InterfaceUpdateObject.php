<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\ObjectPull\Interfaces;

/**
 * Description of InterfaceObject
 *
 * @author Seva
 */
interface InterfaceUpdateObject {
    //put your code here
    //добавить класс в pull
    public function addObjectPull($class, $name);
    
    public function getObjectFromPull($name);
    
    public function returnObjectInPull($name);
    
    public function deleteObjectFromPull($name);
    
}
