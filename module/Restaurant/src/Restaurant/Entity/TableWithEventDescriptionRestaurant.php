<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TableWithEventDescriptionRestaurant
 *
 * @ORM\Table(name="table_with_event_description_restaurant", indexes={@ORM\Index(name="IDX_FAE522908B56590D", columns={"photo_autor"}), @ORM\Index(name="IDX_FAE5229045EA9889", columns={"photo_1"}), @ORM\Index(name="IDX_FAE52290DCE3C933", columns={"photo_2"}), @ORM\Index(name="IDX_FAE5229071F7E88B", columns={"event_id"})})
 * @ORM\Entity
 */
class TableWithEventDescriptionRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
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
     * @ORM\Column(name="text_description_1", type="text", nullable=true)
     */
    private $textDescription1;

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
     * @var string|null
     *
     * @ORM\Column(name="head_description_2", type="string", length=300, nullable=true)
     */
    private $headDescription2;

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
    private $event;


}
