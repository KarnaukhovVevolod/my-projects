<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Form\SiteEditing;

use Zend\Form\Form;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilter;

/**
 * Description of EditingForm
 *
 * @author Seva
 */
class EditingForm extends Form {
    //put your code here
    
    public function __construct($nameForm,$form,$action) {
        
        parent::__construct($nameForm);
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('action', $action);
        if( $form== 'image' ){
            $this->setAttribute('enctype','multipart/form-data');
        }
        $this->addElements($form);
        $this->addInputFilter($form);
        
    }
    
    protected function addElements($form)
    {
        
        $this->add([
            'type'=>'text',
            'name'=>'id',
            'attributes'=>[
                'class' =>'id_edite' 
            ],
            'options'=>[
                'label' => 'id'
            ]
        ]);
        
        if($form == 'fon')
        {
            //add page
            $this->add([
                'type' => 'select',
                'name' => 'fon_page',
                'attributes'=>[
                    'id'=>'fon__page'
                ],
                'options'=>[
                    'label' => 'Страница',
                    'value_options' => [
                        null => 'Выберите страницу',
                        1 => 'Страница с событиями',
                        2 => 'Страница с едой',
                        3 => 'Главная страница сайта',
                        4 => 'Страница статья событие',
                        5 => 'Страница статья еда'
                    ]
                ]
            ]);
            
            //add photo table id
            $this->add([
                'type' => 'text',
                'name' => 'fon_id_photo',
                'attributes'=>[
                    'id' => 'fon_id_photo'
                ],
                'options'=>[
                    'label' => 'id Фото в таблице фото'
                ]
            ]);
             //add the submit button
            $this->add([
                'type' => 'submit',
                'name' => 'submit_fon',
                'attributes'=>[
                    'value' => 'Отправить',
                    'id' => 'submitefon'
                ],
            ]);
            
            //add field table update
            $this->add([
                'type' => 'select',
                'name' => 'table_update',
                'attributes' => [
                    'class'=>'table--update'
                ],
                'options' => [
                    'label' => 'Таблица для редактирования',
                    'value_options' => [
                        'fon' =>'Таблица для фотографии в заголовке страницы'
                    ]
                ],
            ]);
        }
        if($form == 'image')
        {
            $this->add([
                'type' => 'text',
                'name' => 'image_path',
                'attributes'=>[
                    'id' =>'image_path'
                ],
                'options'=>[
                    'label' => 'Путь фото'
                ]
            ]);
             //add the submit button
            $this->add([
                'type' => 'submit',
                'name' => 'submit_image',
                'attributes'=>[
                    'value' => 'Отправить',
                    'id' => 'submitimage'
                ],
            ]);
            
            //add field table update
            $this->add([
                'type' => 'select',
                'name' => 'table_update',
                'attributes' => [
                    'class'=>'table--update'
                ],
                'options' => [
                    'label' => 'Таблица для редактирования',
                    'value_options' => [
                        'image' => 'Таблица для редактирования фотографий'
                    ]
                ],
            ]);
            
            //add field photo loading
            $this->add([
                'type' =>'file',
                'name' => 'photo_user',
                'attributes'=>[
                    'id' => 'id_image_user',
                ],
                'options'=>[
                    'label'=>'Загрузить своё фото (необязательно)'
                ],
            ]);
            
        }
        if($form == 'contact')
        {
            $this->add([
                'type' => 'text',
                'name' => 'contact_photo_path_head',
                'attributes'=>[
                    'id' =>'contact_photo_path_head'
                ],
                'options'=>[
                    'label' => 'id фото в таблице фото'
                ]
            ]);
            
            $this->add([
                'type' => 'textarea',
                'name' => 'contact_content_address',
                'attributes'=>[
                    'id' =>'contact_content_address'
                ],
                'options'=>[
                    'label' => 'Контент с адресом компании'
                ]
            ]);
            
            $this->add([
                'type' => 'text',
                'name' => 'contact_address',
                'attributes'=>[
                    'id' =>'contact_address'
                ],
                'options'=>[
                    'label' => 'Адрес компании'
                ]
            ]);
            $this->add([
                'type' => 'text',
                'name' => 'contact_telephone_company',
                'attributes'=>[
                    'id' =>'contact_telephone_company'
                ],
                'options'=>[
                    'label' => 'Телефон компании'
                ]
            ]);
            $this->add([
                'type' => 'text',
                'name' => 'contact_email_company',
                'attributes'=>[
                    'id' =>'contact_email_company'
                ],
                'options'=>[
                    'label' => 'E-mail компании'
                ]
            ]);
            $this->add([
                'type' => 'text',
                'name' => 'contact_link_site',
                'attributes'=>[
                    'id' =>'contact_link_site'
                ],
                'options'=>[
                    'label' => 'Ссылка на сайт'
                ]
            ]);
             //add the submit button
            $this->add([
                'type' => 'submit',
                'name' => 'submit_contact',
                'attributes'=>[
                    'value' => 'Отправить',
                    'id' => 'submitcontact'
                ],
            ]);
            //add field table update
            $this->add([
                'type' => 'select',
                'name' => 'table_update',
                'attributes' => [
                    'class'=>'table--update'
                ],
                'options' => [
                    'label' => 'Таблица для редактирования',
                    'value_options' => [
                        'contact' => 'Таблица для редактирования контактов компании'
                    ]
                ],
            ]);
        }
        
        //add create
        $this->add([
            'type' => 'checkbox',
            'name' => 'create_record',
            'attributes' =>[
                'class'=>'checkbox-create'
            ],
            'options' => [
                'label' => 'Создать'
            ],
        ]);
        
        //add the CSRF field
        $this->add([
            'type' => 'csrf',
            'name' => 'csrf',
            'attributes' => [],
            'options' => [
                'csrf_options' => [
                    'timeout' => 601
                ],
            ],
        ]);
        
       
        
    }
    
    private function addInputFilter($form)
    {
        $inputFilter = $this->getInputFilter();
        
        $inputFilter->add([
            'name'     => 'id',
            'required' => false,
            'filters' => [
                ['name'=> 'ToInt']
            ],
            
        ]);
        
        if($form == 'fon')
        {
            $inputFilter->add([
                'name'     => 'fon_id_photo',
                'required' => true,
                /*
                'filters' => [
                    ['name'=> 'ToInt']
                ],
                */
                'validators'=>[
                ],
            ]);
            
            //add page
            $inputFilter->add([
                'name' => 'fon_page',
                'required' => true,
                'validators'=>[],
            ]);
            
            
        }
        
        if($form == 'image')
        {
            $inputFilter->add([
                'name'     => 'image_path',
                'required' => false,
                'filters' => [
                    ['name' => 'StringTrim']
                ],
                'validators'=>[
                    ['name' => 'StringLength',
                        'options' =>[
                            'min' => 1,
                            'max' => 150
                        ]
                    ],
                ],
            ]);
            //add photo user comment
            $inputFilter->add([
                'type' => 'Zend\InputFilter\FileInput',
                'name' => 'photo_user',
                'required' => false,
                'validators' =>[
                    ['name' => 'FileUploadFile'],
                    [
                        'name' => 'FileMimeType',
                        'options' => [
                            'mimeType' => ['image/jpeg', 'image/png','image/jpg']
                        ]
                    ],
                     // проверка на количество загружаемых файлов
                    /*
                    ['name' => 'FileCount',
                        'options' =>[
                            'max'=>1,
                            'min'=>1
                        ]
                    ],
                    /**/
                    ['name' => 'FileIsImage'],
                    [
                        'name' => 'FileImageSize',
                        'options' =>[
                            'minWidth'  => 32,
                            'minHeight' => 32,
                            'maxWidth'  => 4096,
                            'maxHeight' => 4096,
                        ]
                    ],
                ],
                'filters' => [
                    [
                        'name' => 'FileRenameUpload',
                        'options' => [
                            'target' => './public/images',
                            'useUploadName' => true,
                            'useUploadExtension' => true,
                            'overwrite' => true,
                            'randomize' => false
                        ]
                    ]
                ],
            ]);
            
        }
        
        if($form == 'contact')
        {
            $inputFilter->add([
                'name'     => 'contact_photo_path_head',
                'required' => true,
                'filters' => [
                    ['name'=>'ToInt']
                ],
                'validators'=>[
                ],
            ]);
            $inputFilter->add([
                'name'     => 'contact_content_address',
                'required' => true,
                'filters' => [
                ],
                'validators'=>[
                    ['name' => 'StringLength',
                        'options' =>[
                            'min' => 1,
                            'max' => 4096
                        ]
                    ],
                ],
            ]);
            $inputFilter->add([
                'name'     => 'contact_address',
                'required' => true,
                'filters' => [
                ],
                'validators'=>[
                    ['name' => 'StringLength',
                        'options' =>[
                            'max' => 1000,
                            'min' => 1
                        ]
                    ],
                ],
            ]);
            $inputFilter->add([
                'name'     => 'contact_telephone_company',
                'required' => true,
                'filters' => [
                ],
                'validators'=>[
                    ['name' => 'StringLength',
                        'options' =>[
                            'max' => 45,
                            'min' => 1
                        ]],
                ],
            ]);
            $inputFilter->add([
                'name'     => 'contact_email_company',
                'required' => true,
                'filters' => [
                    ['name' => 'StringTrim']
                ],
                'validators'=>[
                    [
                        'name' => 'EmailAddress',
                        'options' => [
                            'allow' => \Zend\Validator\Hostname::ALLOW_DNS,
                            'useMxCheck' => false,                            
                        ],
                    ],
                    ['name' => 'StringLength',
                        'options' =>[
                            'max' => 100,
                            'min' => 1
                        ]
                    ]
                    
                ],
            ]);
            $inputFilter->add([
                'name'     => 'contact_link_site',
                'required' => true,
                'filters' => [
                ],
                'validators'=>[
                    ['name' => 'StringLength',
                        'options' =>[
                            'max' => 150
                        ]],
                ],
            ]);
        }
    }
    
    
}
