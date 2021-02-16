<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\ObjectPull\Clases;
use Onemodule\designer_pattern\ObjectPull\Interfaces\ReligionInterface;
/**
 * Description of Religion
 *
 * @author Seva
 */
class Religion implements ReligionInterface {
    //put your code here
    use SingleTrait;
    private $religion;
    
    public function setReligion($religion) {
        $this->religion = $religion;
        return $this;
    }
    public function getReligion() {
        return $this;
    }
}
