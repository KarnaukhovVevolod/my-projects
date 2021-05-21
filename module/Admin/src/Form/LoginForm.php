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
 * Description of LoginForm
 *
 * @author Seva
 */
class LoginForm extends Form {
    //put your code here
    
    public function __construct($action, $step) {
        parent::__construct('login-form');
        $this->setAttribute('method', 'post');
        $this->setAttribute('action',$action);
        
        $this->addElements($step);
        $this->addInputFilter($step);
    }
    
    protected function addElements($step){
        if( $step == 1 ){
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
            //add the name field
            $this->add([
                'type' => 'text',
                'name' => 'name_admin',
                'attributes'=>[
                    'id'=>'name_admin',
                    'class'=>'form-control'
                ],
                'options'=>[
                    'label' => 'Полное имя'
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
            //add the confirm password
            $this->add([
                'type' => 'text',
                'name' => 'confirm_password_admin',
                'attributes'=>[
                    'id'=>'confirm_password_admin',
                    'class'=>'form-control'
                ],
                'options'=>[
                    'label' => 'Повторите пароль'
                ],
            ]);


            //add the status field
            $this->add([
                'type' => 'select',
                'name' => 'status_admin',
                'attributes'=>[
                    'id'=>'status_admin',
                    'class'=>'form-control'
                ],
                'options'=>[
                    'label' => 'Повторите пароль',
                    'empty_option' => '-- Пожалуйста выберите, статус ',
                    'value_options' =>[
                        1 =>'Активен',
                        0 =>'Не активен'
                    ]
                ],
            ]);
        }
        elseif( $step == 2 ){
            
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
            
            //add the name field
            $this->add([
                'type' => 'text',
                'name' => 'name_admin',
                'attributes'=>[
                    'id'=>'name_admin',
                    'class'=>'form-control'
                ],
                'options'=>[
                    'label' => 'Полное имя'
                ],
            ]);
            
            //add the status field
            $this->add([
                'type' => 'select',
                'name' => 'status_admin',
                'attributes'=>[
                    'id'=>'status_admin',
                    'class'=>'form-control'
                ],
                'options'=>[
                    'label' => 'Повторите пароль',
                    'empty_option' => '-- Пожалуйста выберите, статус ',
                    'value_options' =>[
                        1 =>'Активен',
                        0 =>'Не активен'
                    ]
                ],
            ]);
            
        }
        elseif( $step == 3 ){
            //add the old password field
            $this->add([
                'type' => 'text',
                'name' => 'old_password_admin',
                'attributes'=>[
                    'id'=>'old_password_admin',
                    'class'=>'form-control'
                ],
                'options'=>[
                    'label' => 'Старый пароль'
                ],
            ]);
            //add the new password field
            $this->add([
                'type' => 'text',
                'name' => 'new_password_admin',
                'attributes'=>[
                    'id'=>'new_password_admin',
                    'class'=>'form-control'
                ],
                'options'=>[
                    'label' => 'Новый пароль'
                ],
            ]);
            //add the confirm new password
            $this->add([
                'type' => 'text',
                'name' => 'confirm_new_password_admin',
                'attributes'=>[
                    'id'=>'confirm_new_password_admin',
                    'class'=>'form-control'
                ],
                'options'=>[
                    'label' => 'Повторить новый пароль'
                ],
            ]);
        }
        elseif( $step == 4 )
        {
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
            //add captcha 
            $this->add([
                'type'  => 'captcha',
                'name' => 'captcha',
                'options' => [
                    'label' => 'Captcha',
                    'captcha' => [
                      'class' => 'Figlet', /* //
                      // Здесь идут опции для конкретного класса ...
                       * 
                       */
                        'wordLen' => 6,
                        'expiration' =>600,
                    ],
                ],
            ]);
            
            
        }
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
    
    protected function addInputFilter($step){
        $inputFilter = $this->getInputFilter();
        
        if( $step == 1){
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
            //add filter name_admin
            $inputFilter->add([
                'name' => 'name_admin',
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
            //add confirm password
            $inputFilter->add([
                'name'     => 'confirm_password_admin',
                'required' => true,
                'filters'  => [                    
                ],                
                'validators' => [
                    [
                        'name'    => 'Identical',
                        'options' => [
                            'token' => 'password_admin'
                        ],
                    ],
                ],
            ]); 
            //add status_admin
            $inputFilter->add([
                'name'     => 'status_admin',
                'required' => false,                
                'filters'  => [
                    ['name' => 'Alpha'],
                    ['name' => 'StringTrim'],
                    ['name' => 'StringToUpper'],
                ],                
                'validators' => [
                    ['name'=>'StringLength', 'options'=>['min'=>1, 'max'=>1]]
                ],
            ]);
        }
        elseif( $step == 2 ){
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
            //add filter name_admin
            $inputFilter->add([
                'name' => 'name_admin',
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
            
            //add status_admin
            $inputFilter->add([
                'name'     => 'status_admin',
                'required' => false,                
                'filters'  => [
                    ['name' => 'Alpha'],
                    ['name' => 'StringTrim'],
                    ['name' => 'StringToUpper'],
                ],                
                'validators' => [
                    ['name'=>'StringLength', 'options'=>['min'=>1, 'max'=>1]]
                ],
            ]);
            
        }
        elseif( $step == 3 ){
            //add old password
            $inputFilter->add([
                'name'     => 'old_password_admin',
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
            //add new password
            $inputFilter->add([
                'name'     => 'new_password_admin',
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
            //add confirm new password
            $inputFilter->add([
                'name'     => 'confirm_new_password_admin',
                'required' => true,
                'filters'  => [                    
                ],                
                'validators' => [
                    [
                        'name'    => 'Identical',
                        'options' => [
                            'token' => 'new_password_admin'
                        ],
                    ],
                ],
            ]); 
        }
        elseif( $step == 4 )
        {
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
            
            
        }
    }
}
