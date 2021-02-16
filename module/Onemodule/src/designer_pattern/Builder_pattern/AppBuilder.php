<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Onemodule\designer_pattern\Builder_pattern;
use Onemodule\designer_pattern\Builder_pattern\Builder\Builder;
/**
 * Description of AppBuilder
 *
 * @author Seva
 */
class AppBuilder {
    //put your code here
    
    public function check_build(){
        $builder = new Builder();
        $data_order = $builder->setName('Seva')
                ->setSurname('Karnaukhov')
                ->setNumberOrder(12)
                ->setOrderList(['notebook','iphone','audio device'])
                ->getOrder();
        debug('Шаблон строитель или builder');
        debug($data_order);
        $data_order_1 = $builder->setPaymentForGoods('оплачено')
                ->setEmail('123@gmail.com')
                ->setAdressDelivery('Moscow')
                ->getOrder();
        debug($data_order_1);
        //die();
        
    }
}
