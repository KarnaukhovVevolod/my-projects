<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Adapter\AppAdapter;
use Onemodule\designer_pattern\Adapter\Interfaces\AnimalsInterface;
use Onemodule\designer_pattern\Adapter\Clases\Cats;
/**
 * Description of Adapter
 *
 * @author Seva
 */
class Adapter implements AnimalsInterface {
    //put your code here
    
    private $cats = null;
    public function __construct() {
        $this->cats = new Cats();
        return $this;
    }
    
    public function getbirds() {
        //$cats = new Cats();
        
        return $this->cats->getBars();
        
    }
    public function getcats() {
        //$cats = new Cats();
        
        return $this->cats->getCamish();
    }
    public function getdogs() {
        //$cats = new Cats();
        
        return $this->cats->getManul();
        
    }
}
