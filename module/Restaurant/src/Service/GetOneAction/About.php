<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\GetOneAction;
use Restaurant\Service\Interfaces\OneActionInterface;
use Restaurant\Entity\TableAboutUsRestaurant;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * Description of About
 *
 * @author Seva
 */
class About implements OneActionInterface {
    //put your code here
    private $entityManager;
    
    public function __construct($entityManager){
        $this->entityManager = $entityManager;
    }
    public function getOneAction($data) {
        
        $data_about_us_new = $this->entityManager
                ->createQueryBuilder()
                ->select("IDENTITY(t.photoHead) AS photoHead ",'IDENTITY(t.photoHuman) AS photoHuman','IDENTITY(t.photoAbout) AS photoAbout','IDENTITY(t.video) AS video','t')
                ->addSelect('phe','phu','pha', 'vid')
                ->from(TableAboutUsRestaurant::class,'t')
                ->leftjoin('t.photoHead','phe')
                ->leftjoin('t.photoHuman','phu')
                ->leftjoin('t.photoAbout','pha')
                ->leftjoin('t.video','vid')
                ->orderBy('t.id', 'DESC')
                ->setMaxResults(1);
        $data_about_us_new1 = $data_about_us_new->getQuery()->getArrayResult();
        $data_result = $data_about_us_new1[0][0];
        $name = str_replace(' ','<br>',$data_result['nameHuman'] );
        $data_result['nameHuman1'] = $name;
        
        //debug($data_result);die();
        return $data_result ;
    }
}
