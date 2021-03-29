<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoryFoodsEventRestaurant
 *
 * @ORM\Table(name="category_foods_event_restaurant")
 * @ORM\Entity
 */
class CategoryFoodsEventRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="category_foods_event_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="namecategory", type="string", length=100, nullable=false)
     */
    private $namecategory;
    
    /**
     * @var bool|null
     *
     * @ORM\Column(name="foods_event", type="boolean", nullable=true)
     */
    private $foodsEvent;
    
    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=150, nullable=false)
     */
    private $link;
    
    
    public function setNameCategory($namecategory){
        $this->namecategory = $namecategory;
        return $this;
    }
    
    public function setFoodsEvent($foodsEvent){
        $this->foodsEvent = $foodsEvent;
        return $this;
    }
    public function setLink($link){
        $this->link = $link;
        return $this;
    }
    
    public function getId(){
        return $this->id;
    }
    public function getNameCategory(){
        return $this->namecategory;
    }
    public function getFoodsEvent(){
        return $this->foodsEvent;
    } 
    public function getLink(){
        return $this->link;
    }


}
