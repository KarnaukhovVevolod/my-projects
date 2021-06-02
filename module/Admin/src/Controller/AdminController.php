<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;

//use Zend\Session\SessionManager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication;
use Zend\Session\Container;
use Admin\Form\LoginForm;
use Admin\Service\AdminManager;

/**
 * Description of AdminController
 *
 * @author Seva
 */
class AdminController extends AbstractActionController {
    //put your code here
    /**
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;
    private $sessionContainer_2;
    private $sessionManager;
    private $authManager;


    public function __construct($entityManager,$sessionContainer_2,$sessionManager,$authManager) {
        $this->entityManager = $entityManager;
        $this->sessionContainer_2 = $sessionContainer_2;
        $this->sessionManager = $sessionManager;
        $this->authManager = $authManager;
    }
    
    public function onDispatch( \Laminas\Mvc\MvcEvent $e)
    {
        $response = parent::onDispatch($e);
        //$this->layout()->setTemplate('layout/layout2');
        return $response;
    }
    
    public function indexAction()
    {
        if($this->identity() != null) //используем плагин zend-mvc-plugins
        {
            //debug($this->identity());
            //die();
            
        }
        
        //session
        //session_start();
        //$_SESSION['my_var'] = 'Some data';
        /*
        if(isset($_SESSION['my_var']))
            $sessionVar = $_SESSION['my_var'];
        else
            $sessionVar = 'Some default value';
        
        unset($_SESSION['my_var']); //очищает (удаляет данные) сессию
         * *
         */
        
        // Задаем время "жизни" cookie сессии(в секундах), равное 1 часу.
        //ini_set('session.cookie_lifetime', 60*60*1); //переопределяет срок жизни cookie
        //Храним данные сессии на сервере до 1 месяца
        //ini_set('session.gc_maxlifetime', 60*60*24*30); //переопределяет срок жизни cookie
        
        //Извлекаем экземпляр менеджера сессий из менеджера сервисов.
        //$sessionManager = 
        
        /*--=== Инстанцирование контейнера сессий вручную ===--*/
        //предполагаем, что переменная $sessionManager является экземпляром менеджера сессий.
        $sessionContainer = new Container('ContainerNamespace', $this->sessionManager);
        
        //$sessionContainer->myVar = 'Some data 2';
        //unset($sessionContainer->myVar);
        if(isset($sessionContainer->myVar)){
            //debug($sessionContainer->myVar);
           // die();
            $var = $sessionContainer->myVar;
        }
        else{
            $var = null;
        }
        $this->sessionContainer_2->myVar = "Some different data";
        if(isset($this->sessionContainer_2->myVar3)){
            $var_1 = $this->sessionContainer_2->myVar3;
            //debug($this->sessionContainer_2);die();
        }else{
            $var_1 = null;
        }
        //unset($this->sessionContainer_2);
        /*--=== Создаём контейнер сессий с использованием фабрики ===--*/
        //$sessionContainer_2 = $c
        
        //читаем форму
        $url = $this->url()->fromRoute('admin',['action'=>'index']);
        $step = 1;
        $form = new LoginForm($url, $step);
        return new ViewModel(['var'=>$var, 'var1'=>$var_1,'form'=>$form]);
    }
    public function editAction(){
        $url = $this->url()->fromRoute('admin', ['action'=>'edit']);
        $step = 2;
        
        $data_user = $this->authManager->getIdentity();
        //debug($data_user);die();
        $form = new LoginForm($url, $step);
        
        return new ViewModel(['form'=>$form,'user'=>$data_user]);
    }
    
    public function changeAction(){
        $url = $this->url()->fromRoute('admin',['action'=>'change']);
        $step = 3;
        $form = new LoginForm($url, $step);
        return new ViewModel(['form'=>$form]);
    }
    public function  resetAction(){
        $url = $this->url()->fromRoute('admin',['action'=>'reset']);
        $step = 4;
        
        $data_user = $this->authManager->getIdentity();
        //debug($data_user);die();
        
        $form = new LoginForm($url, $step);
        return new ViewModel(['form'=>$form]);
    }
    public function diffAction(){
        $adminManager = new AdminManager($this->entityManager);
        $adminManager->createAdminUserIfNotExists();
        debug('Ок');
        die();
    }
}
