<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SortedKindsOfEventsRestaurant
 *
 * @ORM\Table(name="sorted_kinds_of_events_restaurant", indexes={@ORM\Index(name="IDX_31CFC25B7E9E4C8C", columns={"photo_id"}), @ORM\Index(name="IDX_31CFC25B35A28D50", columns={"type_event"})})
 * @ORM\Entity
 */
class SortedKindsOfEventsRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="sorted_kinds_of_events_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="link_sorted_type_event", type="string", length=150, nullable=false)
     */
    private $linkSortedTypeEvent;

    /**
     * @var int|null
     *
     * @ORM\Column(name="number_of_posts", type="integer", nullable=true)
     */
    private $numberOfPosts;

    /**
     * @var \Restaurant\Entity\Photorestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Photorestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photo_id", referencedColumnName="id")
     * })
     */
    private $photo;

    /**
     * @var \Restaurant\Entity\CategoryFoodsEventRestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\CategoryFoodsEventRestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_event", referencedColumnName="id")
     * })
     */
    private $typeEvent;
    
    
    public function setLinkSortedTypeEvent($linkSortedTypeEvent){
        $this->linkSortedTypeEvent = $linkSortedTypeEvent;
        return $this;
    }
    public function setNumberOfPosts($numberOfPosts){
        $this->numberOfPosts = $numberOfPosts;
        return $this;
    }
    public function setPhoto($photo){
        $this->photo = $photo;
        return $this;
    }
    public function setTypeEvent($typeEvent){
        $this->typeEvent = $typeEvent;
        return $this;
    }
    
    
    public function getId(){
        return $this->id;
    }
    public function getLinkSortedTypeEvent(){
        return $this->linkSortedTypeEvent;
    }
    public function getNumberOfPosts(){
        return $this->numberOfPosts;
    }
    public function getPhoto(){
        return $this->photo;
    }
    public function getTypeEvent(){
        return $this->typeEvent;
    }
    
    
}
