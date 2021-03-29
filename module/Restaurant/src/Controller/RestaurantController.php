<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
//use Laminas\View\Model\ViewModel;
use Zend\Mail;
use Laminas\Math\Rand;
use Restaurant\Entity\Employee;
use Restaurant\Service\EmployeeManager;
use Restaurant\Service\AllLoadingDB\LoadDataBaseRestaurant;
use Restaurant\Service\GetAllDataController\GetAllDataController;
//use Restaurant\Controller\IndexController;
use Restaurant\Form\MailForm;
use Restaurant\Form\ContactForm;
use Restaurant\Service\FormProcessing\ProcessingContactForm;

use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Zend\Paginator\Paginator;



/**
 * Description of RestaurantController
 *
 * @author Seva
 */
class RestaurantController extends AbstractActionController {
    //put your code here
    /**
     * @var Doctrine\ORM\EntityManager
    */
    private $entityManager;
    
    private $employeeManager;
    
    private $getalldata;
    
            
    public function __construct($entityManager, $employeeManager){
        $this->entityManager = $entityManager;
        $this->employeeManager = $employeeManager;
        $this->getalldata = new GetAllDataController($this->entityManager);
    }
    public function onDispatch(\Laminas\Mvc\MvcEvent $e)
    {
        $response = parent::onDispatch($e);
        
        $this->layout()->setTemplate('layout/layout2');
        $data_menu = $this->getalldata->getDataAction('menuSubscription');
        $this->layout()->var2 = $data_menu;
        $url = $this->url()->fromRoute('restaurant',['action'=>'emailform']);
        $mailform = new MailForm($url);
        $this->layout()->mailform = $mailform;
        
        return $response;
    }
    public function indexAction()
    {
        /*Разные способы получения данных из базы данных*/
        /*Способ 1 прямой sql запрос прямо в контроллере */
        $employee = $this->entityManager
                ->getRepository(Employee::class)
                ->find(1);
        $data = $employee->getAllDataEmployee();
        //debug($data);die();
        /*Способ 2 использовать созданный репозиторий как в документации */
        
        /*$employee_new = $this->employeeManager
                ->getDataEmployee();
        debug($employee_new);
         * *
         */
        
        //die();
        /*Способ 3 использовать созданный репозиторий по своему */
        $employee = new EmployeeManager($this->entityManager);
        $data_3 = $employee->getDataEmployee();
        //debug($data_3);
        //die();
        
        /**/
        
        //die();
        return new ViewModel();
    }
    public function aboutAction()
    {
        //$about = new LoadDataBaseRestaurant($this->entityManager);
        //$about->addAboutUsData();
        $data_action_about = $this->getalldata->getDataAction('about');
        //debug($data_action_about);
        //die();
        
        return new ViewModel(['data_action'=>$data_action_about]);
    }
    
    public function contactAction()
    {
        $action = $this->url()->fromRoute('restaurant',['action'=>'contact']);
        $contact_form = new ContactForm($action);
        if($this->getRequest()->isPost()){
            //Заполняем форму POST-данными
            $data = $this->params()->fromPost();
            //debug($data);//die();
            $contact_form->setData($data);
            $process_contact_form = new ProcessingContactForm($this->entityManager);
            $messages = $process_contact_form->ProcessingForm($data, $action);
            
            //debug("getMessage");
            //debug($messages);
            //die();
            $response = $this->getResponse();
            //$url_referer = $this->getRequest()->getHeader('Referer')->getUri();
            $response->setContent(\Zend\Json\Json::encode($messages));
            ///$response->setContent(\Zend\Json\Json::encode($data));
            return $response;
            //return $messages;
            //die();
            /*$ajax_data;
            if($contact_form->isValid()){
                $data = $contact_form->getData();
                //debug($data);
                ////////////////$ajax_data['rel'] = $this->getalldata->loadDataBase('emailRestaurant', $data);
                
                //$ajax_data['text'] = 'Вы успешно подписались на новости';
                $ajax_data['text'] = 'E-mail '.$data['email'] .' успешно подписан на новости';
                $ajax_data['param'] = 1;
            }else{
                
                $errors = $contact_form->getMessages();
                $err;
                //$ajax_data = 'ошибка валидации';
                debug($errors);
                //die();
                
                
            }*/
            
            //$response = $this->getResponse();
            //$url_referer = $this->getRequest()->getHeader('Referer')->getUri();
            //$response->setContent(\Zend\Json\Json::encode($ajax_data));
            
            //return $response;
        }
        //$data_action_contact = $this->getalldata->writeDataBase('contact', null);
        $data_action_contact = $this->getalldata->getDataAction('contact');
        
        
        
        
        return new ViewModel(['data_action'=>$data_action_contact, 'contact_form'=>$contact_form]);
    }
    public function foodsAction()
    {
        return new ViewModel();
    }
    public function lifestyleAction()
    {
        //$loadDataBase = new LoadDataBaseRestaurant($this->entityManager);
        //$loadDataBase->addLifestyle();
        
        //die();
        //получаем параметры от маршрута
        
        $id = $this->params()->fromRoute('id');
        $sort = $this->params()->fromRoute('sort');
        
        debug($id);
        debug($sort);//die();
        $url1 = $this->url()->fromRoute('restaurant',['action'=>'lifestyle','id'=>'id','sort'=>'sort']);
        
        $data_action_lifestyle = $this->getalldata->getDataAction('lifestyle', ['id' => $id,'sort' => $sort,'url' => $url1]);
        
        //debug($data_action_lifestyle);
        //die();
        //$tr = $data_action_lifestyle[3][0]['dateEvent']['date']->getData();
        //debug($data_action_lifestyle);die();
        //debug($data_action_lifestyle[3][0]['dateEvent']['date']->format('Y-m-d'));
        //die();
        return new ViewModel(['data_action' => $data_action_lifestyle]);
    }
    public function singleAction()
    {
        return new ViewModel();
    }
    
    public function emailformAction()
    {
        $url = $this->url()->fromRoute('restaurant',['action'=>'emailform']);
        $mailform = new MailForm($url);
        
        if($this->getRequest()->isPost()){
            //Заполняем форму POST-данными
            $data = $this->params()->fromPost();
            $mailform->setData($data);
            $ajax_data;
            if($mailform->isValid()){
                $data = $mailform->getData();
                //debug($data);
                $ajax_data['rel'] = $this->getalldata->loadDataBase('emailRestaurant', $data);
                
                //$ajax_data['text'] = 'Вы успешно подписались на новости';
                $ajax_data['text'] = 'E-mail '.$data['email'] .' успешно подписан на новости';
                $ajax_data['param'] = 1;
            }else{
                
                $errors = $mailform->getMessages();
                $err;
                //$ajax_data = 'ошибка валидации';
                //debug($errors);
                //die();
                
                if(isset($errors['email']['emailAddressInvalidFormat'])){
                    $err = 'Введён неправильный формат E-mail';
                }
                elseif(isset($errors['email']['emailAddressLengthExceeded'])){
                    $err = 'Сишком длинный E-mail (E-mail должен быть не более 120 символов)';
                }
                else{
                    $err = 'Введите адрес электронной почты';
                }
                $ajax_data['text'] = $err;
                $ajax_data['param'] = 2;
            }
            $response = $this->getResponse();
            $url_referer = $this->getRequest()->getHeader('Referer')->getUri();
            $response->setContent(\Zend\Json\Json::encode($ajax_data));
            
            return $response;
            //return $this->redirect()->toUrl($url_referer) ;
            
        }
    }
    
}
