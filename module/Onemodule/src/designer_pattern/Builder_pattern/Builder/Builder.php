<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Builder_pattern\Builder;
use Onemodule\designer_pattern\Builder_pattern\Interfaces\BuilderInterfaces;
use Onemodule\designer_pattern\Builder_pattern\Clases\OrderOfGoods;
/**
 * Description of Builder
 *
 * @author Seva
 */

class Builder implements BuilderInterfaces {
    //put your code here
    private $order;
    public function create() {
        $this->order = new OrderOfGoods();
        return $this;
    }
    public function __construct() {
        $this->create();
    }
    public function setEmail($value) {
        $this->order->email = $value;
        return $this;
    }
    public function setName($value) {
        $this->order->name = $value;
        return $this;
    }
    public function setSurname($value) {
        $this->order->surname = $value;
        return $this;
    }
    public function setTelephone($value) {
        $this->order->telephone = $value;
        return $this;
    }
    public function setNumberOrder($value) {
        $this->order->number_order = $value;
        return $this;
    }
    public function setTypeDelivery($value) {
        $this->order->type_delivery = $value;
        return $this;
    }
    public function setAdressDelivery($value) {
        $this->order->adress_delivery = $value;
        return $this;
    }
    public function setOrderList($value) {
        $this->order->order_list = $value;
        return $this;
    }
    public function setPaymentForGoods($value) {
        $this->order->payment_for_goods = $value;
        return $this;
    }
    public function getOrder() {
        $return_order = $this->order;
        $this->create();
        return $return_order;
    }
    
    
    
}
