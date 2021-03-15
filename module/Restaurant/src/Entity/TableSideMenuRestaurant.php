<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TableSideMenuRestaurant
 *
 * @ORM\Table(name="table_side_menu_restaurant", indexes={@ORM\Index(name="IDX_D3CAF7947E9E4C8C", columns={"photo_id"})})
 * @ORM\Entity
 */
class TableSideMenuRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="table_side_menu_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="head", type="string", length=100, nullable=true)
     */
    private $head;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text_menu", type="string", length=1000, nullable=true)
     */
    private $textMenu;

    /**
     * @var int
     *
     * @ORM\Column(name="page", type="integer", nullable=false)
     */
    private $page;

    /**
     * @var \Restaurant\Entity\Photorestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Photorestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photo_id", referencedColumnName="id")
     * })
     */
    private $photo;


}
