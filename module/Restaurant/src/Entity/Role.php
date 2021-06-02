<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Role
 *
 * @ORM\Table(name="role", uniqueConstraints={@ORM\UniqueConstraint(name="role_name_key", columns={"name"})})
 * @ORM\Entity
 */
class Role
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="role_id_seq", allocationSize=1, initialValue=1)
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
     * @ORM\ManyToMany(targetEntity="Restaurant\Entity\Role", inversedBy="childRoles")
     * @ORM\JoinTable(name="role_hierarchy",
     *      joinColumns={@ORM\JoinColumn(name="child_role_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="parent_role_id", referencedColumnName="id")}
     *      )
     */
    private $parentRoles;
    
    /**
     * @ORM\ManyToMany(targetEntity="Restaurant\Entity\Role", mappedBy="parentRoles")
     * @ORM\JoinTable(name="role_hierarchy",
     *      joinColumns={@ORM\JoinColumn(name="parent_role_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="child_role_id", referencedColumnName="id")}
     *      )
     */
    protected $childRoles;
    
    /**
     * @ORM\ManyToMany(targetEntity="Restaurant\Entity\Permission", inversedBy="roles")
     * @ORM\JoinTable(name="role_permission",
     *      joinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="permission_id", referencedColumnName="id")}
     *      )
     */
    private $permissions;
    
     /**
     * Constructor.
     */
    public function __construct() 
    {
        $this->parentRoles = new ArrayCollection();
        $this->childRoles = new ArrayCollection();
        $this->permissions = new ArrayCollection();
    }
    /**
     * Returns role ID.
     * @return integer
     */
    public function getId(){
        return $this->id;
    }

    /**
     * Sets role ID. 
     * @param int $id    
     */
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
    
    public function getParentRoles(){
        return $this->parentRoles;
    }
    
    public function getChildRoles(){
        return $this->childRoles;
    }
    
    public function getPermissions(){
        return $this->permissions;
    }

    public function addParent($role)
    {
        if ($this->getId() == $role->getId()) {
            return false;
        }
        
        if (!$this->hasParent($role)) {
            $this->parentRoles->add($role);
            $role->getChildRoles()->add($this);
            return true;
        }
        
        return false;
    }

    /**
     * Clear parent roles
     */
    public function clearParentRoles(){
        $this->parentRoles = new ArrayCollection();
    }

    /**
     * Check if parent role exists
     * @param Role $role
     * @return bool
     */
    public function hasParent(Role $role)
    {
        if ($this->getParentRoles()->contains($role)) {
            return true;
        }
        
        return false;
    }
}
