<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessagesFromUserRestaurant
 *
 * @ORM\Table(name="messages_from_user_restaurant", indexes={@ORM\Index(name="IDX_7D46EA54B897366B", columns={"date_id"})})
 * @ORM\Entity
 */
class MessagesFromUserRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="messages_from_user_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name_user", type="string", length=100, nullable=true)
     */
    private $nameUser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="message_subject_user", type="string", length=150, nullable=true)
     */
    private $messageSubjectUser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text_message", type="text", nullable=true)
     */
    private $textMessage;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="answered", type="boolean", nullable=true)
     */
    private $answered;

    /**
     * @var \Restaurant\Entity\Daterestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Daterestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="date_id", referencedColumnName="id")
     * })
     */
    private $date;

    /**
     * @var \Restaurant\Entity\Emailrestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Emailrestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="email_id", referencedColumnName="id")
     * })
     */
    private $email;
    
    public function setNameUser($nameUser){
        $this->nameUser = $nameUser;
        return $this;
    }
    
    public function setMessageSubjectUser($messageSubjectUser){
        $this->messageSubjectUser = $messageSubjectUser;
        return $this;
    }
    
    public function setTextMessage($textMessage){
        $this->textMessage = $textMessage;
        return $this;
    }
    
    public function setAnswered($answered){
        $this->answered = $answered;
        return $this;
    }
    
    public function setDate($date){
        $this->date = $date;
        return $this;
    }
    
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }
    
    
    public function getId(){
        return $this->id;
    }
    public function getNameUser(){
        return $this->nameUser;
    }
    public function getMessageSubjectUser(){
        return $this->messageSubjectUser;
    }
    public function getTextMessage(){
        return $this->textMessage;
    }
    public function getAnswered(){
        return $this->answered;
    }
    public function getDate(){
        return $this->date;
    }
    public function getEmail(){
        return $this->email;
    }
}
