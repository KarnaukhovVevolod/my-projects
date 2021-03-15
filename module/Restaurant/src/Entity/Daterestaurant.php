<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Daterestaurant
 *
 * @ORM\Table(name="daterestaurant")
 * @ORM\Entity
 */
class Daterestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="daterestaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;
    
    public function setDate($date){
        if( $date != null ){
            $this->date = $date;
        }else{
            $this->date = new \DateTime();
        }
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getDate(){
        return $this->date;
    }

}
