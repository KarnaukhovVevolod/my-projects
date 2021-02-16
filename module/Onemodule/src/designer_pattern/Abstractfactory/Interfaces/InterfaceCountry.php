<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//namespace Onemodule\designer_pattern\Abstractfactory\Interfaces;
namespace Onemodule\designer_pattern\Abstractfactory\Interfaces;
//интерфейс о каждой стране
interface InterfaceCountry{
    
    //название страны
    public function getNameCountry();
    //название основного народа
    public function getNameNation();
    //численность народа 
    public function getNumberpeopleCountry();
    //территория страны
    public function getSizeCountry();
    //континент 
    public function getContinent($value);
}


