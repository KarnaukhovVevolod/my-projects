<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Bridge\Clases;
use Onemodule\designer_pattern\Bridge\Interfaces\MusicInterfaces;
/**
 * Description of MusicMiddle
 *
 * @author Seva
 */
class MusicMiddle implements MusicInterfaces {
    //put your code here
    public function getTitle() {
        return 'Тег title для среднего блока музыки';
    }
    
    public function getDescription() {
        return 'описание для среднего блока музыки';
    }
    
    public function getParams() {
        return ['параметр 1 для блока','параметр 2 для блока',"параметр 3 для блока",
            'параметр 4 для блока','параметр 5 для блока'];
    }
}
