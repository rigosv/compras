<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\CatalogoProducto
 */
class CatalogoProducto
{
    /**
     * @var string $codigocatalogo
     */
    private $codigocatalogo;

    /**
     * @var string $descripcioncatalogo
     */
    private $descripcioncatalogo;

    /**
     * @var integer $id
     */
    private $id;


    /**
     * Set codigocatalogo
     *
     * @param string $codigocatalogo
     */
    public function setCodigocatalogo($codigocatalogo)
    {
        $this->codigocatalogo = $codigocatalogo;
    }

    /**
     * Get codigocatalogo
     *
     * @return string 
     */
    public function getCodigocatalogo()
    {
        return $this->codigocatalogo;
    }

    /**
     * Set descripcioncatalogo
     *
     * @param string $descripcioncatalogo
     */
    public function setDescripcioncatalogo($descripcioncatalogo)
    {
        $this->descripcioncatalogo = $descripcioncatalogo;
    }

    /**
     * Get descripcioncatalogo
     *
     * @return string 
     */
    public function getDescripcioncatalogo()
    {
        return $this->descripcioncatalogo;
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