<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactCompanyRestaurant
 *
 * @ORM\Table(name="contact_company_restaurant")
 * @ORM\Entity
 */
class ContactCompanyRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="contact_company_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Restaurant\Entity\Photorestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Photorestaurant")
     * @ORM\JoinTable(name="photorestaurant") 
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="photo_head_id", referencedColumnName="id")
     *      })
     */
    private $photoHeadId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="content_with_adress", type="text", nullable=true)
     */
    private $contentWithAdress;

    /**
     * @var string
     *
     * @ORM\Column(name="adress_company_text", type="string", length=1000, nullable=false)
     */
    private $adressCompanyText;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone_company", type="string", length=15, nullable=false)
     */
    private $telephoneCompany;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email_company", type="string", length=100, nullable=true)
     */
    private $emailCompany;

    /**
     * @var string|null
     *
     * @ORM\Column(name="link_adress_site", type="string", length=150, nullable=true)
     */
    private $linkAdressSite;

    public function setPhotoHeadId($photoHeadId){
        $this->photoHeadId = $photoHeadId;
        return $this;
    }
    public function setContentWithAdress($contentWithAdress){
        $this->contentWithAdress = $contentWithAdress;
        return $this;
    }
    public function setAdressCompanyText($adressCompanyText){
        $this->adressCompanyText = $adressCompanyText;
        return $this;
    }
    public function setTelephoneCompany($telephoneCompany){
        $this->telephoneCompany = $telephoneCompany;
        return $this;
    }
    public function setEmailCompany($emailCompany){
        $this->emailCompany = $emailCompany;
        return $this;
    }
    public function setLinkAdressSite($linkAdressSite){
        $this->linkAdressSite = $linkAdressSite;
        return $this;
    }
    
    
    
    public function getId(){
        return $this->id;
    }
    public function getPhotoHeadId(){
        return $this->photoHeadId;
    }
    public function getContentWithAdress(){
        return $this->contentWithAdress;
    }
    public function getAdressCompanyText(){
        return $this->adressCompanyText;
    }
    public function getTelephoneCompany(){
        return $this->telephoneCompany;
    }
    public function getEmailCompany(){
        return $this->emailCompany;
    }
    public function getLinkAdressSite(){
        return $this->linkAdressSite;
    }
}
