<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Abstractfactory\Clases;
use Onemodule\designer_pattern\Abstractfactory\Interfaces\InterfaceCountry;
/**
 * Description of CountryAfrica
 *
 * @author Seva
 */
class CountryAfrica implements InterfaceCountry{
    //put your code here
    private $continent;
    
    public function getContinent($value) {
        $this->continent = $value;
        return 'Континент Африка';
    }
    public function getNameCountry() {
        $name_country = ['Нигерия', 'Эфиопия',"Кения"];
        return $name_country;
    }
    
    public function getNameNation() {
        $name_nation = ['нигерийцы', 'эфиопы',"кенийцы"];
        return $name_nation;
    }
    public function getNumberpeopleCountry() {
        $number_people = ['195.9 млн чел', '109.2 млн чел',"51.39 млн чел"];
        return $number_people;
    }
    public function getSizeCountry() {
        $size_country = ['площадь 923768 кв. км', 'площадь 11.104 млн кв. км',"площадь 580367 кв. км"];
        return $size_country ;
    }
}
