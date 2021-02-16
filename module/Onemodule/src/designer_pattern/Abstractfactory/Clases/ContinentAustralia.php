<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Onemodule\designer_pattern\Abstractfactory\Clases;
use Onemodule\designer_pattern\Abstractfactory\Interfaces\InterfaceGetContinent;
/**
 * Description of ContinentAustralia
 *
 * @author Seva
 */
class ContinentAustralia implements InterfaceGetContinent {
    //put your code here
    public function getInfoContinent() {
        return 'Континент Австралия: площадь 7,66 млн км²,';
    }
    
}
