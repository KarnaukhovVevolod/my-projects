<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Onemodule\designer_pattern\Abstractfactory\Clases;
use Onemodule\designer_pattern\Abstractfactory\Interfaces\InterfaceGetContinent;

/**
 * Description of ContinentAfrica
 *
 * @author Seva
 */
class ContinentAfrica implements InterfaceGetContinent {
    //put your code here
    public function getInfoContinent() {
       return 'Континент Африка: площадь вместе с островами 30,3 млн км²,';
    }
}
