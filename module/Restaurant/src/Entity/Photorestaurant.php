<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Photorestaurant
 *
 * @ORM\Table(name="photorestaurant")
 * @ORM\Entity
 */
class Photorestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="photorestaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=150, nullable=false)
     */
    private $photo;
    
    public function setPhoto($photo){
        $this->photo = $photo;
        return $this;
    }
    
    public function getAllData()
    {
        return ['id'=>$this->id,'photo'=>$this->photo];
    }

}
