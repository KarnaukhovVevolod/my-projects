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
 * Description of ComentForm
 *
 * @author Seva
 */
class ComentForm extends Form {
    //put your code here
    public function __construct($action) {
        parent::__construct('comment-form');
        $this->setAttribute('method', 'post');
        $this->setAttribute('action', $action);
        
        $this->addElements();
        $this->addInputFilter();
        
    }
    
    protected function addElements()
    {
        
        //add the id_comment field
        $this->add([
            //'type' => 'number',
            //'type' => 'toint',
            'type' => 'text',
            'name' => 'id_comment',
            'attributes'=>[
                'id' => 'idComment'
            ],
            'options'=>[
                'label' => 'idComment'
            ],
        ]);
        
        //add name user comment
        $this->add([
            'type' => 'text',
            'name' => 'name_user_comment',
            'attributes'=>[
                'id' => 'id_name_user_comment'
            ],
            'options'=>[
                'label' => 'Введите ваше имя фамилию',
            ],
        ]);
        //add message user comment
        $this->add([
            'type' => 'textarea',
            'name' => 'message_user_comment',
            'attributes'=>[
                'id' => 'id_message_user_comment'
            ],
            'options'=>[
                'label' => 'Введите комментарий'
            ],
        ]);
        //add photo user comment
        $this->add([
            'type' => 'file',
            'name' => 'photo_user',
            'attributes'=>[
                'id' => 'id_image_user',
            ],
            'options'=>[
                'label'=>'Загрузить своё фото (необязательно)'
            ],
        ]);
        
        //add email user comment
        $this->add([
            'type' => 'text',
            'name' => 'email_user_comment',
            'attributes'=>[
                'id' => 'id_email_user_comment'
            ],
            'options'=>[
                'label' => 'Введите ваш E-mail'
            ],
        ]);
        
        //add id_descriptionDish
        $this->add([
            //'type' => 'number',
            'type' => 'text',
            'name' => 'id_descriptionDish',
            'attributes'=>[
                'id' => 'id__id_descriptionDish'
            ],
            'options'=>[
                'label' => 'id__id_descriptionDish',
            ]
        ]);
        
        //add id_commentDish
        $this->add([
            //'type' => 'number',
            'type' => 'text',
            'name' => 'id_commentDish',
            'attributes'=>[
                'id' => 'id__id_commentDish'
            ],
            'options'=>[
                'label' => 'id__id_commentDish',
            ]
        ]);
        
        //add reply
        $this->add([
            'type' => 'checkbox',
            'name' => 'reply',
            'attributes'=>[
                'id' => 'id_replay'
            ],
            'options'=>[
                'label' => 'Ответил',
            ]
        ]);
        
         //add foods/life
        $this->add([
            'type' => 'checkbox',
            'name' => 'foods-life',
            'attributes'=>[
                'id' => 'id_foods_life'
            ],
            'options'=>[
                'label' => 'Foods-Life',
            ]
        ]);
        
        //add reply_name
        $this->add([
            'type' => 'text',
            'name' => 'reply_name',
            'attributes'=>[
                'id' => 'id_reply_name'
            ],
            'options'=>[
                'label' => 'Reply Name'
            ]
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
        
        //add the submit button
        $this->add([
            'type' => 'submit',
            'name' => 'submit',
            'attributes'=>[
                'value' => 'Комментировать',
                'id' => 'submit_comment'
            ],
        ]);
        
    }
    protected function addInputFilter()
    {
        $inputFilter = $this->getInputFilter();
        
        //add filter id_comment field
        $inputFilter->add([
            'name' => 'id_comment',
            'required' => false,
            'filters' => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
                ['name' => 'StripNewlines'],
            ],
            'validators' => [
                [
                    'name' => 'GreaterThan',
                    'options' => [
                        'min' => 0
                    ]
                ]
            ],
        ]);
        
        //add filter name user comment
        $inputFilter->add([
            'name' => 'name_user_comment',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
            ],
            'validators'=>[
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 1,
                        'max' => 100
                    ]
                ]
            ],
        ]);
        //add filter message user comment
        $inputFilter->add([
            'name' => 'message_user_comment',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
            ],
            'validators'=>[
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 1,
                        'max' => 1000
                    ]
                ]
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
                /* // проверка на количество загружаемых файлов
                ['name' => 'FileCount',
                    'options' =>[
                        'max'=>1,
                        'min'=>1
                    ]
                ],
                */
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
                        'target' => './public/photo_comment',
                        'useUploadName' => true,
                        'useUploadExtension' => true,
                        'overwrite' => true,
                        'randomize' => false
                    ]
                ]
            ],
        ]);
        //add filter email user comment
        $inputFilter->add([
            'name' => 'email_user_comment',
            'required' => false,
            'filters' => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
            ],
            'validators'=>[
                [
                    'name' => 'EmailAddress',
                    'options' => [
                        'allow' => \Zend\Validator\Hostname::ALLOW_DNS,
                        'useMxCheck' => false,
                        'max' => 100,
                    ]
                ]
            ],
        ]);
        
        //add filter id_descriptionDish
        $inputFilter->add([
            'name' => 'id_descriptionDish',
            'required' => false,
            'filters' => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
                ['name' => 'StripNewlines'],
            ],
            'validators' => [
                [
                    'name' => 'GreaterThan',
                    'options' => [
                        'min' => 0
                    ]
                ]
            ],
        ]);
        
        //add filter id_commentDish
        $inputFilter->add([
            'name' => 'id_commentDish',
            'required' => false,
            'filters' => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
                ['name' => 'StripNewlines'],
            ],
            'validators' => [
                [
                    'name' => 'GreaterThan',
                    'options' => [
                        'min' => 0
                    ]
                ],
            ],
        ]);
        
        //add filter reply_name
        $inputFilter->add([
            'name' => 'reply_name',
            'required' => false,
            'filters' => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
                ['name' => 'StripNewlines'],
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'max' => 100
                    ]
                ],
            ]
        ]);
    }
}
