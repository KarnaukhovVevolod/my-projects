<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Form;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\Form\Element;
/**
 * Description of AdminForm
 *
 * @author Seva
 */
class AdminForm extends Form {
    //put your code here
    public function __construct($action) {
        parent::__construct('admin-form');
        $this->setAttribute('method', 'post');
        //$this->setAttribute('action',$action);
        //$this->setAttribute('redirect_url','ttt');
        
        $this->addElements();
        $this->addInputFilter();
    }
    
    protected function addElements(){
        
            //add the email field
            $this->add([
                'type' => 'text',
                'name' => 'email_admin',
                'attributes'=>[
                    'id'=>'email_admin',
                    'class'=>'form-control'
                ],
                'options'=>[
                    'label' => ' E-mail'
                ],
            ]);
            
            //add the password field
            $this->add([
                'type' => 'text',
                'name' => 'password_admin',
                'attributes'=>[
                    'id'=>'password_admin',
                    'class'=>'form-control'
                ],
                'options'=>[
                    'label' => 'Пароль'
                ],
            ]);
            
            //add checkbox
            $this->add([
                'type' => 'checkbox',
                'name' => 'remember_me',
                'attributes'=>[
                    'id' => 'id_remember_me',
                    'class'=>'form-control'
                ],
                'options'=>[
                    'label' => 'Запомнить меня',
                ]
            ]);
            //add the redirect_url
            $this->add([
                'type' => 'text',
                'name' => 'redirect_url',
                'attributes'=>[
                    'id'=>'id_redirect_url',
                    'class'=>'form-control'
                ],
                'options'=>[
                    'label' => 'ссылка на перенаправление'
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
                'value' => 'Зарегистрироваться',
                'id' => 'submit_contact',
                'class'=> 'btn btn-primary py-3 px-5 submitContact1'
            ],
        ]);
    }
    
    protected function addInputFilter()
    {
        $inputFilter = $this->getInputFilter();
        
        //add filter email
        $inputFilter->add([
            'name' => 'email_admin',
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
                        'max' => 128,
                    ]
                ]
            ]
        ]);
        
        //add password
        $inputFilter->add([
            'name'     => 'password_admin',
            'required' => true,
            'filters'  => [                    
            ],                
            'validators' => [
                [
                    'name'    => 'StringLength',
                    'options' => [
                        'min' => 6,
                        'max' => 64
                    ],
                ],
            ],
        ]); 
        //add filter redirect_url
        $inputFilter->add([
            'name' => 'redirect_url',
            'required' => false,
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
            
    }
    
}
