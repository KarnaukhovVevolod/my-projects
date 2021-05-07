<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommentOnCommentEventRestaurant
 *
 * @ORM\Table(name="comment_on_comment_event_restaurant", indexes={@ORM\Index(name="IDX_57EAE4CCA264BD", columns={"photo_user"}), @ORM\Index(name="IDX_57EAE4CE7927C74", columns={"email"}), @ORM\Index(name="IDX_57EAE4C8F5A3782", columns={"date_message"}), @ORM\Index(name="IDX_57EAE4C2C1C4333", columns={"id_comment_event"})})
 * @ORM\Entity
 */
class CommentOnCommentEventRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="comment_on_comment_event_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name_user", type="string", length=100, nullable=false)
     */
    private $nameUser;

    /**
     * @var string
     *
     * @ORM\Column(name="message_user", type="string", length=1000, nullable=false)
     */
    private $messageUser;

    /**
     * @var \Restaurant\Entity\PhotoCommentRestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\PhotoCommentRestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photo_user", referencedColumnName="id")
     * })
     */
    private $photoUser;

    /**
     * @var \Restaurant\Entity\Emailrestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Emailrestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="email", referencedColumnName="id")
     * })
     */
    private $email;

    /**
     * @var \Restaurant\Entity\Daterestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Daterestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="date_message", referencedColumnName="id")
     * })
     */
    private $dateMessage;

    /**
     * @var \Restaurant\Entity\CommentEventRestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\CommentEventRestaurant", inversedBy="commentonEvent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_comment_event", referencedColumnName="id")
     * })
     */
    private $idCommentEvent;
    
    /**
     * @var string
     *
     * @ORM\Column(name="reply", type="string", length=110, nullable=false)
     */
    private $reply;
    
    public function setNameUser($nameUser){
        $this->nameUser = $nameUser;
        return $this;
    }
    public function setMessageUser($messageUser){
        $this->messageUser = $messageUser;
        return $this;
    }
    public function setPhotoUser($photoUser){
        $this->photoUser = $photoUser;
        return $this;
    } 
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }
    public function setDateMessage($dateMessage){
        $this->dateMessage = $dateMessage;
        return $this;
    }
    public function setIdCommentEvent($idCommentEvent){
        $this->idCommentEvent = $idCommentEvent;
        return $this;
    }
    public function setReply($reply){ 
        $this->reply = $reply;
        return $this;
    }
    
    
    public function getId(){
        return $this->id;
    }
    public function getNameUser(){
        return $this->nameUser;
    }
    public function getMessageUser(){
        return $this->messageUser;
    }
    public function getPhotoUser(){
        return $this->photoUser;
    } 
    public function getEmail(){
        return $this->email;
    }
    public function getDateMessage(){
        return $this->dateMessage;
    }
    public function getIdCommentEvent(){
        return $this->idCommentEvent;
    }
    public function getReply(){ 
        return $this->reply;
    }
    
    

}
