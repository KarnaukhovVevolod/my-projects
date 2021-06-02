<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RolePermission
 *
 * @ORM\Table(name="role_permission", indexes={@ORM\Index(name="IDX_6F7DF886D60322AC", columns={"role_id"}), @ORM\Index(name="IDX_6F7DF886FED90CCA", columns={"permission_id"})})
 * @ORM\Entity
 */
class RolePermission
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="role_permission_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Restaurant\Entity\Role
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     * })
     */
    private $role;

    /**
     * @var \Restaurant\Entity\Permission
     *
     * @ORM\ManyToOne(targetEntity="Restaurant\Entity\Permission")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="permission_id", referencedColumnName="id")
     * })
     */
    private $permission;


}
