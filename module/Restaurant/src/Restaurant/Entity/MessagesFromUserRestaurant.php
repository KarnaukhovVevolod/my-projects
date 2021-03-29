<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessagesFromUserRestaurant
 *
 * @ORM\Table(name="messages_from_user_restaurant", indexes={@ORM\Index(name="IDX_7D46EA54B897366B", columns={"date_id"}), @ORM\Index(name="IDX_7D46EA54A832C1C9", columns={"email_id"})})
 * @ORM\Entity
 */
class MessagesFromUserRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="messages_from_user_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name_user", type="string", length=100, nullable=true)
     */
    private $nameUser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="message_subject_user", type="string", length=150, nullable=true)
     */
    private $messageSubjectUser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text_message", type="text", nullable=true)
     */
    private $textMessage;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="answered", type="boolean", nullable=true)
     */
    private $answered;

    /**
     * @var \Restaurant\Entity\Daterestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Daterestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="date_id", referencedColumnName="id")
     * })
     */
    private $date;

    /**
     * @var \Restaurant\Entity\Emailrestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Emailrestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="email_id", referencedColumnName="id")
     * })
     */
    private $email;


}
