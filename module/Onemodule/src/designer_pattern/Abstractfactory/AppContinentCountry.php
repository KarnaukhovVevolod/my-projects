<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Abstractfactory;

use Onemodule\designer_pattern\Abstractfactory\Interfaces\InterfaceAppContinentCountry;
//use Onemodule\designer_pattern\Abstractfactory\Factories\ContinentFactories;
use Onemodule\designer_pattern\Abstractfactory\Factories\ContinentFactories1;
use Onemodule\designer_pattern\Abstractfactory\Factories\CountryFactory;
use Onemodule\designer_pattern\Abstractfactory\Factories\StaticFactory;
use Onemodule\designer_pattern\Abstractfactory\Factories\SimpleFactory;
/**
 * Description of AppContinentCountry
 *
 * @author Seva
 */
class AppContinentCountry implements InterfaceAppContinentCountry {
    //put your code here
    
    public function setContinent($value) {
        $continent = new ContinentFactories1();
        $continent->setContinent($value);
        $info_continent = $continent->getInfoContinent();
        return $info_continent;
        
    }
    public function setCountry($value) {
        $country = new CountryFactory();
        $info_country = $country->getInfoCountry($value);
        
        return $info_country;
    }
    public function setStaticCountry($value) {
        $country = StaticFactory::byild($value);
        return $country;
    }
    
    public function setSipmleCountry($value) {
        $country = new SimpleFactory();
        $info_country = $country->byild($value);
        return $info_country;
    }
}
