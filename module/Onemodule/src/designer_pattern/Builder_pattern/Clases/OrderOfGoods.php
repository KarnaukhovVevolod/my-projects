<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Builder_pattern\Clases;

/**
 * Description of OrderOfGoods
 *
 * @author Seva
 */
class OrderOfGoods {
    //put your code here
    //имя того кто заказывает
    public $name;
    
    //фамилия заказчика товара
    public $surname;
    
    //телефон заказчика
    public $telephone;
    
    //email
    public $email;
    
    //номер заказа
    public $number_order;
    
    //тип достаки заказа
    public $type_delivery;
    
    //адрес доставки
    public $adress_delivery=[];
    
    //состав заказа
    public $order_list=[];
    
    //оплата товара
    public $payment_for_goods;
    /*
    public function __construct(string $name, string $surname, string $telephone,
            string $email, integer $number_order, string $type_delivery,
            array $adress_delivery = [], array $order_list = [], string $payment_for_goods) {
        $this->name = $name;
        $this->surname = $surname;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->number_order = $number_order;
        $this->type_delivery = $type_delivery;
        $this->adress_delivery = $adress_delivery;
        $this->order_list = $order_list;
        $this->payment_for_goods = $payment_for_goods;
               
        
    }*/
}
