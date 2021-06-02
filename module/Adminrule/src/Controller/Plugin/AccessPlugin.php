<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

/**
 * Description of AccessPlugin
 *
 * @author Seva
 */
class AccessPlugin extends AbstractPlugin {
    //put your code here
     private $rbacManager;
    
    public function __construct($rbacManager)
    {
        $this->rbacManager = $rbacManager;
    }
    
    /**
     * Проверяет наличие заданной привилегии у залогиненного в текущий момент пользователя.
     * @param string $permission Имя привилегии.
     * @param array $params Опциональные параметры (используются только если привилегия связана с утверждением).
     */
    public function __invoke($permission, $params = [])
    {
        return $this->rbacManager->isGranted(null, $permission, $params);
    }
}
