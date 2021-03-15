<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Service;

use Restaurant\Entity\Employee;

class EmployeeManager {
    //put your code here
    /**
     * Doctrine entity manager.
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;
    
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
        
    }
    
    public function getDataEmployee()
    {
        
         /* 1 - способ получения данных */
        $employee = $this->entityManager
                ->getRepository(Employee::class)
                ->find(1);
         /* 
        // 2 - способ получения данных
        $employee = $this->entityManager
                ->createQueryBuilder()
                ->select('id')
                ->from(Employee::class,'id')
                ->where('id=1')
                ->getQuery()
                ->getResult();
        debug($employee[0]->getAllDataEmployee());
         * *
         */
        //debug($employee);
        // 3 - способ получения данных
        $employee_createQuery = $this->entityManager
                ->createQuery('SELECT u FROM Restaurant\Entity\Employee u')
                ->getResult();
        //debug($employee_createQuery);
        //debug('$employee_createQuery сработало');
        //$this->entityManager->createQuery('CREATE TABLE SALARY AS SELECT ID, SALARY FROM CUSTOMERS')
        //        ->getResult();
        //die();
        
        $data_employee = $employee->getAllDataEmployee();
        return $data_employee;
        
    }
    
    
    
    
    
    
    
}
