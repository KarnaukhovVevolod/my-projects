<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TableForAnsweredMessageFromUserRestaurant
 *
 * @ORM\Table(name="table_for_answered_message_from_user_restaurant", indexes={@ORM\Index(name="IDX_6B6F59222AD3C229", columns={"id_table_messages_from_user"}), @ORM\Index(name="IDX_6B6F59222D453A1", columns={"date_id_answered"})})
 * @ORM\Entity
 */
class TableForAnsweredMessageFromUserRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="table_for_answered_message_from_user_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="text_message", type="text", nullable=false)
     */
    private $textMessage;

    /**
     * @var \Restaurant\Entity\MessagesFromUserRestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\MessagesFromUserRestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_table_messages_from_user", referencedColumnName="id")
     * })
     */
    private $idTableMessagesFromUser;

    /**
     * @var \Restaurant\Entity\Daterestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Daterestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="date_id_answered", referencedColumnName="id")
     * })
     */
    private $dateIdAnswered;


}
