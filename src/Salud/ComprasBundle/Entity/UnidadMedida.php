<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\UnidadMedida
 */
class UnidadMedida
{
    /**
     * @var string $codigounidadmedida
     */
    private $codigounidadmedida;

    /**
     * @var string $descripcionunidadmedida
     */
    private $descripcionunidadmedida;

    /**
     * @var integer $id
     */
    private $id;


    /**
     * Set codigounidadmedida
     *
     * @param string $codigounidadmedida
     */
    public function setCodigounidadmedida($codigounidadmedida)
    {
        $this->codigounidadmedida = $codigounidadmedida;
    }

    /**
     * Get codigounidadmedida
     *
     * @return string 
     */
    public function getCodigounidadmedida()
    {
        return $this->codigounidadmedida;
    }

    /**
     * Set descripcionunidadmedida
     *
     * @param string $descripcionunidadmedida
     */
    public function setDescripcionunidadmedida($descripcionunidadmedida)
    {
        $this->descripcionunidadmedida = $descripcionunidadmedida;
    }

    /**
     * Get descripcionunidadmedida
     *
     * @return string 
     */
    public function getDescripcionunidadmedida()
    {
        return $this->descripcionunidadmedida;
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