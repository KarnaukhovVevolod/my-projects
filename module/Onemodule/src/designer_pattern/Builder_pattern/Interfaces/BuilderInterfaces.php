<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Builder_pattern\Interfaces;

/**
 * Description of BuilderInterfaces
 *
 * @author Seva
 */
interface BuilderInterfaces {
    //put your code here
    public function create();
    public function setName($value);
    public function setSurname($value);
    public function setTelephone($value);
    public function setEmail($value);
    public function setNumberOrder($value);
    public function setTypeDelivery($value);
    public function setAdressDelivery($value);
    public function setOrderList($value);
    public function setPaymentForGoods($value);
    public function getOrder();
    
    
}
