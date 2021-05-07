<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DishInTheRestaurant
 *
 * @ORM\Table(name="dish_in_the_restaurant", indexes={@ORM\Index(name="IDX_2A559AF0262C3B3A", columns={"photo_for_dish_id"}), @ORM\Index(name="IDX_2A559AF03CAFDF3E", columns={"type_dish_id"})})
 * @ORM\Entity
 */
class DishInTheRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="dish_in_the_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="dish_name", type="string", length=150, nullable=false)
     */
    private $dishName;

    /**
     * @var string
     *
     * @ORM\Column(name="link_to_dish", type="string", length=150, nullable=false)
     */
    private $linkToDish;

    /**
     * @var string
     *
     * @ORM\Column(name="price_dish", type="string", length=15, nullable=false)
     */
    private $priceDish;

    /**
     * @var int|null
     *
     * @ORM\Column(name="the_popularity_of_the_dish", type="integer", nullable=true, options={"default"="1"})
     */
    private $thePopularityOfTheDish = '1';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="recipe", type="boolean", nullable=true)
     */
    private $recipe = false;

    /**
     * @var \Restaurant\Entity\Photorestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Photorestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photo_for_dish_id", referencedColumnName="id")
     * })
     */
    private $photoForDish;

    /**
     * @var \Restaurant\Entity\SortedKindsOfDishRestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\SortedKindsOfDishRestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_dish_id", referencedColumnName="id")
     * })
     */
    private $typeDish;
    
    
    public function setDishName($dishName){ 
        $this->dishName = $dishName;
        return $this;
    }
    public function setLinkToDish($linkToDish){ 
        $this->linkToDish = $linkToDish;
        return $this;
    }
    public function setPriceDish($priceDish) {
        $this->priceDish = $priceDish;
        return $this;
    }
    public function setThePopularityOfTheDish($thePopularityOfTheDish){
        $this->thePopularityOfTheDish = $thePopularityOfTheDish;
        return $this;
    }
    public function setRecipe($recipe) {
        $this->recipe = $recipe;
        return $this;
    }
    public function setPhotoForDish($photoForDish) {
        $this->photoForDish = $photoForDish;
        return $this;
    }
    public function setTypeDish($typeDish) {
        $this->typeDish = $typeDish;
        return $this;
    }
    
    
    
    public function getId() {
        return $this->id;
    }
    public function getDishName() {
        return $this->dishName;
    }
    public function getLinkToDish(){
        return $this->linkToDish;
    }
    public function getPriceDish(){
        return $this->priceDish;
    }
    public function getThePopularityOfTheDish(){
        return $this->thePopularityOfTheDish;
    }
    public function getRecipe(){
        return $this->recipe;
    }
    public function getPhotoForDish(){
        return $this->photoForDish;
    }
    public function getTypeDish(){
        return $this->typeDish;
    }
    

}
