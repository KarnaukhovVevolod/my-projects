<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\ObjectPull\Interfaces;

/**
 * Description of CountryInterface
 *
 * @author Seva
 */
interface CountryInterface {
    //put your code here
    public function setCountry($country);
    public function getCountry();
    
    public static function getInstance();
}
