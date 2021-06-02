<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Service;

use Zend\Permissions\Rbac\Rbac;
use Restaurant\Entity\Adminrule;
/**
 * Description of RbacAssertionManager
 *
 * @author Seva
 */
class RbacAssertionManager {
    //put your code here
    /**
     * Менеджер сущностей.
     * @var Doctrine\ORM\EntityManager 
     */
    private $entityManager;
    
    /**
     * Служба аутентификации.
     * @var Zend\Authentication\AuthenticationService 
     */
    private $authService;
    
    /**
     * Конструирует сервис.
     */
    public function __construct($entityManager, $authService) 
    {
        $this->entityManager = $entityManager;
        $this->authService = $authService;
    }
    
    /**
     * Этот метод используется для динамичечких утверждений. 
     */
    
    public function assert(Rbac $rbac, $permission, $params)
    {
        $currentUser = $this->entityManager->getRepository(\Adminrule::class)
                ->findOneByEmail($this->authService->getIdentity());
        
        if ($permission=='profile.own.view' && $params['user']->getId()==$currentUser->getId())
            return true;
        
        return false;
    }
}
