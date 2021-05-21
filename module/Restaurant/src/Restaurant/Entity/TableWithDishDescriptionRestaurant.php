<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TableWithDishDescriptionRestaurant
 *
 * @ORM\Table(name="table_with_dish_description_restaurant", indexes={@ORM\Index(name="IDX_F1869D038B56590D", columns={"photo_autor"}), @ORM\Index(name="IDX_F1869D0345EA9889", columns={"photo_1"}), @ORM\Index(name="IDX_F1869D03DCE3C933", columns={"photo_2"}), @ORM\Index(name="IDX_F1869D03148EB0CB", columns={"dish_id"})})
 * @ORM\Entity
 */
class TableWithDishDescriptionRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
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
     * @ORM\Column(name="head_dish_2", type="string", length=300, nullable=true)
     */
    private $headDish2;

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
     * @var \Restaurant\Entity\DishInTheRestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\DishInTheRestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dish_id", referencedColumnName="id")
     * })
     */
    private $dish;


}
