<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdminAuthentication
 *
 * @ORM\Table(name="admin_authentication")
 * @ORM\Entity
 */
class AdminAuthentication
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="admin_authentication_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=120, nullable=false)
     */
    private $password;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="date", nullable=false)
     */
    private $dateCreated;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pwd_reset_token", type="string", length=32, nullable=true)
     */
    private $pwdResetToken;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="pwd_reset_token_creation_date", type="date", nullable=true)
     */
    private $pwdResetTokenCreationDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="passw", type="string", length=64, nullable=true)
     */
    private $passw;


}
