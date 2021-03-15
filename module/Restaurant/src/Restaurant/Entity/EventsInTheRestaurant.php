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
     * @ORM\GeneratedValue(strategy="SEQUENCE")
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


}
