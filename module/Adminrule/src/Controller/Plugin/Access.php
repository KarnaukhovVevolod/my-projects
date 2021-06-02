<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Controller\Plugin;

use Zend\View\Helper\AbstractHelper;

/**
 * Description of Access
 *
 * @author Seva
 */

/**
 * Этот помощник представления используется для проверки привилегий пользователя.
 */

class Access extends AbstractHelper {
    //put your code here
    private $rbacManager = null;
    
    public function __construct($rbacManager) 
    {
        $this->rbacManager = $rbacManager;
    }
    
    public function __invoke($permission, $params = [])
    {
        return $this->rbacManager->isGranted(null, $permission, $params);
    }
}
