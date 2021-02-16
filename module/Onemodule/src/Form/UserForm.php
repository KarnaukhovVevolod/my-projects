<?php

namespace Onemodule\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;



class UserForm extends Form {
    //put your code here
    
    public function __construct() {
        //define form name;
        parent::__construct('contact-user-form');
        
        // Set POST method for this form
        $this->setAttribute('method', 'post');
        
        $this->addElements();
        $this->addInputFilter();    
    }
    /**
     * This method adds elements to form (input fields and submit button).
     */
    protected function addElements()
    {
        // add "name" field
        $this->add([
            'type' => 'text',
            'name' => 'user_name',
            'attributes' => [
                'id' =>'name'
            ],
            'options' =>[
                'label' => 'Your name user',
            ]
        ]);
        
        //add "email" field
        $this->add([
           'type' => 'text',
           'name' => 'user_email',
            'attributes'=>[
                'id' => 'user_email'
            ],
            'options'=>[
                'label' => 'Your email user',
            ]
        ]);
        
        //add "text" field
        $this->add([
            'type' => 'textarea',
            'name' => 'message',
            'attributes'=>[
                'id' => 'message'
            ],
            'options' => [
                'label' => 'Message',
            ]
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
                'value' => 'Submit',
                'id' => 'submitbutton',
            ],
        ]);
    }
    
    /**
     * This method creates input filter (used for form filtering/validation).
     */
    private function addInputFilter()
    {
        $inputFilter = $this->getInputFilter();
        
        $inputFilter->add([
            'name' => 'user_email',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim'],
                
            ],/*
            'validators'=>[
                [
                    'name' => 'EmailAddress',
                    'options' => [
                        'allow' => \Zend\Validator\Hostname::ALLOW_DNS,
                        'useMxCheck' => false,
                    ],
                ],
            ],
            */
        ]);
        $inputFilter->add([
            'name' => 'user_name',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim']
            ],/*
            'validators' => [
                'name' => 'StringLength',
                'options' => [
                    'min' => 1,
                    'max' => 30
                ]
            ]*/
        ]);
        
        $inputFilter->add([
            'name' => 'message',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim']
            ],/*
            'validators' => [
                'name' => 'StringLength',
                'options' => [
                    'min' => 1,
                    'max' => 120
                ]
            ]*/
        ]);
    }
    
    
    
    
}
