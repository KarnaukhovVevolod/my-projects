<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\ObjectPull\Interfaces;

/**
 * Description of ReligionInterface
 *
 * @author Seva
 */
interface ReligionInterface {
    //put your code here
    public function setReligion($religion);
    public function getReligion();
    public static function getInstance();
}
