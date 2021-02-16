<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Abstractfactory\Factories;
use Onemodule\designer_pattern\Abstractfactory\Interfaces\InterfaceGetInfoCountry;
use Onemodule\designer_pattern\Abstractfactory\Clases\CountryEvrazia;
use Onemodule\designer_pattern\Abstractfactory\Clases\CountryAfrica;
/**
 * Description of CountryFactory
 *
 * @author Seva
 */
class CountryFactory implements InterfaceGetInfoCountry {
    //put your code here
    public $continent;
    public function getInfoCountry($value) {
        $this->continent = null;
        switch($value){
            case '1': $this->continent = new CountryEvrazia();
                break;
            case '2': $this->continent = new CountryAfrica();
        }
        $continent = $this->continent->getContinent($value);
        $namecountry = $this->continent->getNameCountry();
        $numberpeople = $this->continent->getNumberpeopleCountry();
        $namenation = $this->continent->getNameNation();
        $sizecountry = $this->continent->getSizeCountry();
        return [$continent, $namecountry,$numberpeople,$namenation,
            $sizecountry];
    }
    
    
}
