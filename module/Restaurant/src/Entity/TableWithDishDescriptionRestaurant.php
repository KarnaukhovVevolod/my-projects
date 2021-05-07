<?php

namespace Restaurant\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TableWithDishDescriptionRestaurant
 *
 * @ORM\Table(name="table_with_dish_description_restaurant", indexes={@ORM\Index(name="IDX_F1869D038B56590D", columns={"photo_autor"})})
 * @ORM\Entity
 */
class TableWithDishDescriptionRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="table_with_dish_description_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="head_dish_1", type="string", length=300, nullable=true)
     */
    private $headDish1;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="head_dish_2", type="string", length=300, nullable=true)
     */
    private $headDish2;

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
     * @var \Restaurant\Entity\DishInTheRestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\DishInTheRestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dish_id", referencedColumnName="id")
     * })
     */
    private $dishId;
    
    
    /**
     * @var int
     * 
     * @ORM\OneToMany(targetEntity="Restaurant\Entity\CommentDishRestaurant", mappedBy="idDescriptionDish")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id_description_dish")
     * })
     */
    private $commentAll;
    
    public function __construct() {
        $this->commentAll = new ArrayCollection() ;
    }
    
    public function setCommentAll($commantAll){
        $this->commentAll[] = $commantAll;
        return $this;
    }
    
    public function getCommentAll(){
        return $this->commentAll;
    }
    
    public function setId($id){
        $this->id = $id;
        return $this;
    }
    public function setHeadDish1($headDish1){
        $this->headDish1 = $headDish1;
        return $this;
    }
    public function setHeadDish2($headDish2){
        $this->headDish2 = $headDish2;
        return $this;
    }
    public function setNameAutor($nameAutor){
        $this->nameAutor = $nameAutor;
        return $this;
    }
    public function setPhoto1($photo1){
        $this->photo1 = $photo1;
        return $this;
    }
    public function setPhoto2($photo2){
        $this->photo2 = $photo2;
        return $this;
    }
    public function setPhotoAutor($photoAutor){
        $this->photoAutor = $photoAutor;
        return $this;
    }
    public function setTextAutora($textAutora){
        $this->textAutora = $textAutora;
        return $this;
    }
    public function setTextDescription1($textDescription1){
        $this->textDescription1 = $textDescription1;
        return $this;
    }
    public function setTextDescription2($textDescription2){
        $this->textDescription2 = $textDescription2;
        return $this;
    }
    public function setTextDescription3($textDescription3){
        $this->textDescription3 = $textDescription3;
        return $this;
    }
    public function setTextDescription4($textDescription4){
        $this->textDescription4 = $textDescription4;
        return $this;
    }
    public function setDishId($dishId){
        $this->dishId = $dishId;
        return $this;
    }
    
    public function getId(){
        return $this->id;
    }
    public function getHeadDish1(){
        return $this->headDish1;
    }
    public function getHeadDish2(){
        return $this->headDish2;
    }
    public function getNameAutor(){
        return $this->nameAutor;
    }
    public function getPhoto1(){
        return $this->photo1;
    }
    public function getPhoto2(){
        return $this->photo2;
    }
    public function getPhotoAutor(){
        return $this->photoAutor;
    }
    public function getTextAutora(){
        return $this->textAutora;
    }
    public function getTextDescription1(){
        return$this->textDescription1;
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
    public function getDishId(){
        return $this->dishId;
    }
    
    
    
}
