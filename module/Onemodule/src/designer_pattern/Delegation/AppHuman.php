<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Delegation;
use Onemodule\designer_pattern\Delegation\Interfaces\HumanInterface;
use Onemodule\designer_pattern\Delegation\Human\Humanblack;
use Onemodule\designer_pattern\Delegation\Human\Humanwhite;
/**
 * Description of AppHuman
 *
 * @author Seva
 */
class AppHuman implements HumanInterface {
    //put your code here
    
    private $human;
    
    public function __construct() {
        $this->toWhite();
    }
    
    public function toWhite(){
        $this->human = new Humanwhite();
        return $this;
    }
    
    public function toBlack(){
        $this->human = new Humanblack();
        return $this;
    }
    
    public function setName($value) {
        $this->human->setName($value);
        return $this->human;
    }
    
    public function setSurname($value) {
        $this->human->setSurname($value);
        return $this->human;    
    }
    
    public function setGender($value) {
        $this->human->setGender($value);
        return $this->human ;
    }
    
    public function setYers($value) {
        $this->human->setYers($value);
        return $this->human;
    }
    public function setTelephone($value) {
        $this->human->setTelephone($value);
        return $this->human;
    }
    public function getDatahuman() {
        return $this->human->getDatahuman();
    }
    
    
    
}
