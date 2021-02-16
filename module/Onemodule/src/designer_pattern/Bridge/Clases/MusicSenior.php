<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Bridge\Clases;

/**
 * Description of MusicSenior
 *
 * @author Seva
 */
class MusicSenior {
    //put your code here
    public function getTitle() {
        return 'Тег title для большого блока музыки';
    }
    
    public function getDescription() {
        return 'описание для большого блока музыки';
    }
    
    public function getParams() {
        return ['параметр 1 для блока','параметр 2 для блока',"параметр 3 для блока",
            'параметр 4 для блока','параметр 5 для блока','параметр 6 для блока',
            'параметр 7 для блока','параметр 8 для блока','параметр 9 для блока',
            'параметр 10 для блока'];
    }
}
