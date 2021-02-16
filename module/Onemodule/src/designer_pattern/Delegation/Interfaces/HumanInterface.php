<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Delegation\Interfaces;

/**
 * Description of HumanInterface
 *
 * @author Seva
 */
interface HumanInterface {
    //put your code here
    
    //устанавливаем имя
    public function setName($value);
    
    //устанавливаем фамилия 
    public function setSurname($value);
    //устанавливаем пол 
    public function setGender($value);
    //устанавливаем возраст
    public function setYers($value);
    //устанавливаем телефон
    public function setTelephone($value);
    //получить данные
    public function getDatahuman();
    
}
