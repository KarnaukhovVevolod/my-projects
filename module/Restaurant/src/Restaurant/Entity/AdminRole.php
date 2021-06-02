<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdminRole
 *
 * @ORM\Table(name="admin_role", indexes={@ORM\Index(name="IDX_7770088A642B8210", columns={"admin_id"}), @ORM\Index(name="IDX_7770088AD60322AC", columns={"role_id"})})
 * @ORM\Entity
 */
class AdminRole
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="admin_role_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Restaurant\Entity\Adminrole1
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Adminrole1")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="admin_id", referencedColumnName="id")
     * })
     */
    private $admin;

    /**
     * @var \Restaurant\Entity\Role
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     * })
     */
    private $role;


}
