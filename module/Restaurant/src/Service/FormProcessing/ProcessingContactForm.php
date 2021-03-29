<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service\FormProcessing;

use Restaurant\Form\ContactForm;
use Restaurant\Service\GetAuxiliaryData\MainAuxiliary\MainAuxiliary;

/**
 * Description of ProcessingContactForm
 *
 * @author Seva
 */
class ProcessingContactForm {
    //put your code here
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function ProcessingForm($data_post, $action)
    {
        $contact_form = new ContactForm($action);
        $contact_form->setData($data_post);
        $ajax_data;
        if($contact_form->isValid()){
            //получаем данные
            $get_data = $contact_form->getData();
            //запись в базу данных
            $MainAuxiliary = new MainAuxiliary($this->entityManager);
            $MainAuxiliary->writeMessageContact($get_data);
            //..
            $ajax_data['text'] = 'Ваше сообщение успешно отправленно!';
            $ajax_data['param'] = 1;
        }else{
            $errors = $contact_form->getMessages();
            //debug($errors);
            //die();
            $err;
            //Сообщение об ошибки
            //для поля name_human
            if(isset($errors['name_human'])){
                if(isset($errors['name_human']['isEmpty']))
                    $err['name_human']['message'] = 'Введите Имя';
                if(isset($errors['name_human']['stringLengthTooLong']))
                    $err['name_human']['message'] = 'Слишком длинное сообщениие (максимально возможно 100 символов)';
            }
            
            //для поля email
            if(isset($errors['human_email'])){
                if(isset($errors['human_email']['emailAddressInvalidFormat']))
                    $err['human_email']['message'] = 'Введён неправильный E-mail формат';
                if(isset($errors['human_email']['emailAddressLengthExceeded']))
                    $err['human_email']['message'] = 'Сишком длинный E-mail (E-mail должен быть не более 100 символов)';
                if(isset($errors['human_email']['isEmpty']))
                    $err['human_email']['message'] = 'Введите адрес электронной почты';
            }
            //для поля human_topic
            if(isset($errors['human_topic'])){
                if(isset($errors['human_topic']['isEmpty']))
                    $err['human_topic']['message'] = 'Введите тему для сообщения';
                if(isset($errors['human_topic']['stringLengthTooLong']))
                    $err['human_topic']['message'] = 'Слишком длинное сообщениие (максимально возможно 150 символов)';
            }
            //для поля human_message
            if(isset($errors['human_message'])){
                if(isset($errors['human_message']['isEmpty']))
                    $err['human_message']['message'] = 'Введите сообщение';
                if(isset($errors['human_message']['stringLengthTooLong']))
                    $err['human_message']['message'] = 'Слишком длинное сообщениие (максимально возможно 8192 символа)';
            }
            
            $ajax_data['text'] = $err;
            $ajax_data['param'] = 2;
            
        }
        return $ajax_data;
    }
    
}
