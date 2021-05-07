<?php

namespace Restaurant\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TableWithEventDescriptionRestaurant
 *
 * @ORM\Table(name="table_with_event_description_restaurant", indexes={@ORM\Index(name="IDX_FAE522908B56590D", columns={"photo_autor"})})
 * @ORM\Entity
 */
class TableWithEventDescriptionRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="table_with_event_description_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="head_description_1", type="string", length=300, nullable=true)
     */
    private $headDescription1;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="head_description_2", type="string", length=300, nullable=true)
     */
    private $headDescription2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text_description_1", type="text", nullable=true)
     */
    private $textDescription1;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="text_description_2", type="text", nullable=true)
     */
    private $textDescription2;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="text_description_3", type="text", nullable=true)
     */
    private $textDescription3;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="text_description_4", type="text", nullable=true)
     */
    private $textDescription4;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="name_autor", type="string", length=70, nullable=true)
     */
    private $nameAutor;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text_autora", type="string", length=400, nullable=true)
     */
    private $textAutora;

    /**
     * @var \Restaurant\Entity\Photorestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Photorestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photo_autor", referencedColumnName="id")
     * })
     */
    private $photoAutor;
    
    /**
     * @var \Restaurant\Entity\Photorestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Photorestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photo_1", referencedColumnName="id")
     * })
     */
    private $photo1;
    
    /**
     * @var \Restaurant\Entity\Photorestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Photorestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photo_2", referencedColumnName="id")
     * })
     */
    private $photo2;
    
    /**
     * @var \Restaurant\Entity\EventsInTheRestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\EventsInTheRestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     * })
     */
    private $eventId;
    
    /**
     * @var int
     * 
     * @ORM\OneToMany(targetEntity="Restaurant\Entity\CommentEventRestaurant",mappedBy="idDescriptionEvent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id_description_event")
     * })
     */
    private $commentAll;
    
    public function __construct() {
        $this->commentAll = new ArrayCollection();
    }
    
     public function setCommentAll($commantAll){
        $this->commentAll[] = $commantAll;
        return $this;
    }
    
    public function getCommentAll(){
        return $this->commentAll;
    }
    
    public function setHeadDescription1 ($headDescription1){
        $this->headDescription1 = $headDescription1;
        return $this;
    }
    public function setHeadDescription2 ($headDescription2){
        $this->headDescription2 = $headDescription2;
        return $this;
    }
    public function setTextDescription1 ($textDescription1){
        $this->textDescription1 = $textDescription1;
        return $this;
    }
    public function setTextDescription2 ($textDescription2){
        $this->textDescription2 = $textDescription2;
        return $this;
    }
    public function setTextDescription3 ($textDescription3){
        $this->textDescription3 = $textDescription3;
        return $this;
    }
    public function setTextDescription4 ($textDescription4){
        $this->textDescription4 = $textDescription4;
        return $this;
    }
    public function setNameAutor ($nameAutor){
        $this->nameAutor = $nameAutor;
        return $this;
    }
    public function setTextAutora ($textAutora){
        $this->textAutora = $textAutora;
        return $this;
    }
    public function setPhotoAutor ($photoAutor){
        $this->photoAutor = $photoAutor;
        return $this;
    }
    public function setPhoto1 ($photo1){
        $this->photo1 = $photo1;
        return $this;
    }
    public function setPhoto2 ($photo2){
        $this->photo2 = $photo2;
        return $this;
    }
    public function setEventId ($eventId){
        $this->eventId = $eventId;
        return $this;
    }
    
    
    public function getId(){
        return $this->id;
    }
    public function getHeadDescription1(){
        return $this->headDescription1;
    }
    public function getHeadDescription2(){
        return $this->headDescription2;
    }
    public function getTextDescription1(){
        return $this->textDescription1;
    }
    public function getTextDescription2(){
        return $this->textDescription2;
    }
    public function getTextDescription3(){
        return $this->textDescription3;
    }
    public function getTextDescription4(){
        return $this->textDescription4;
    }
    public function getNameAutor(){
        return $this->nameAutor;
    }
    public function getTextAutora(){
        return $this->textAutora;
    }
    public function getPhotoAutor(){
        return $this->photoAutor;
    }
    public function getPhoto1(){
        return $this->photo1;
    }
    public function getPhoto2(){
        return $this->photo2;
    }
    public function getEventId(){
        return $this->eventId;
    }
    
}
