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
 * Description of ContactForm
 *
 * @author Seva
 */
class ContactForm extends Form{
    //put your code here
    public function __construct($action) {
        parent::__construct('contact-form');
        $this->setAttribute('method', 'post');
        $this->setAttribute('action',$action);
        
        $this->addElements();
        $this->addInputFilter();
    }
    
    protected function addElements()
    {
        
        //add the name field
        $this->add([
            'type' => 'text',
            'name' => 'name_human',
            'attributes'=>[
                'id'=>'name_human'
            ],
            'options'=>[
                'label' => ' '
            ],
        ]);
        
        //add the email field
        $this->add([
            'type' => 'text',
            'name' => 'human_email',
            'attributes'=>[
                'id'=>'human_email'
            ],
            'options'=>[
                'label' => ' '
            ],
        ]);
        
        //add the topic field
        $this->add([
            'type' => 'text',
            'name' => 'human_topic',
            'attributes'=>[
                'id'=>'human_topic'
            ],
            'options'=>[
                'label' => ' '
            ],
        ]);
        
        //add the message field
        $this->add([
            'type' => 'textarea',
            //'type' => 'text',
            'name' => 'human_message',
            'attributes'=>[
                'id'=>'human_message'
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
                    'timeout' => 601
                ],
            ],
        ]); 
        
        //add the submit button
        $this->add([
            'type' => 'submit',
            'name' => 'submit',
            'attributes'=>[
                'value' => 'Отправить сообщение',
                'id' => 'submit_contact'
            ],
        ]);
        
    }
    
    protected function addInputFilter()
    {
        $inputFilter = $this->getInputFilter();
        
        //add filter name_human
        $inputFilter->add([
            'name' => 'name_human',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 1,
                        'max' => 100,
                    ]
                ]
            ]
        ]);
        
        //add filter human_email
        $inputFilter->add([
            'name' => 'human_email',
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
                        'max' => 100,
                    ]
                ]
            ]
        ]);
        
        //add filter human_topic
        $inputFilter->add([
            'name' => 'human_topic',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 1,
                        'max' => 150,
                    ]
                ]
            ]
        ]);
        
        //add filter human_message
        $inputFilter->add([
            'name' => 'human_message',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 1,
                        'max' => 8192
                    ],
                ]
            ]
        ]);
    }
}
