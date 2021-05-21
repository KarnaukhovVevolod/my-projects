<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdminAuthentication
 *
 * @ORM\Table(name="admin_authentication")
 * @ORM\Entity
 */
class AdminAuthentication
{
    
    // Константы статуса пользователя.
    const STATUS_ACTIVE       = 1; // Активный пользователь.
    const STATUS_RETIRED      = 2; // Неактивный пользователь.
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="admin_authentication_id_seq", allocationSize=1, initialValue=1)
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
     * возвращает пароль
     * @return string
     */
    public function getPassw(){
        return $this->passw;
    }
    
    /**
     * задаёт пароль пользователя
     */
    public function setPassw($passw){
        $this->passw = $passw;
        return $this;
    }
    
    /**
     * Возвращает ID пользователя.
     * @return integer
     */
    public function getId() 
    {
        return $this->id;
    }

    /**
     * Задает ID пользователя. 
     * @param int $id    
     */
    public function setId($id) 
    {
        $this->id = $id;
    }

    /**
     * Возвращает адрес эл. почты.     
     * @return string
     */
    public function getEmail() 
    {
        return $this->email;
    }

    /**
     * Задает адрес эл. почты.     
     * @param string $email
     */
    public function setEmail($email) 
    {
        $this->email = $email;
    }
    
    /**
     * Возвращает полное имя.
     * @return string     
     */
    public function getName() 
    {
        return $this->name;
    }       

    /**
     * Задает полное имя.
     * @param string $fullName
     */
    public function setName($name) 
    {
        $this->name = $name;
    }
    
    /**
     * Возвращает статус.
     * @return int     
     */
    public function getStatus() 
    {
        return $this->status;
    }

    /**
     * Возвращает возможные статусы в виде массива.
     * @return array
     */
    public static function getStatusList() 
    {
        return [
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_RETIRED => 'Retired',

        ];
    }    
    
    /**
     * Возвращает статус пользователя в виде строки.
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
     * Устанавливает статус.
     * @param int $status     
     */
    public function setStatus($status) 
    {
        $this->status = $status;
    }   
    
    /**
     * Возвращает пароль.
     * @return string
     */
    
    public function getPassword() 
    {
       return $this->password; 
    }
    
    /**
     * Задает пароль.     
     * @param string $password
     */
    public function setPassword($password) 
    {
        $this->password = $password;
    }
    
    /**
     * Возвращает дату создания пользователя.
     * @return string     
     */
    public function getDateCreated() 
    {
        return $this->dateCreated;
    }
    
    /**
     * Задает дату создания пользователя.
     * @param string $dateCreated     
     */
    public function setDateCreated($dateCreated) 
    {
        $this->dateCreated = $dateCreated;
    }    
    
    /**
     * Возвращает токен сброса пароля.
     * @return string
     */
    public function getPwdResetToken()
    {
        return $this->pwdResetToken;
    }
    
    /**
     * Задает токен сброса пароля.
     * @param string $token
     */
    public function setPwdResetToken($token) 
    {
        $this->pwdResetToken = $token;
    }
    
    /**
     * Возвращает дату создания токена сброса пароля.
     * @return string
     */
    public function getPwdResetTokenCreationDate()
    {
        return $this->pwdResetTokenCreationDate;
    }
    
    /**
     * Задает дату создания токена сброса пароля.
     * @param string $date
     */
    public function setPwdResetTokenCreationDate($date) 
    {
        $this->pwdResetTokenCreationDate = $date;
    }
    
    

}
