<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Singleton\SingletonAdvanced;

/**
 * Description of SingletonAdvanced
 *
 * @author Seva
 */
class SingletonAdvanced {
    //put your code here
    use \Onemodule\designer_pattern\Singleton\SingletonTrait;
    private $test;
    
    public function setTest($text)
    {
        $this->test = $text;
    }
    public function getTest()
    {
        return $this->test;
    }
    
}
