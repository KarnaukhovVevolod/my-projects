<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\ObjectPull\Interfaces;

/**
 * Description of HumanInterface
 *
 * @author Seva
 */
interface HumanInterface {
    //put your code here
    public function setName($name);
    
    public function setAge($age);
    
    public function getInfo();
    
    public static function getInstance();
    
}
