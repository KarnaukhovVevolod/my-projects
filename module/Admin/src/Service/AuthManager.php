<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Service;
use Zend\Authentication\Result;

/**
 * Description of AuthManager
 *
 * @author Seva
 */


class AuthManager {
    //put your code here
    
    /**
     * Authentication service.
     * @var \Zend\Authentication\AuthenticationService
     */
    private $authService;
    
    /**
     * Session manager.
     * @var Zend\Session\SessionManager
     */
    private $sessionManager;
    
    /**
     * Contents of the 'access_filter' config key.
     * @var array 
     */
    private $config;
    
    /**
     * конструктор.
     */
    
    public function __construct($authService, $sessionManager, $config) {
        $this->authService = $authService;
        $this->sessionManager = $sessionManager;
        $this->config = $config;
    }
    /**
    * Совершает попытку входа на сайт. Если значение аргумента $rememberMe равно true, сессия
    * будет длиться один месяц (иначе срок действия сессии истечет через один час).
    */
    public function login($email, $password, $rememberMe)
    {
        //Проверяем, вошёл ли пользователь в систему. Если так, не позволяем
        //ему войти дважды.
        if($this->authService->getIdentity() != null){
            throw new \Exception('Already logged in');
        }
        
         // Аутентифицируем пользователя.
        $authAdapter = $this->authService->getAdapter();
        //debug($authAdapter);
        //die();
        $authAdapter->setEmail($email);
        $authAdapter->setPassword($password);
        $result = $this->authService->authenticate();

        // Если пользователь хочет, чтобы его "запомнили", мы зададим срок действия
        // сессии, равный одному месяцу. По умолчанию, срок действия сессии истекает 
        // через 1 час (как указано в файле config/global.php).
        if ($result->getCode()==Result::SUCCESS && $rememberMe) {
            // Срок действия cookie сессии закончится через 1 месяц (30 дней).
            $this->sessionManager->rememberMe(60*60*24*30);
        }
    
        return $result;
    }
    
    /**
    * Осуществляет выход пользователя из системы.
    */
   public function logout()
   {
       //debug('identity');
       //debug($this->authService->getIdentity());
       
       //die();
       //return $this->auth
       // Позволяет выйти из учетной записи только авторизованному пользователю.
        if ($this->authService->getIdentity()==null) {
            //throw new \Exception('The user is not logged in');
        }
        else{
            // Удаляем личность из сессии.
            $this->authService->clearIdentity();
        }
                      
   }
   
   /**
    * Это простой фильтр контроля доступа. Он может ограничить доступ к определенным страницам
    * для неавторизованных пользователей.
    * 
    * Этот метод использует ключ 'access_filter' в файле конфигурации и определяет,
    * разрешен ли текущему посетителю доступ к заданному действию контроллера. Если
    * разрешен, он возвращает true, иначе - false.
    */
    public function filterAccess($controllerName, $actionName)
    {
        // Определяем режим - 'ограничительный' (по умолчанию) или 'разрешающий'. В ограничительном
        // режиме все действия контроллеров должны быть явно перечислены под ключом конфигурации 'access_filter',
        // и для неавторизованных пользователей доступ будет запрещен к любому не указанному в этом списке действию. 
        // В разрешающем режиме, если действие не указано под ключом 'access_filter' доступ к нему все равно 
        // разрешен для всех (даже для неавторизованных пользователей). Рекомендуется использовать более безопасный
        // ограничительный режим.
        //debug('filter');
        //die();
        
        $mode = isset($this->config['options']['mode'])?$this->config['options']['mode']:'restrictive';
        if ($mode!='restrictive' && $mode!='permissive')
            throw new \Exception('Invalid access filter mode (expected either restrictive or permissive mode');

        if (isset($this->config['controllers'][$controllerName])) {
            $items = $this->config['controllers'][$controllerName];
            foreach ($items as $item) {
                $actionList = $item['actions'];
                $allow = $item['allow'];
                if (is_array($actionList) && in_array($actionName, $actionList) ||
                    $actionList=='*') {
                    if ($allow=='*')
                        return true; // Все могут просматривать страницу.
                    else if ($allow=='@' && $this->authService->hasIdentity()) {
                        return true; // Только аутентифицированный пользователь может просматривать страницу.
                    } else {                    
                        return false; // В доступе отказано.
                    }
                }
            }            
        }
    
    // В ограничительном режиме мы запрещаем неавторизованным пользователям доступ к любому действию,
    // не перечисленному под ключом 'access_filter' (из соображений безопасности).
    if ($mode=='restrictive' && !$this->authService->hasIdentity())
        return false;
    
    // Разрешаем доступ к этой странице.
    return true;
        
    }
   
   
}
