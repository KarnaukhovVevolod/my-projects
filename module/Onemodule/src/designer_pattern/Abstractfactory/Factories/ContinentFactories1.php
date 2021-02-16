<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Abstractfactory\Factories;
use Onemodule\designer_pattern\Abstractfactory\Interfaces\InterfaceSetContinent;
use Onemodule\designer_pattern\Abstractfactory\Interfaces\InterfaceGetContinent;
use Onemodule\designer_pattern\Abstractfactory\Clases\ContinentEvrazia;
use Onemodule\designer_pattern\Abstractfactory\Clases\ContinentAfrica;
use Onemodule\designer_pattern\Abstractfactory\Clases\ContinentAustralia;
use Onemodule\designer_pattern\Abstractfactory\Clases\ContinentNorthAmerica;
/**
 * Description of СontinentFactories
 *
 * @author Seva
 */
class ContinentFactories1 implements InterfaceSetContinent,  InterfaceGetContinent{
    //put your code here
    //put your code here
    private $continent;
    private $info_continent;
    private $val;


    public function setContinent($value){
        $this->val = $value;
        switch($value){
           case '1': $this->continent = new ContinentEvrazia();
               break;
           case '2': $this->continent = new ContinentAfrica();
               break;
           case '3': $this->continent = new ContinentAustralia();
               break;
           case '4': $this->continent = new ContinentNorthAmerica();
               break;
           case '4': $this->continent = 'Южная Америка';
               break;
           
           case '6': $this->continent = 'Азия';
               break;
           case '7': $this->continent = 'Антарктида';
               break;
        }
        return true;
    }
    
    public function getInfoContinent() {
        if ($this->val != null){
            $this->info_continent = $this->continent->getInfoContinent();
        }
        else{
            $this->info_continent = 'нету данных по такому континенту';
        }
        
        return $this->info_continent;
    }
    
    
}
