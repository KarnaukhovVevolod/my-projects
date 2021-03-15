<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MenuSubscriptionRestaurant
 *
 * @ORM\Table(name="menu_subscription_restaurant")
 * @ORM\Entity
 */
class MenuSubscriptionRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="menu_subscription_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="heading", type="string", length=150, nullable=true)
     */
    private $heading;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text_menu", type="string", length=500, nullable=true)
     */
    private $textMenu;
    
    public function setHeading($heading){
        $this->heading = $heading;
        return $this;
    }
    public function setTextMenu($textMenu){
        $this->textMenu = $textMenu;
        return $this;
    }
    public function getId(){
        return $this->id;
    }
    public function getHeading(){
        return $this->heading;
    }
    public function getTextMenu(){
        return $this->textMenu;
    }
    
            


}
