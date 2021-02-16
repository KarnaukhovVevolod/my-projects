<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Onemodule\designer_pattern\Adapter\Clases;

use Onemodule\designer_pattern\Adapter\Interfaces\CatsInterface;
/**
 * 
 * Description of Cats
 *
 * @author Seva
 */
class Cats implements CatsInterface {
    //put your code here
    public function getBars() {
        return 'барс';
    }
    public function getCamish() {
        return 'камышовый кот';
    }
    public function getManul() {
        return 'манул';
    }
}
