<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Permission
 *
 * @ORM\Table(name="permission", uniqueConstraints={@ORM\UniqueConstraint(name="permission_name_key", columns={"name"})})
 * @ORM\Entity
 */
class Permission
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="permission_id_seq", allocationSize=1, initialValue=1)
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=256, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="date", nullable=false)
     */
    private $dateCreated;

    /**
     * @ORM\ManyToMany(targetEntity="Restaurant\Entity\Role", mappedBy="permissions")
     * @ORM\JoinTable(name="role_permission",
     *      joinColumns={@ORM\JoinColumn(name="permission_id",
     * referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="role_id",
     * referencedColumnName="id")}
     * )
     * 
     */
    private $roles;
    
    public function __construct() {
        $this->roles = new ArrayCollection();
    }
    
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }
    
    public function setName($name){
        $this->name = $name;
    }
    
    public function getDescription(){
        return $this->description;
    }
    
    public function setDescription($description){
        $this->description = $description;
    }
    
    public function getDateCreated(){
        return $this->dateCreated;
    }
    
    public function setDateCreated($dateCreated){
        $this->dateCreated = $dateCreated;
    }
    
    public function getRoles(){
        return $this->roles;
    }
    
    public function addRole($role){
        $this->roles->add($role);
    }
    
}
