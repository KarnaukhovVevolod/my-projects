<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SortedKindsOfDishRestaurant
 *
 * @ORM\Table(name="sorted_kinds_of_dish_restaurant", indexes={@ORM\Index(name="IDX_D7F2377B7E9E4C8C", columns={"photo_id"}), @ORM\Index(name="IDX_D7F2377B427249B0", columns={"type_dish"})})
 * @ORM\Entity
 */
class SortedKindsOfDishRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sorted_kinds_of_dish_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="link_sorted_type_dish", type="string", length=150, nullable=false)
     */
    private $linkSortedTypeDish;

    /**
     * @var int|null
     *
     * @ORM\Column(name="number_of_varieties_of_the_dish", type="integer", nullable=true, options={"default"="1"})
     */
    private $numberOfVarietiesOfTheDish = '1';

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
     *   @ORM\JoinColumn(name="type_dish", referencedColumnName="id")
     * })
     */
    private $typeDish;


}
