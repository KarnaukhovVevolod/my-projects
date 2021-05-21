<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommentOnCommentDishRestaurant
 *
 * @ORM\Table(name="comment_on_comment_dish_restaurant", indexes={@ORM\Index(name="IDX_946B6B26CA264BD", columns={"photo_user"}), @ORM\Index(name="IDX_946B6B26E7927C74", columns={"email"}), @ORM\Index(name="IDX_946B6B268F5A3782", columns={"date_message"}), @ORM\Index(name="IDX_946B6B26908A5B26", columns={"id_comment_dish"})})
 * @ORM\Entity
 */
class CommentOnCommentDishRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="comment_on_comment_dish_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name_user", type="string", length=100, nullable=false)
     */
    private $nameUser;

    /**
     * @var string
     *
     * @ORM\Column(name="message_user", type="string", length=1000, nullable=false)
     */
    private $messageUser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reply", type="string", length=110, nullable=true)
     */
    private $reply;

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
     * @var \Restaurant\Entity\CommentDishRestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\CommentDishRestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_comment_dish", referencedColumnName="id")
     * })
     */
    private $idCommentDish;


}
