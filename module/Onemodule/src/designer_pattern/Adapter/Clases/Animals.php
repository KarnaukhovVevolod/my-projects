<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Adapter\Clases;
use Onemodule\designer_pattern\Adapter\Interfaces\AnimalsInterface;
/**
 * Description of Animals
 *
 * @author Seva
 */
class Animals implements AnimalsInterface {
    //put your code here
    public function getcats() {
        return 'кошки';
    }
    public function getdogs() {
        return 'собаки';
    }
    public function getbirds() {
        return 'птицы';
    }
}
