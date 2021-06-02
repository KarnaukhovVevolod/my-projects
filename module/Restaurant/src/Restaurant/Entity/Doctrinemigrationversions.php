<?php

namespace Restaurant\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Doctrinemigrationversions
 *
 * @ORM\Table(name="doctrinemigrationversions")
 * @ORM\Entity
 */
class Doctrinemigrationversions
{
    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=1024, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="doctrinemigrationversions_version_seq", allocationSize=1, initialValue=1)
     */
    private $version;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="executedat", type="datetime", nullable=true)
     */
    private $executedat;

    /**
     * @var int|null
     *
     * @ORM\Column(name="executiontime", type="integer", nullable=true)
     */
    private $executiontime;


}
