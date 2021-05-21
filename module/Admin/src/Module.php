<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin;

use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\ModuleManager;
use Zend\Session\SessionManager;
use Zend\Mvc\Controller\AbstractActionController;
use Admin\Controller\AuthController;
use Admin\Service\AuthManager;

/**
 * Description of Module
 *
 * @author Seva
 */
class Module {
    //put your code here
    public function getConfig()
    {
        return include __DIR__.'/../config/module.config.php';
    }
    /*
    public function init(ModuleManager $manager)
    {
        // Получаем менеджер событий.
        $eventManager = $manager->getEventManager();
        $sharedEventManager = $eventManager->getSharedManager();
        // Регистрируем метод-обработчик. 
        $sharedEventManager->attach(__NAMESPACE__, 'dispatch', 
                                    [$this, 'onDispatch'], 100);
    }
     * 
     */
    
    /**
     * Этот метод вызывается по завершению самозагрузки MVC.
     * @param \Zend\Mvc\MvcEvent $event
     */
    public function onBootstrap(MvcEvent $event)
    {
        //debug('bootstrap');die();
        //Получаем менеджер событий.
        $eventManager = $event->getApplication()->getEventManager();
        $sharedEventManager = $eventManager->getSharedManager();
        // Регистрируем метод-обработчик.
        //$sharedEventManager->attach(AbstractActionController::class,
        //        MvcEvent::EVENT_DISPATCH, [$this, 'onDispatch'],100);
        $sharedEventManager->attach(__NAMESPACE__, 'dispatch', 
                                    [$this, 'onDispatch'], 100);
                
        //настройка session        
        $admin = $event->getApplication();
        $serviceManager = $admin->getServiceManager();
        
        //Следующая строка инстанцирует SessionManager и автоматически
        // делает его выбираемым по умолчанию.
        $sessionManager = $serviceManager->get(SessionManager::class);
        //$this->for
    }
    
    /**
     * Метод-обработчик для события 'Dispatch'. Мы обрабатываем событие Dispatch
     * для вызова фильтра доступа. Фильтр доступа позволяет определить,
     * может ли пользователь просматривать страницу. Если пользователь не
     * авторизован, и у него нет прав для просмотра, мы перенаправляем его 
     * на страницу входа на сайт.
     */
    public function onDispatch(MvcEvent $event)
    {
        // Получаем контроллер и действие, которому был отправлен HTTP-запрос.
        $controller = $event->getTarget();
        //debug('onDispatch');
        //die();
        $controllerName = $event->getRouteMatch()->getParam('controller', null);
        $actionName = $event->getRouteMatch()->getParam('action', null);
        
        // Конвертируем имя действия с пунктирами в имя в верхнем регистре.
        $actionName = str_replace('-', '', lcfirst(ucwords($actionName, '-')));
        
        // Получаем экземпляр сервиса AuthManager.
        $authManager = $event->getApplication()->getServiceManager()->get(AuthManager::class);
        
        // Выполняем фильтр доступа для каждого контроллера кроме AuthController
        // (чтобы избежать бесконечного перенаправления).
        if ($controllerName!=AuthController::class && 
            !$authManager->filterAccess($controllerName, $actionName)) {
            
            // Запоминаем URL страницы, к которой пытался обратиться пользователь. Мы перенаправим пользователя
            // на этот URL после успешной авторизации.
            $uri = $event->getApplication()->getRequest()->getUri();
            // Делаем URL относительным (убираем схему, информацию о пользователе, имя хоста и порт),
            // чтобы избежать перенаправления на другой домен недоброжелателем.
            $uri->setScheme(null)
                ->setHost(null)
                ->setPort(null)
                ->setUserInfo(null);
            $redirectUrl = $uri->toString();
            
            // Перенаправляем пользователя на страницу "Login".
            return $controller->redirect()->toRoute('login', [], 
                    ['query'=>['redirectUrl'=>$redirectUrl]]);
        }
        
    }
    
}
