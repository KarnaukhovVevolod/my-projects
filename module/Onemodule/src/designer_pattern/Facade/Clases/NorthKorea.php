<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Facade\Clases;
use Onemodule\designer_pattern\Facade\Interfaces\InterfaceClass;
/**
 * Description of NorthKorea
 *
 * @author Seva
 */
class NorthKorea implements InterfaceClass {
    //put your code here
    public function addclass($class) {
        $class_new = $class. ' Добавляется класс Северная Корея ';
        return $class_new;
    }
}
