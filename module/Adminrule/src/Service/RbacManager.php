<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adminrule\Service;

use Zend\Permissions\Rbac\Rbac;
use Zend\Permissions\Rbac\Role as RbacRole;
use Restaurant\Entity\Adminrole;
use Restaurant\Entity\Role;
use Restaurant\Entity\Permission;

/**
 * Этот сервис отвечает за инициализацию RBAC (Role-Based Access Control – контроль доступа на основе ролей).
 */
class RbacManager {
    //put your code here
    /**
     * Менеджер сущностей Doctrine.
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager; 
    
    /**
     * Сервис RBAC.
     * @var Zend\Permissions\Rbac\Rbac
     */
    private $rbac;
    
    /**
     * Сервис аутентификации.
     * @var Zend\Authentication\AuthenticationService 
     */
    private $authService;
    
    /**
     * Кэш файловой системы.
     * @var Zend\Cache\Storage\StorageInterface
     */
    private $cache;
    
    /**
     * Менеджеры утверждений.
     * @var array
     */
    private $assertionManagers = [];
    
    /**
     * Конструирует сервис.
     */
    public function __construct($entityManager, $authService, $cache, $assertionManagers) 
    {
        $this->entityManager = $entityManager;
        $this->authService = $authService;
        $this->cache = $cache;
        $this->assertionManagers = $assertionManagers;
    }
    
    /**
     * Инициализирует контейнер RBAC.
     */
    public function init($forceCreate = false)
    {
        if ($this->rbac!=null && !$forceCreate) {
            // Уже инициализирован; ничего не делаем
            return;
        }
        
        // Если пользователь хочет, чтобы мы заново инициализировали контейнер RBAC, очищаем кэш.
        if ($forceCreate) {
            /* версия с кэшем */
            $this->cache->removeItem('rbac_container');
            /*версия с session*/
            //unset($this->cache->myV);
        }
        
        // Пробуем загрузить контейнер Rbac из кэша.
        /* версия с кэшем */
        $this->rbac = $this->cache->getItem('rbac_container', $result);
        /* версия с session */
        //$this->rbac = $this->cache->myV;
        //$result = $this->rbac;
        if(!$result){
            // Создаем контейнер Rbac.
            $rbac = new Rbac();
            $this->rbac = $rbac;
            
            //Конструируем иерархию ролей, загружая роли и привилегии из базы данных.
            
            $rbac->setCreateMissingRoles(true);
            
            $roles = $this->entityManager->getRepository(Role::class)
                    ->findBy([],['id'=>'ASC']);
            foreach($roles as $role){
                $roleName = $role->getName();
                
                $parentRoleNames = [];
                foreach($role->getParentRoles() as $parentRole){
                    $parentRoleNames[] = $parentRole->getName();
                }
                
                $rbac->addRole($roleName,$parentRoleNames);
                
                foreach ($role->getPermissions() as $permission){
                    $rbac->getRole($roleName)->addPermission($permission->getName());
                }
                
            }
            //Сохраняем контейнер Rbac в кэш.
            /* версия с кэшем */
            $this->cache->setItem('rbac_container', $rbac);
            /* версия с session */
            //$this->cache->myV = $rbac;
        }
    }
    
    /**
     * Проверяет, есть ли привилегия у данного пользователя.
     * @param User|null $user
     * @param string $permission
     * @param array|null $params
     */
    public function isGranted($admin, $permission, $params = null)
    {
        if($this->rbac == null){
            $this->init();
        }
        
        if($admin == null){
            $identity = $this->authService->getIdentity();
            if($identity == null){
                return false;
            }
            
            $admin = $this->entityManager->getRepository(Adminrole::class)
                    ->findOneByEmail($identity);
            if($admin==null){
                //Упс... Эта личность есть в сессии, но в базе данных такого пользователя не существует.
                // Мы генерируем исключение, так как, возможно, это является проблемой безопасности.
                throw new \Exception('There is no user withsuch identity');
                
            }
        }
        
        $roles = $admin->getRoles();
        
        foreach($roles as $role){
            if($this->rbac->isGranted($role->getName(), $permission)){
                if($params==null)
                    return true;
                
                foreach($this->assertionManagers as $assertionManager){
                    if($assertionManager->assert($this->rbac, $permission,$params))
                            return true;
                }
            }
            
            $parentRoles = $role->getParentRoles();
            foreach($parentRoles as $parentRole){
                if($this->rbac->isGranted($parentRole->getName(), $permission)){
                    return true;
                }
            }
            
        }
        return false;
    }
    
}
