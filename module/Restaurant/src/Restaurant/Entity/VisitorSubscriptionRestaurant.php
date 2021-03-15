<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VisitorSubscriptionRestaurant
 *
 * @ORM\Table(name="visitor_subscription_restaurant", indexes={@ORM\Index(name="IDX_456DA1AFA832C1C9", columns={"email_id"}), @ORM\Index(name="IDX_456DA1AFB897366B", columns={"date_id"})})
 * @ORM\Entity
 */
class VisitorSubscriptionRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="visitor_subscription_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="signed", type="boolean", nullable=true)
     */
    private $signed;

    /**
     * @var \Restaurant\Entity\Emailrestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Emailrestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="email_id", referencedColumnName="id")
     * })
     */
    private $email;

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
