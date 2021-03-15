<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\DifferentOneClases;

use Restaurant\Entity\MenuSubscriptionRestaurant;

/**
 * Description of MenuSubscription
 *
 * @author Seva
 */
class MenuSubscription {
    //put your code here
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    public function getMenuSubscription(){
        $getData = $this->entityManager
                ->createQueryBuilder()
                //->select('m')
                //->from(MenuSubscriptionRestaurant::class,'m')
                //->orderBy('m.id', 'DESC')
                ->add('select','m')
                ->add('from','Restaurant\Entity\MenuSubscriptionRestaurant m')
                ->add('orderBy', 'm.id DESC')
                ->setMaxResults(1);
        $getData = $getData->getQuery()->getArrayResult();
        //debug($getData);
        //die();
        return $getData[0];
    }
}
