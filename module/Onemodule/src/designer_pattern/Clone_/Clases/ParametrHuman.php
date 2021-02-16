<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Clone_\Clases;
use Onemodule\designer_pattern\Clone_\Interfaces\ParametrHumanInterface;

/**
 * Description of ParametrHuman
 *
 * @author Seva
 */
class ParametrHuman implements ParametrHumanInterface {
    //put your code here
    private $character;
    private $psychological_picture;
    private $description;
    
    public function setCharacter($character) {
        $this->character = $character;
        return $this;
    }
    
    public function setDifferent_description($description) {
        $this->description = $description;
        return $this;
    }
    
    public function setPsychological_picture($psychological_picture) {
        $this->psychological_picture = $psychological_picture;
        return $this;
    }
    
    public function getParametr() {
        return $this;
    }
    
}
