<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TableAboutUsRestaurant
 *
 * @ORM\Table(name="table_about_us_restaurant", indexes={@ORM\Index(name="IDX_B6A83D73C1FA7613", columns={"photo_head_id"}), @ORM\Index(name="IDX_B6A83D7319815A0A", columns={"photo_human_id"}), @ORM\Index(name="IDX_B6A83D7329C1004E", columns={"video_id"})})
 * @ORM\Entity
 */
class TableAboutUsRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="table_about_us_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="head_history", type="string", length=300, nullable=true)
     */
    private $headHistory;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text_history", type="string", length=2000, nullable=true)
     */
    private $textHistory;

    /**
     * @var int
     *
     * @ORM\Column(name="number_1", type="integer", nullable=false)
     */
    private $number1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title_1", type="string", length=200, nullable=true)
     */
    private $title1;

    /**
     * @var int
     *
     * @ORM\Column(name="number_2", type="integer", nullable=false)
     */
    private $number2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title_2", type="string", length=200, nullable=true)
     */
    private $title2;

    /**
     * @var int
     *
     * @ORM\Column(name="number_3", type="integer", nullable=false)
     */
    private $number3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title_3", type="string", length=200, nullable=true)
     */
    private $title3;

    /**
     * @var int
     *
     * @ORM\Column(name="number_4", type="integer", nullable=false)
     */
    private $number4;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title_4", type="string", length=200, nullable=true)
     */
    private $title4;

    /**
     * @var string
     *
     * @ORM\Column(name="name_human", type="string", length=100, nullable=false)
     */
    private $nameHuman;

    /**
     * @var string
     *
     * @ORM\Column(name="text_human", type="string", length=2000, nullable=false)
     */
    private $textHuman;

    /**
     * @var \Restaurant\Entity\Photorestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Photorestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photo_head_id", referencedColumnName="id")
     * })
     */
    private $photoHead;

    /**
     * @var \Restaurant\Entity\Photorestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Photorestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photo_human_id", referencedColumnName="id")
     * })
     */
    private $photoHuman;

    /**
     * @var \Restaurant\Entity\Videorestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Videorestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="video_id", referencedColumnName="id")
     * })
     */
    private $video;


}
