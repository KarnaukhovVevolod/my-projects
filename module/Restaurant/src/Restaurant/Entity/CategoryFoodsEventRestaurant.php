<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoryFoodsEventRestaurant
 *
 * @ORM\Table(name="category_foods_event_restaurant")
 * @ORM\Entity
 */
class CategoryFoodsEventRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="category_foods_event_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="namecategory", type="string", length=100, nullable=false)
     */
    private $namecategory;

    /**
     * @var bool
     *
     * @ORM\Column(name="foods_event", type="boolean", nullable=false)
     */
    private $foodsEvent;


}
