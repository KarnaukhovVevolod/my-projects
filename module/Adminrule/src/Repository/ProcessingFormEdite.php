<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Repository;

use Adminrule\Form\SiteEditing\EditingForm;
use Adminrule\Repository\DatabaseContactPage;

/**
 * Description of ProcessingFormEdite
 *
 * @author Seva
 */
class ProcessingFormEdite {
    //put your code here
    
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function processingForm($data)
    {
        $data_form = $data['form'];
        $action = $data['action'];
        //return $data_form;
        
        $form = null;
        $load = null;
        
        if ( isset( $data_form['table_update']) ){
            switch ($data_form['table_update']){
                case('fon'): $form = new EditingForm('fon-form', 'fon', $action);
                    break;
                case('image'): $form = new EditingForm('image-form', 'image', $action);
                    break;
                case('contact'): $form = new EditingForm('contact-form', 'contact', $action);
                    break;
                case('image_load'): $load = $this->loadImage($data_form);
                    return $load;
                    break;
                default: $form = null;
                    break;
            }
        }
        
        //return $data_form;
        
        if($form != null && $data_form['create_record'] != 'delete' ){
            $form->setData($data_form);
            
            if($form->isValid()){
                $get_data = $form->getData();
                //$get_data['path'] = 'images/bg_4.jpg';
                $database = new DatabaseContactPage($this->entityManager);
                $return_data = $database->PhotoFon($get_data);
                //return[1, $get_data];
                return $return_data;
            }
            else{
                $error = $form->getMessages();
                return[0, $error];
            } 
        }
        elseif( $data_form['create_record'] == 'delete' ) {
            $database = new DatabaseContactPage($this->entityManager);
            $return_data = $database->PhotoFon($data_form);
            //$return_data = $data_form;
            return $return_data;
        }
        return[0, null];
    }
    
    public function loadImage($data){
        $start = (int)$data[0];
        $end   = (int)$data[1];
        $step  = (int)$data[2];
        $start_need = $start + $step;
        
        if( $start_need < $end ){
            $em = $this->entityManager;
            $RAW_QUERY = 'SELECT * FROM photorestaurant OFFSET '.$start_need.' FETCH NEXT '.$step .' ROWS ONLY';

            $statement = $em->getConnection()->prepare($RAW_QUERY);
            $statement->execute();
            $image_data = $statement->fetchAll();
            $c_count = count($image_data);
            $current = $start_need + $c_count;
            return [$start_need, $end, $step, $current
                    , $image_data];
        }
        
        return [$start, $end, $step, $end, null];
        
    }
}
