<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Multiton\Interfaces;

/**
 * Description of MultitonInterfaces
 *
 * @author Seva
 */
interface MultitonInterfaces {
    
    //put your code here
    public static function getInstance(string $instanceName);
    
}
