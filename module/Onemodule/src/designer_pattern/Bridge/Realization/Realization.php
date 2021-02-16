<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Bridge\Realization;

use Onemodule\designer_pattern\Bridge\Clases\MusicJunior;
use Onemodule\designer_pattern\Bridge\Clases\MusicMiddle;
use Onemodule\designer_pattern\Bridge\Clases\MusicSenior;

/**
 * Description of Realization
 *
 * @author Seva
 */
class Realization {
    //put your code here
    private $music_1;
    private $music_2;
    private $music_3;
    
    public function __construct() {
        $this->music_1 = new MusicJunior();
        $this->music_2 = new MusicMiddle();
        $this->music_3 = new MusicSenior();
        //return $this;
        
    }
    public function getMusic_1(){
        return $this->music_1;
    }
    public function getMusic_2(){
        return $this->music_2;
    }
    public function getMusic_3(){
        return $this->music_3;
    }
}
