<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PhotoCommentRestaurant
 *
 * @ORM\Table(name="photo_comment_restaurant")
 * @ORM\Entity
 */
class PhotoCommentRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="photo_comment_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="photo", type="string", length=150, nullable=true)
     */
    private $photo;


}
