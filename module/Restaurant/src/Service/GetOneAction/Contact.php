<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\GetOneAction;
use Restaurant\Service\Interfaces\OneActionInterface;
use Restaurant\Entity\ContactCompanyRestaurant;
use Restaurant\Entity\Photorestaurant;
/**
 * Description of Contact
 *
 * @author Seva
 */
class Contact implements OneActionInterface {
    //put your code here
     private $entityManager;
    
    public function __construct($entityManager){
        $this->entityManager = $entityManager;
    }
    
    public function getOneAction($data) {
        
        $data_contact = $this->entityManager
                ->createQueryBuilder()
                ->select('c','p')
                ->from(ContactCompanyRestaurant::class,'c')
                ->leftjoin('c.photoHeadId','p')
                ->orderBy('c.id','DESC')
                ->setMaxResults(1);
        
        $data_contact_new = $data_contact->getQuery()->getArrayResult();
        //debug($data_contact_new);
        return $data_contact_new[0];
    }
}
