<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TableMailingsRestaurant
 *
 * @ORM\Table(name="table_mailings_restaurant", indexes={@ORM\Index(name="IDX_7A612C2EB897366B", columns={"date_id"})})
 * @ORM\Entity
 */
class TableMailingsRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="table_mailings_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=1024, nullable=false)
     */
    private $message;

    /**
     * @var \Restaurant\Entity\Daterestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Daterestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="date_id", referencedColumnName="id")
     * })
     */
    private $date;


}
