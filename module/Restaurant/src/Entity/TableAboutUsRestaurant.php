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
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
     * @ORM\JoinTable(name="photorestaurant")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="photo_head_id", referencedColumnName="id")
     *      })
     * 
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
     * @var \Restaurant\Entity\Photorestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Photorestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photo_about", referencedColumnName="id")
     * })
     */
    private $photoAbout;
    
    /**
     * @var \Restaurant\Entity\Videorestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Videorestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="video_id", referencedColumnName="id")
     * })
     */
    private $video;
    
    public function setHeadAndTextHistory($headHistory, $textHistory){
        $this->headHistory = $headHistory;
        $this->textHistory = $textHistory;
        return $this;
    } 
    public function setAllNumber($number_1, $number_2, $number_3, $number_4)
    {
        $this->number1 = $number_1;
        $this->number2 = $number_2;
        $this->number3 = $number_3;
        $this->number4 = $number_4;
        return $this;
    }
    
    public function setAllTitle($title_1, $title_2, $title_3, $title_4){
        $this->title1 = $title_1;
        $this->title2 = $title_2;
        $this->title3 = $title_3;
        $this->title4 = $title_4;
        return $this;
    }
    
    public function setALLHuman($namehuman, $texthuman,$photohuman){
        $this->nameHuman = $namehuman;
        $this->textHuman = $texthuman;
        $this->photoHuman = $photohuman;
        return $this;
    }
    public function setDifferentData($photohead,$video, $photo_about){
        $this->photoHead = $photohead;
        $this->video = $video;
        $this->photoAbout = $photo_about;
        return $this;
    }
    
    public function getAllData(){
        $id = $this->id;
        $headHistory = $this->headHistory;
        $textHistory = $this->textHistory;
        $number1 = $this->number1;
        $title1 = $this->title1;
        $number2 = $this->number2;
        $title2 = $this->title2;
        $number3 = $this->number3;
        $title3 = $this->title3;
        $number4 = $this->number4;
        $title4 = $this->title4;
        $nameHuman = $this->nameHuman;
        $textHuman = $this->textHuman;
        $photoHead = $this->photoHead;
        $photoHuman = $this->photoHuman;
        $video = $this->video;
        
        return ['id'=>$id,'headHistory'=>$headHistory,
            'textHistory'=>$textHistory,'number1'=>$number1,
            'title1' => $title1,'number2' => $number2,
            'title2' => $title2,'number3' => $number3,
            'title3' => $title3,'number4' => $number4,
            'title4' => $title4,'nameHuman' => $nameHuman,
            'textHuman' => $textHuman,'photoHead' => $photoHead,
            'photoHuman' => $photoHuman,'video' => $video,
            'photoAbout' => $this->photoAbout
        ];
    }
    public function getId()
    {
        return $this->id;
    }
    public function getPhotoHuman(){
        return $this->photoHuman;
    }
    

}
