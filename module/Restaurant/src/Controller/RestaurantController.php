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
use Restaurant\Form\ComentForm;
use Restaurant\Service\FormProcessing\ProcessingContactForm;
use Restaurant\Service\FormProcessing\ProcessingSingleForm;

use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Zend\Paginator\Paginator;
use Restaurant\Service\LoadingDatabaseManager;


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
        $data_action_index = $this->getalldata->getDataAction('index');
        return new ViewModel(['data_action'=>$data_action_index]);
    }
    public function aboutAction()
    {
        $data_action_about = $this->getalldata->getDataAction('about');
        
        return new ViewModel(['data_action'=>$data_action_about]);
    }
    
    public function contactAction()
    {
        $action = $this->url()->fromRoute('restaurant',['action'=>'contact']);
        $contact_form = new ContactForm($action);
        if($this->getRequest()->isPost()){
            //?????????????????? ?????????? POST-??????????????
            $data = $this->params()->fromPost();
            $contact_form->setData($data);
            $process_contact_form = new ProcessingContactForm($this->entityManager);
            $messages = $process_contact_form->ProcessingForm($data, $action);
            
            $response = $this->getResponse();
            $response->setContent(\Zend\Json\Json::encode($messages));
            return $response;
        }
        $data_action_contact = $this->getalldata->getDataAction('contact');
        
        return new ViewModel(['data_action'=>$data_action_contact, 'contact_form'=>$contact_form]);
    }
    public function foodsAction()
    {
        $id = $this->params()->fromRoute('id');
        $sort = $this->params()->fromRoute('sort');
        $url1 = $this->url()->fromRoute('restaurant',['action'=>'foods','id'=>'id','sort'=>'sort']);
        
        $data_action_foods = $this->getalldata->getDataAction('foods', ['id' => $id,'sort' => $sort,'url' => $url1]);
        
        return new ViewModel(['data_action' => $data_action_foods]);
    }
    public function lifestyleAction()
    {   
        $id = $this->params()->fromRoute('id');
        $sort = $this->params()->fromRoute('sort');
        $url1 = $this->url()->fromRoute('restaurant',['action'=>'lifestyle','id'=>'id','sort'=>'sort']);
        
        $data_action_lifestyle = $this->getalldata->getDataAction('lifestyle', ['id' => $id,'sort' => $sort,'url' => $url1]);
        
        return new ViewModel(['data_action' => $data_action_lifestyle]);
    }
    public function singleAction()
    {
        $id = $this->params()->fromRoute('id');
        $sort = $this->params()->fromRoute('sort');
        $url1 = $this->url()->fromRoute('restaurant',['action'=>'single','id'=>'id','sort'=>'sort']);
        
        $data_action_single = $this->getalldata->getDataAction('single', ['id' => $id,'sort' => $sort,'url' => $url1]);
        if(isset($data_action_single[4]) && $data_action_single[4] == '??????'){
            $url_prev = $this->url()->fromRoute('restaurant',['action'=>'foods']);
        }else{
            $url_prev = $this->url()->fromRoute('restaurant',['action'=>'lifestyle']);
            $data_action_single[4] = '??????????????';
        }
        $action = $this->url()->fromRoute('restaurant',['action'=>'commentform']);
        $comment_form = new ComentForm($action);
        
        //debug($data_action_single);
        //debug($data_action_single[5][0][0]['dateMessage']['date']->format('Y-m-d'));
        //die();
        
        return new ViewModel(['data_action' => $data_action_single, 'url_prev'=>$url_prev,'CommentForm'=>$comment_form]);
    }
    
    public function emailformAction()
    {
        $url = $this->url()->fromRoute('restaurant',['action'=>'emailform']);
        $mailform = new MailForm($url);
        
        if($this->getRequest()->isPost()){
            //?????????????????? ?????????? POST-??????????????
            $data = $this->params()->fromPost();
            $mailform->setData($data);
            $ajax_data;
            if($mailform->isValid()){
                $data = $mailform->getData();
                //debug($data);
                $ajax_data['rel'] = $this->getalldata->loadDataBase('emailRestaurant', $data);
                
                //$ajax_data['text'] = '???? ?????????????? ?????????????????????? ???? ??????????????';
                $ajax_data['text'] = 'E-mail '.$data['email'] .' ?????????????? ???????????????? ???? ??????????????';
                $ajax_data['param'] = 1;
            }else{
                $errors = $mailform->getMessages();
                $err;
                
                if(isset($errors['email']['emailAddressInvalidFormat'])){
                    $err = '???????????? ???????????????????????? ???????????? E-mail';
                }
                elseif(isset($errors['email']['emailAddressLengthExceeded'])){
                    $err = '???????????? ?????????????? E-mail (E-mail ???????????? ???????? ???? ?????????? 120 ????????????????)';
                }
                else{
                    $err = '?????????????? ?????????? ?????????????????????? ??????????';
                }
                $ajax_data['text'] = $err;
                $ajax_data['param'] = 2;
            }
            $response = $this->getResponse();
            $url_referer = $this->getRequest()->getHeader('Referer')->getUri();
            $response->setContent(\Zend\Json\Json::encode($ajax_data));
            
            return $response;
        }
        
    }
    public function commentformAction()
    {
        $action = $this->url()->fromRoute('restaurant',['action'=>'commentform']);
        
        if($this->getRequest()->isPost()){
            //$data = $this->params()->fromPost();
            $comment_form = new ComentForm($action);
            $data = array_merge_recursive(
            $this->getRequest()->getPost()->toArray(),
            $this->getRequest()->getFiles()->toArray());
            
            $comment_form->setData($data);
            $single_form = new ProcessingSingleForm($this->entityManager);
            $get_data = $single_form->ProcessingForm($data, $action);
            
            $response = $this->getResponse();
            $response->setContent(\Zend\Json\Json::encode($get_data));
            
            return $response;
        }
        else{
            $response = $this->getResponse();
            $return_data[0] = 1;
            $return_data[5] = '???????????? ?????????? ?????????????? ????????????';
            $response->setContent(\Zend\Json\Json::encode($return_data));
            return $response;
        }
        
    }
}
