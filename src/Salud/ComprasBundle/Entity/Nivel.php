<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\Nivel
 */
class Nivel
{
    /**
     * @var string $codigonivel
     */
    private $codigonivel;

    /**
     * @var string $descripcionnivel
     */
    private $descripcionnivel;

    /**
     * @var integer $id
     */
    private $id;


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
     * @return string 
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
     * @return string 
     */
    public function getDescripcionnivel()
    {
        return $this->descripcionnivel;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}