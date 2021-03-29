<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactCompanyRestaurant
 *
 * @ORM\Table(name="contact_company_restaurant", indexes={@ORM\Index(name="IDX_A3E39C53C1FA7613", columns={"photo_head_id"})})
 * @ORM\Entity
 */
class ContactCompanyRestaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contact_company_restaurant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

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
     * @ORM\Column(name="telephone_company", type="string", length=45, nullable=false)
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

    /**
     * @var \Restaurant\Entity\Photorestaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Photorestaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photo_head_id", referencedColumnName="id")
     * })
     */
    private $photoHead;


}
