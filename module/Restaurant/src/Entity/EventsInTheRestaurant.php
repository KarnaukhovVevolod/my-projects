<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventsInTheRestaurant
 *
 * @ORM\Table(name="events_in_the_restaurant", indexes={@ORM\Index(name="IDX_DC3D1B34EAA7A893", columns={"photo_for_events_id"}), @ORM\Index(name="IDX_DC3D1B34BC08CF77", columns={"type_event_id"}), @ORM\Index(name="IDX_DC3D1B34B2C2812D", columns={"date_event_id"})})
 * @ORM\Entity
 */
class EventsInTheRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="events_in_the_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="event_name", type="string", length=150, nullable=false)
     */
    private $eventName;

    /**
     * @var string
     *
     * @ORM\Column(name="brief_description_event", type="string", length=500, nullable=false)
     */
    private $briefDescriptionEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="link_to_event", type="string", length=150, nullable=false)
     */
    private $linkToEvent;

    /**
     * @var int|null
     *
     * @ORM\Column(name="the_popularity_of_the_event", type="integer", nullable=true, options={"default"="1"})
     */
    private $thePopularityOfTheEvent = '1';

    /**
     * @var \Restaurant\Entity\Photorestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Photorestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photo_for_events_id", referencedColumnName="id")
     * })
     */
    private $photoForEvents;

    /**
     * @var \Restaurant\Entity\SortedKindsOfEventsRestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\SortedKindsOfEventsRestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_event_id", referencedColumnName="id")
     * })
     */
    private $typeEvent;

    /**
     * @var \Restaurant\Entity\Daterestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Daterestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="date_event_id", referencedColumnName="id")
     * })
     */
    private $dateEvent;
    
    
    public function setEventName($eventName){
        $this->eventName = $eventName;
        return $this;
    }
    
    public function setBrefDescriptionEvent($briefDescriptionEvent){
        $this->briefDescriptionEvent = $briefDescriptionEvent;
        return $this;
    }
    
    public function setLinkToEvent($linkToEvent){
        $this->linkToEvent = $linkToEvent;
        return $this;
    }
    
    public function setThePopularityOfTheEvent($thePopularityOfTheEvent){
        $this->thePopularityOfTheEvent = $thePopularityOfTheEvent;
        return $this;
    }
    
    public function setPhotoForEvents($photoForEvents){
        $this->photoForEvents = $photoForEvents;
        return $this;
    }
    
    public function setTypeEvent($typeEvent){
        $this->typeEvent = $typeEvent;
        return $this;
    }
    
    public function setDateEvent($dateEvent){
        $this->dateEvent = $dateEvent;
        return $this;
    }
    
    public function getId(){
        return $this->id;
    }
    public function getEventName(){
        return $this->eventName;
    }
    public function getBrefDescriptionEvent(){
        return $this->briefDescriptionEvent;
    }
    public function getLinkToEvent(){
        return $this->linkToEvent;
    }
    public function getThePopularityOfTheEvent(){
        return $this->thePopularityOfTheEvent;
    }
    public function getPhotoForEvents(){
        return $this->photoForEvents;
    }
    public function getTypeEvent(){
        return $this->typeEvent;
    }
    public function getDateEvent(){
        return $this->dateEvent;
    }

}
