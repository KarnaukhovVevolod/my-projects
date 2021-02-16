<?php

namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;


/** 
 * @ORM\Entity
 * @ORM\Table(name="users")
 * 
 */
class User {
    
    /** 
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name = "id", type = "integer")   
     */
    protected $id;
    
    /** 
     * @ORM\Column(type = "string", name = "name_user", length = 32, nullable = true)
     * 
     */
    
    private $name_user;
    
    /** 
     * @ORM\Column(type = "string", name = "email", length = 32, nullable = true)
     * 
     */
    
    private $email;
    
    public function getId(){
        return $this->id;
    }
    
    public function getNameUser()
    {
        return $this->name_user; 
    }
    
    public function setNameUser($name_user)
    {
         $this->name_user = $name_user;
    }
    public function getEmail()
    {
        return $this->email ;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    
    
    
}
