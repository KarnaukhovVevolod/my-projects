<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emailrestaurant
 *
 * @ORM\Table(name="emailrestaurant")
 * @ORM\Entity
 */
class Emailrestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="emailrestaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=120, nullable=false)
     */
    private $email;

    /**
     * @var int|null
     *
     * @ORM\Column(name="active", type="integer", nullable=true)
     */
    private $active;


}
