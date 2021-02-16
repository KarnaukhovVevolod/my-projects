<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Abstractfactory\Factories;
use Onemodule\designer_pattern\Abstractfactory\Clases\CountryEvrazia;
use Onemodule\designer_pattern\Abstractfactory\Clases\CountryAfrica;
use Onemodule\designer_pattern\Abstractfactory\Interfaces\InterfaceSimpleFactory;

/**
 * Description of SimpleFactory
 *
 * @author Seva
 */
class SimpleFactory implements InterfaceSimpleFactory{
    //put your code here
    public function byild($value) {
        $country_continent = null;
        switch($value){
            case('1'):
                $country_continent = new CountryEvrazia();
                break;
            case('2'):
                $country_continent = new CountryAfrica();
                break;
            
        }
        //debug($value);
        //debug($country_continent);
        //                die();
        if($country_continent != null)
        {
            $continent = $country_continent->getContinent($value);
            $namecountry = $country_continent->getNameCountry();
            $numberpeople = $country_continent->getNumberpeopleCountry();
            $namenation = $country_continent->getNameNation();
            $sizecountry = $country_continent->getSizeCountry();
            
            return [$continent, $namecountry,$numberpeople,$namenation,
                $sizecountry];
        }
        return "нету информации по данному запросу";
        
       
    }
}
