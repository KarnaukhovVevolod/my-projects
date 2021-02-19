<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="employee")
 * 
 */
class Employee {
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name = "id", type = "integer")
     */
    protected $id;
    /**
     * @ORM\Column(type = "string", name = "first_name", length = 50, nullable = true)
     * 
     */
    
    private $first_name;
    
    /**
     * @ORM\Column(type = "string", name = "last_name", length = 50, nullable = true)
     */
    private $last_name;
    
    /**
     * @ORM\Column(type = "string", name = "gender", length = 50, nullable = true)
     * 
     */
    private $gender;
    /**
     *
     * @ORM\Column(type = "string", name = "email", length = 150)
     */
    private $email;
    
    /**
     * @ORM\Column(name = "data_of_birth")
     */
    private $data_of_birth;
    
    public function setFirstNane($first_name){
        $this->first_name = $first_name;
    }
    public function setLastName($last_name){
        $this->last_name = $last_name;
    }
    public function setGender($gender){
        $this->gender = $gender;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setDataOfBirth($data_of_birth){
        $this->data_of_birth = $data_of_birth;
    }
    
    public function getId(){
        return $this->id;
    }
    public function getFirstName(){
        return $this->first_name;
    }
    public function getLastName(){
        return $this->last_name;
    }
    public function getGender(){
        return $this->gender;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getDataOfBirth(){
        return $this->data_of_birth;
    }
    
    public function getAllDataEmployee(){
        $arr['id'] = $this->id;
        $arr['FirstName'] = $this->first_name;
        $arr['LastName'] =  $this->last_name;
        $arr['gender'] = $this->gender;
        $arr['email']  = $this->email;
        $arr['DataOfBirth'] = $this->data_of_birth;
        return $arr;
    }
    
}
