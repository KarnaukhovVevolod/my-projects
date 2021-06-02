<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\View\Helper;
use Zend\View\Helper\AbstractHelper;

/**
 * This view helper is used to check user permissions.
 */
/**
 * Description of Access
 *
 * @author Seva
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
