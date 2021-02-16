<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Delegation\Human;

use Onemodule\designer_pattern\Delegation\Human\AbstractHuman;

/**
 * Description of Humanwhite
 *
 * @author Seva
 */
class Humanwhite extends AbstractHuman {
    //put your code here
    public function getDatahuman() {
        //$value['color'] = 'white';
        $arr = [];
        $arr['name'] = $this->name;
        $arr['suname'] = $this->surname;
        $arr['gender'] = $this->gender;
        $arr['yers'] = $this->yers;
        $arr['telephone'] = $this->telephone;
        $arr['color'] = 'white'; 
        //$arr1 = $this->getDatahuman();
        return $arr;
    }
    
}
