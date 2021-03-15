<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emailrestaurant
 *
 * @ORM\Table(name="emailrestaurant")
 * @ORM\Entity
 */
class Emailrestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="emailrestaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=120, nullable=false)
     */
    private $email;

    /**
     * @var int|null
     *
     * @ORM\Column(name="active", type="integer", nullable=true)
     */
    private $active;
    
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }
    
    public function setActive($active){
        $this->active = $active;
        return $this;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function getActive(){
        return $this->active;
    }
    
    public function getAllData(){
        $arr['id'] = $this->id;
        $arr['email'] = $this->email;
        $arr['active'] = $this->active;
        return $arr;
    }


}
