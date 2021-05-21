<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\Result;
use Zend\Uri\Uri;
use Admin\Form\AdminForm;
use Restaurant\Entity\AdminAuthentication;

/**
 * Description of AuthController
 *
 * @author Seva
 */

/**
 * Этот контейнер отвечать для предоставлению пользователю возможности
 * входа в систему и выхода из неё
 */
class AuthController extends AbstractActionController {
    //put your code here
    
    /**
     * Менеджер сущностей.
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;
    
    /**
     * Менеджер аутентификации.
     * @var Admin\Service\AuthManager
     */
    private $authManager;
    
    /**
     * Менеджер пользователей
     * @var Admin\Service\AdminManager
     */
    private $adminManager;
    
    /**
     * конструктор.
     */
    public function __construct($entityManager, $authManager, $adminManager) {
        $this->entityManager = $entityManager;
        $this->authManager = $authManager;
        $this->adminManager = $adminManager;
    }
    
    /**
     * Аутентифицирует пользователя по заданным эл. адресу и паролю.
     */
    public function loginAction()
    {
        //Извлекает URL перенаправления (если такой передаётся). Мы направим пользователя
        //на данный URL после успешной аутентификации.
        $redirectUrl = (string)  $this->params()->fromQuery('redirectUrl','');
        if(strlen($redirectUrl)>2048){
            throw new \Exception("Too long redirectUrl argument passed");
        }
        //Проверяем, есть ли вообще в базе данных пользователи. Если их нет,
        //создадим пользователя 'Admin'.
        $this->adminManager->createAdminUserIfNotExists();
        
        //Создаем форму для входа на сайт.
        $action = $this->url()->fromRoute('auth',['action'=>'login']);
        //debug($action);
        //        die();
        $form = new AdminForm($action);
        $form->get('redirect_url')->setValue($redirectUrl);
        
        //Храним статус входа на сайт
        $isLoginError = false;
        
        //Проверяем, заполнил ли пользователь форму
        if($this->getRequest()->isPost()){
            
            //Заполняем форму POST-данными
            $data = $this->params()->fromPost();
            $form->setData($data);
            //Валидируем форму
            if($form->isValid()){
                //Получаем отфильтрованные и валидированные данные
                $data = $form->getData();
                
                //Выполняем попытку входа в систему.
                $result = $this->authManager->login($data['email_admin'],$data['password_admin'],$data['remember_me']);
                
                //Проверяем результат
                if($result->getCode() == Result::SUCCESS){
                    //Получаем URL перенаправления.
                    $redirectUrl = $this->params()->fromPost('redirect_url', '');
                    
                    if(!empty($redirectUrl)){
                        //Проверка ниже для предотвращения возможных атак перенаправления
                        // (когда кто-то пытается перенаправить пользователя на другой домен).
                        $uri = new Uri($redirectUrl);
                        if(!$uri->isValid() || $uri->getHost()!=null)
                            throw new \Exception('Incorrect redirect URL: ' . $redirectUrl);
                    }   
                    // Если задан URL перенаправления, перенаправляем на него пользователя;
                    // иначе перенаправляем пользователя на страницу Home.
                    if(empty($redirectUrl)) {
                        return $this->redirect()->toRoute('home');
                    } else {
                        $this->redirect()->toUrl($redirectUrl);
                    }
                } else{
                    $isLoginError = true;
                }
            }else{
                $isLoginError = true;
            }
        }
        return new ViewModel([
            'form' => $form,
            'isLoginError' => $isLoginError,
            'redirectUrl' => $redirectUrl
        ]);
        
    }
    
    /**
     * Действие "logout" выполняет опреацию выхода из аккаунт.
     */
    public function logoutAction()
    {
        //debug()
        $this->authManager->logout();
        
        return $this->redirect()->toRoute('login');
    }
    
    
}
