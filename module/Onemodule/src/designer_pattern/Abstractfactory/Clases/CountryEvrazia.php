<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Abstractfactory\Clases;
use Onemodule\designer_pattern\Abstractfactory\Interfaces\InterfaceCountry;

/**
 * Description of CountryEvrazia
 *
 * @author Seva
 */

class CountryEvrazia implements InterfaceCountry {
    //put your code here
    private $continent;
    
    public function getContinent($value) {
        $this->continent = $value;
       
        $continent = null;
        switch($value){
            case '1' : $continent = 'Евразия';
                break;
            case '2' : $continent = 'Африка';
                break;
            case '3' : $continent = 'Австралия';
                break;
            case '4' : $continent = 'Северная Америка';
                break;
            default:
                $continent = 'Нет континента';
                break;
        }
        return $continent;
    }
    public function getNameCountry() {
        $name_country = [];
        switch($this->continent){
            case '1' : $name_country = ['Россия','Украина', 'Беларусь'];
                break;
            case '2' : $name_country = ['Нигерия', 'Эфиопия',"Кения"];
                break;
            default:
                $name_country = [];
                break;
        }
        return $name_country;
    }
    public function getNameNation() {
        $name_nation = [];
        switch($this->continent){
            case '1' : $name_nation = ['русские','хохлы', 'белорусы'];
                break;
            case '2' : $name_nation = ['нигерийцы', 'эфиопы',"кенийцы"];
                break;
            default:
                $name_nation = [];
                break;
        }
        return $name_nation;
    }
    public function getNumberpeopleCountry() {
        $number_people = [];
        switch($this->continent){
            case '1' : $number_people = ['140 млн чел','24 млн чел', '8 млн чел'];
                break;
            case '2' : $number_people = ['195.9 млн чел', '109.2 млн чел',"51.39 млн чел"];
                break;
            default:
                $number_people = [];
                break;
        }
        return $number_people;
    }
    public function getSizeCountry() {
        $size_country = [];
        switch($this->continent){
            case '1' : $size_country = ['площадь 17.1 млн кв. км','площадь 603628 кв. км', 'площадь 207600  кв. км'];
                break;
            case '2' : $size_country = ['площадь 923768 кв. км', 'площадь 11.104 млн кв. км',"площадь 580367 кв. км"];
                break;
            default:
                $size_country = [];
                break;
        }
        return $size_country;
    }
    
    
    
}
