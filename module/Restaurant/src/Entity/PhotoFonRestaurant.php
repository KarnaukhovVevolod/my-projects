<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PhotoFonRestaurant
 *
 * @ORM\Table(name="photo_fon_restaurant", indexes={@ORM\Index(name="IDX_B62E28D37E9E4C8C", columns={"photo_id"})})
 * @ORM\Entity
 */
class PhotoFonRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="photo_fon_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="page", type="integer", nullable=false)
     */
    private $page;

    /**
     * @var \Restaurant\Entity\Photorestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Photorestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photo_id", referencedColumnName="id")
     * })
     */
    private $photo;
    
    public function setPage($page){
        $this->page = $page;
        return $this;
    }
    public function setPhoto($photo){
        $this->photo = $photo;
        return $this;
    }
    
    public function getId(){
        return $this->id;
    }
    public function getPage(){
        return $this->page;
    }
    public function getPhoto(){
        return $this->photo;
    }
    


}
