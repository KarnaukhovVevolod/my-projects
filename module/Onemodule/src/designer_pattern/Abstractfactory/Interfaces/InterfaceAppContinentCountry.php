<?php

namespace Onemodule\designer_pattern\Abstractfactory\Interfaces;

interface InterfaceAppContinentCountry{
    //получить континент
    public function setContinent($value);
    //получить страну
    public function setCountry($value);
    //получить страну статическим методом фабрики
    public function setStaticCountry($value);
    //получить страну простой фабрикой
    public function setSipmleCountry($value);
    
    
    
    
}

