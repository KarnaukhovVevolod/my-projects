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
        $employee = $this->entityManager
                ->getRepository(Employee::class)
                ->find(1);
        /*
        $employee = $this->entityManager
                ->createQueryBuilder()
                ->select('id')
                ->from(Employee::class,'id')
                ->where('id=1')
                ->getQuery()
                ->getResult();
        debug($employee[0]->getAllDataEmployee());
        die();*/
        $data_employee = $employee->getAllDataEmployee();
        return $data_employee;
        
    }
    
    
    
    
    
    
    
}
