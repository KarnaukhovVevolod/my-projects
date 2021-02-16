<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\ObjectPull\Clases;
use Onemodule\designer_pattern\ObjectPull\Interfaces\CountryInterface;

/**
 * Description of Country
 *
 * @author Seva
 */
class Country implements CountryInterface {
    //put your code here
    use SingleTrait;
    
    private $country;
    
    public function setCountry($country) {
        $this->country = $country;
        return $this;
    }
    public function getCountry() {
        return $this;
    }
}
