<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Edite;

use Restaurant\Entity\ContactCompanyRestaurant;
use Restaurant\Entity\PhotoFonRestaurant;
use Restaurant\Entity\Photorestaurant;

/**
 * Description of ContactEdite
 *
 * @author Seva
 */
class ContactEdite {
    //put your code here
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function ReadDatabase ($data){
        $limit = $data['limit'];
        $start = $data['start'];
        
        $contact_fon = $this->entityManager
                ->createQueryBuilder()
                ->select('fon','photoFon')
                ->from(PhotoFonRestaurant::class,'fon')
                ->leftjoin('fon.photo','photoFon')
                ->setFirstResult($start)
                ->setMaxResults($limit)
                ;
        $fon_database = $contact_fon->getQuery()->getArrayResult();
        
        $image = $this->entityManager
                ->createQueryBuilder()
                ->select('photo')
                ->from(Photorestaurant::class,'photo')
                //->orderBy('photo.id','DESC')
                ->setFirstResult($start)
                ->setMaxResults($limit)
                ;
        $image_database = $image->getQuery()->getArrayResult();
        
        //debug($image_database);
        //$image_count = $this->entityManager
        //        ->select();
        $em = $this->entityManager;
        //$RAW_QUERY = 'SELECT * FROM photorestaurant where photorestaurant.id > 1 LIMIT 5;';
        $RAW_QUERY = 'SELECT COUNT(*) FROM photorestaurant';
        //$RAW_QUERY = 'SELECT photorestaurant.id, photorestaurant.photo,FROM photorestaurant';
        //$RAW_QUERY = 'SELECT * FROM photorestaurant OFFSET 5 ROWS FETCH NEXT 6 ROWS ONLY';//пагинация
        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $image_count = $statement->fetchAll();
        $image_param = ['image_start'=>$start,'image_end'=>$image_count[0]['count'],'image_step'=>$limit];
        //debug($result);
        //die();
        
        $contact_data = $this->entityManager
                ->createQueryBuilder()
                ->select('contact','photo')
                ->from(ContactCompanyRestaurant::class,'contact')
                ->leftjoin('contact.photoHeadId','photo')
                ->setFirstResult($start)
                ->setMaxResults($limit)
                ;
        $contact_data_database = $contact_data->getQuery()->getArrayResult();
        $i = 0;
        foreach($contact_data_database as $contact ){
            if( isset($contact['contentWithAdress']) ){
                $contact = htmlspecialchars($contact['contentWithAdress']);
                //$char = htmlspecialchars($contact['contentWithAdress']);
                $contact_data_database[$i]['contentWithAdress_code'] = $contact;
            }
            $i++;
        }
        //debug($char);
        //debug($contact_data_database);die();
        //debug($fon_database);
        //debug($image_database);
        //debug($contact_data_database);
        
        //die();
        return ['fon'=>$fon_database,'image'=>$image_database,'contact'=>$contact_data_database,'image_param'=>$image_param];
                
    }
    
    
}
