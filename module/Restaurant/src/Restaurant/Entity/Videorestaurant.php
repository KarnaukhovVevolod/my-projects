<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Videorestaurant
 *
 * @ORM\Table(name="videorestaurant")
 * @ORM\Entity
 */
class Videorestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="videorestaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="video", type="string", length=150, nullable=false)
     */
    private $video;
    
    public function setVideo($video){
        $this->video = $video;
        return $this;
    }
    
    public function getAllData()
    {
        return ['id'=>$this->id,'video'=>$this->video];
    }
    

}
