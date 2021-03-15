<?php

namespace Restaurant\Entity;

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
     * @ORM\Column(name="head_description", type="string", length=300, nullable=true)
     */
    private $headDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text_description", type="text", nullable=true)
     */
    private $textDescription;

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


}
