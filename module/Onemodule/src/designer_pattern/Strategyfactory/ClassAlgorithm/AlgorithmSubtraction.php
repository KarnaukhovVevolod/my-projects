<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Strategyfactory\ClassAlgorithm;
use Onemodule\designer_pattern\Strategyfactory\Interfaces\AlgorithmInterfaces;
/**
 * Description of AlgorithmSubtraction
 *
 * @author Seva
 */
class AlgorithmSubtraction implements AlgorithmInterfaces {
    //put your code here
    public static function algorithm($var_1, $var_2) {
        return($var_1 - $var_2);
    }
}
