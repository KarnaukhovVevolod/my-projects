<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Delegation\Human;

use Onemodule\designer_pattern\Delegation\Interfaces\HumanInterface;

/**
 * Description of AbstractHuman
 *
 * @author Seva
 */
abstract class AbstractHuman implements HumanInterface {
    //put your code here
    protected $name;
    
    protected $surname;
    
    protected $gender;
    
    protected $yers;
    
    protected $telephone;
    
    public function setName($value)
    {
        $this->name = $value;
    }
    public function setSurname($value) {
        $this->surname = $value;
    }
    public function setGender($value) {
        $this->gender = $value;
    }
    public function setYers($value) {
        $this->yers = $value;
    }
    public function setTelephone($value) {
        $this->telephone = $value;
    }
    
    public function getDatahuman() {
        $arr = [];
        $arr['name'] = $this->name;
        $arr['suname'] = $this->surname;
        $arr['gender'] = $this->gender;
        $arr['yers'] = $this->yers;
        $arr['telephone'] = $this->telephone;
        return $arr;
    }
}
