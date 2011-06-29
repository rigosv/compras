<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\Nivel
 *
 * @ORM\Table(name="nivel")
 * @ORM\Entity
 */
class Nivel
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="nivel_id_seq", allocationSize="1", initialValue="1")
     */
    private $id;

    /**
     * @var string $codigonivel
     *
     * @ORM\Column(name="codigonivel", type="string", length=2, nullable=false)
     */
    private $codigonivel;

    /**
     * @var string $descripcionnivel
     *
     * @ORM\Column(name="descripcionnivel", type="string", length=30, nullable=false)
     */
    private $descripcionnivel;



    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codigonivel
     *
     * @param string $codigonivel
     */
    public function setCodigonivel($codigonivel)
    {
        $this->codigonivel = $codigonivel;
    }

    /**
     * Get codigonivel
     *
     * @return string $codigonivel
     */
    public function getCodigonivel()
    {
        return $this->codigonivel;
    }

    /**
     * Set descripcionnivel
     *
     * @param string $descripcionnivel
     */
    public function setDescripcionnivel($descripcionnivel)
    {
        $this->descripcionnivel = $descripcionnivel;
    }

    /**
     * Get descripcionnivel
     *
     * @return string $descripcionnivel
     */
    public function getDescripcionnivel()
    {
        return $this->descripcionnivel;
    }
}