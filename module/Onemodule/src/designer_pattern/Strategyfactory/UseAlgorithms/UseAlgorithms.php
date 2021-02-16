<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Strategyfactory\UseAlgorithms;
use Onemodule\designer_pattern\Strategyfactory\Interfaces\AppAlgorithmInterfaces;
use Onemodule\designer_pattern\Strategyfactory\ClassAlgorithm\AlgorithmDivision;
use Onemodule\designer_pattern\Strategyfactory\ClassAlgorithm\AlgorithmMultiplication;
use Onemodule\designer_pattern\Strategyfactory\ClassAlgorithm\AlgorithmSubtraction;
use Onemodule\designer_pattern\Strategyfactory\ClassAlgorithm\AlgorithmSum;
/**
 * Description of UseAlgorithms
 *
 * @author Seva
 */
class UseAlgorithms implements AppAlgorithmInterfaces{
    //put your code here
    public function computation($var_1, $var_2, $method) {
        $number = null;
        switch ($method)
        {
            case 1: $number = AlgorithmSum::algorithm($var_1, $var_2);
                break;
            case 2: $number = AlgorithmSubtraction::algorithm($var_1, $var_2);
                break;
            case 3: $number = AlgorithmMultiplication::algorithm($var_1, $var_2);
                break;
            case 4: $number = AlgorithmDivision::algorithm($var_1, $var_2);
                break;
            default : return "Нет такого метода";
                break;
        }
        return $number;
    }
}
