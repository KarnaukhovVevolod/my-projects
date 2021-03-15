<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

/**
 * Description of MailForm
 *
 * @author Seva
 */
class MailForm extends Form {
    //put your code here
    public function __construct($action) {
        parent::__construct('E_mail-form');
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('action', $action
        //$this->url()->fromRoute('home')
                /*$this->url('restaurant',['action'=>'emailform'])*/);
        
        $this->addElements();
        $this->addInputFilter();
        
    }
    
    protected function addElements()
    {
        //add the text field
        $this->add([
            'type' => 'text',
            'name' => 'email',
            'attributes'=>[
                'id'=>'email'
            ],
            'options'=>[
                'label' => ' '
            ],
        ]);
        
        //add the CSRF field
        $this->add([
            'type' => 'csrf',
            'name' =>'csrf',
            'attributes' => [],
            'options' => [
                'csrf_options' => [
                    'timeout' => 600
                ],
            ],
        ]); 
        
        //add the submit button
        $this->add([
            'type' => 'submit',
            'name' => 'submit',
            'attributes'=>[
                'value' => 'Подписаться',
                'id' => 'submit_email'
            ],
        ]);
    }
    private function addInputFilter()
    {
        $inputFilter = $this->getInputFilter();
        $inputFilter->add([
            'name' => 'email',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim'],
            ],
            'validators' => [
                [
                    'name' => 'EmailAddress',
                    'options' => [
                        'allow' => \Zend\Validator\Hostname::ALLOW_DNS,
                        'useMxCheck' => false,
                    ],
                ],
            ]
        ]);
    }
}
