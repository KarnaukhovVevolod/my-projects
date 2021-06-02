<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Adminrole
 *
 * @ORM\Table(name="adminrole1", uniqueConstraints={@ORM\UniqueConstraint(name="adminrole_email_key", columns={"email"})})
 * @ORM\Entity
 */
class Adminrole
{
    
    // Admin status constants.
    const STATUS_ACTIVE       = 1; // Active user.
    const STATUS_RETIRED      = 2; // Retired user.
    
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="adminrole1_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=120, nullable=false)
     */
    private $password;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="date", nullable=false)
     */
    private $dateCreated;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pwd_reset_token", type="string", length=32, nullable=true)
     */
    private $pwdResetToken;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="pwd_reset_token_creation_date", type="date", nullable=true)
     */
    private $pwdResetTokenCreationDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="passw", type="string", length=64, nullable=true)
     */
    private $passw;
    
    /**
     * @ORM\ManyToMany(targetEntity="Restaurant\Entity\Role")
     * @ORM\JoinTable(name="admin_role",
     *      joinColumns={@ORM\JoinColumn(name="admin_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     *      )
     */
    private $roles;
    
    /**
     * Constructor.
     */
    public function __construct(){
        $this->roles = new ArrayCollection();
    }
    
    /**
     * Returns user ID.
     * @return integer
     */
    public function getId() 
    {
        return $this->id;
    }

    /**
     * Sets user ID. 
     * @param int $id    
     */
    public function setId($id) 
    {
        $this->id = $id;
    }

    /**
     * Returns email.     
     * @return string
     */
    public function getEmail() 
    {
        return $this->email;
    }

    /**
     * Sets email.     
     * @param string $email
     */
    public function setEmail($email) 
    {
        $this->email = $email;
    }
    
    /**
     * Returns full name.
     * @return string     
     */
    public function getName() 
    {
        return $this->name;
    }       

    /**
     * Sets full name.
     * @param string $fullName
     */
    public function setName($name) 
    {
        $this->name = $name;
    }
    
    /**
     * Returns status.
     * @return int     
     */
    public function getStatus() 
    {
        return $this->status;
    }

    /**
     * Returns possible statuses as array.
     * @return array
     */
    public static function getStatusList() 
    {
        return [
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_RETIRED => 'Retired'
        ];
    }    
    
    /**
     * Returns user status as string.
     * @return string
     */
    public function getStatusAsString()
    {
        $list = self::getStatusList();
        if (isset($list[$this->status]))
            return $list[$this->status];
        
        return 'Unknown';
    }    
    
    /**
     * Sets status.
     * @param int $status     
     */
    public function setStatus($status) 
    {
        $this->status = $status;
    }   
    
    /**
     * Returns password.
     * @return string
     */
    public function getPassword() 
    {
       return $this->password; 
    }
    
    /**
     * Sets password.     
     * @param string $password
     */
    public function setPassword($password) 
    {
        $this->password = $password;
    }
    
    /**
     * Returns the date of user creation.
     * @return string     
     */
    public function getDateCreated() 
    {
        return $this->dateCreated;
    }
    
    /**
     * Sets the date when this user was created.
     * @param string $dateCreated     
     */
    public function setDateCreated($dateCreated) 
    {
        $this->dateCreated = $dateCreated;
    }    
    
    /**
     * Returns password reset token.
     * @return string
     */
    public function getPwdResetToken()
    {
        return $this->pwdResetToken;
    }
    
    /**
     * Sets password reset token.
     * @param string $token
     */
    public function setPwdResetToken($token) 
    {
        $this->pwdResetToken = $token;
    }
    
    /**
     * Returns password reset token's creation date.
     * @return string
     */
    public function getPwdResetTokenCreationDate()
    {
        return $this->pwdResetTokenCreationDate;
    }
    
    /**
     * Sets password reset token's creation date.
     * @param string $date
     */
    public function setPwdResetTokenCreationDate($date) 
    {
        $this->pwdResetTokenCreationDate = $date;
    }
    
    public function getPassw(){
        return $this->passw;
    }
    
    public function setPassw($passw){
        $this->passw = $passw;
        return $this;
    }
    
    /**
     * Returns the array of roles assigned to this user.
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }
    
    /**
     * Returns the string of assigned role names.
     */
    public function getRolesAsString()
    {
        $roleList = '';
        
        $count = count($this->roles);
        $i = 0;
        foreach ($this->roles as $role) {
            $roleList .= $role->getName();
            if ($i<$count-1)
                $roleList .= ', ';
            $i++;
        }
        
        return $roleList;
    }
    
    /**
     * Assigns a role to user.
     */
    public function addRole($role)
    {
        $this->roles->add($role);
    }
    
    
    
}
