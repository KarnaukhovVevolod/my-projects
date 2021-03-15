<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommentDishRestaurant
 *
 * @ORM\Table(name="comment_dish_restaurant", indexes={@ORM\Index(name="IDX_1593331CCA264BD", columns={"photo_user"}), @ORM\Index(name="IDX_1593331CE7927C74", columns={"email"}), @ORM\Index(name="IDX_1593331C8F5A3782", columns={"date_message"}), @ORM\Index(name="IDX_1593331C80FF467D", columns={"id_description_dish"})})
 * @ORM\Entity
 */
class CommentDishRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="comment_dish_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name_user", type="string", length=100, nullable=true)
     */
    private $nameUser;

    /**
     * @var string
     *
     * @ORM\Column(name="message_user", type="string", length=1000, nullable=false)
     */
    private $messageUser;

    /**
     * @var \Restaurant\Entity\PhotoCommentRestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\PhotoCommentRestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photo_user", referencedColumnName="id")
     * })
     */
    private $photoUser;

    /**
     * @var \Restaurant\Entity\Emailrestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Emailrestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="email", referencedColumnName="id")
     * })
     */
    private $email;

    /**
     * @var \Restaurant\Entity\Daterestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Daterestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="date_message", referencedColumnName="id")
     * })
     */
    private $dateMessage;

    /**
     * @var \Restaurant\Entity\TableWithDishDescriptionRestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\TableWithDishDescriptionRestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_description_dish", referencedColumnName="id")
     * })
     */
    private $idDescriptionDish;


}
