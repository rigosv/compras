<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\Especifico
 */
class Especifico
{
    /**
     * @var string $codigoespecifico
     */
    private $codigoespecifico;

    /**
     * @var string $descripcionespecifico
     */
    private $descripcionespecifico;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var Salud\ComprasBundle\Entity\CatalogoProducto
     */
    private $idCatalogoProducto;

    /**
     * @var Salud\ComprasBundle\Entity\Rubro
     */
    private $idRubro;


    /**
     * Set codigoespecifico
     *
     * @param string $codigoespecifico
     */
    public function setCodigoespecifico($codigoespecifico)
    {
        $this->codigoespecifico = $codigoespecifico;
    }

    /**
     * Get codigoespecifico
     *
     * @return string 
     */
    public function getCodigoespecifico()
    {
        return $this->codigoespecifico;
    }

    /**
     * Set descripcionespecifico
     *
     * @param string $descripcionespecifico
     */
    public function setDescripcionespecifico($descripcionespecifico)
    {
        $this->descripcionespecifico = $descripcionespecifico;
    }

    /**
     * Get descripcionespecifico
     *
     * @return string 
     */
    public function getDescripcionespecifico()
    {
        return $this->descripcionespecifico;
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

    /**
     * Set idCatalogoProducto
     *
     * @param Salud\ComprasBundle\Entity\CatalogoProducto $idCatalogoProducto
     */
    public function setIdCatalogoProducto(\Salud\ComprasBundle\Entity\CatalogoProducto $idCatalogoProducto)
    {
        $this->idCatalogoProducto = $idCatalogoProducto;
    }

    /**
     * Get idCatalogoProducto
     *
     * @return Salud\ComprasBundle\Entity\CatalogoProducto 
     */
    public function getIdCatalogoProducto()
    {
        return $this->idCatalogoProducto;
    }

    /**
     * Set idRubro
     *
     * @param Salud\ComprasBundle\Entity\Rubro $idRubro
     */
    public function setIdRubro(\Salud\ComprasBundle\Entity\Rubro $idRubro)
    {
        $this->idRubro = $idRubro;
    }

    /**
     * Get idRubro
     *
     * @return Salud\ComprasBundle\Entity\Rubro 
     */
    public function getIdRubro()
    {
        return $this->idRubro;
    }
}