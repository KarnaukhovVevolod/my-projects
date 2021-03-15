<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Goods
 *
 * @ORM\Table(name="goods", indexes={@ORM\Index(name="IDX_563B92D64C19C1", columns={"category"})})
 * @ORM\Entity
 */
class Goods
{
    /**
     * @var int
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="goods_product_id_seq", allocationSize=1, initialValue=1)
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=100, nullable=false)
     */
    private $productName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="price", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $price;

    /**
     * @var \Restaurant\Entity\Categories
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category", referencedColumnName="category_id")
     * })
     */
    private $category;


}
