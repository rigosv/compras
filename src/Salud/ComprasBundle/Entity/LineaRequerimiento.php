<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\LineaRequerimiento
 */
class LineaRequerimiento
{
    /**
     * @var decimal $preciounitario
     */
    private $preciounitario;

    /**
     * @var text $especificaciones
     */
    private $especificaciones;

    /**
     * @var float $cantidad
     */
    private $cantidad;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var Salud\ComprasBundle\Entity\Item
     */
    private $idItem;

    /**
     * @var Salud\ComprasBundle\Entity\Requerimiento
     */
    private $idRequerimiento;

    /**
     * @var Salud\ComprasBundle\Entity\UnidadMedida
     */
    private $idUnidadMedida;


    /**
     * Set preciounitario
     *
     * @param decimal $preciounitario
     */
    public function setPreciounitario($preciounitario)
    {
        $this->preciounitario = $preciounitario;
    }

    /**
     * Get preciounitario
     *
     * @return decimal 
     */
    public function getPreciounitario()
    {
        return $this->preciounitario;
    }

    /**
     * Set especificaciones
     *
     * @param text $especificaciones
     */
    public function setEspecificaciones($especificaciones)
    {
        $this->especificaciones = $especificaciones;
    }

    /**
     * Get especificaciones
     *
     * @return text 
     */
    public function getEspecificaciones()
    {
        return $this->especificaciones;
    }

    /**
     * Set cantidad
     *
     * @param float $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * Get cantidad
     *
     * @return float 
     */
    public function getCantidad()
    {
        return $this->cantidad;
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
     * Set idItem
     *
     * @param Salud\ComprasBundle\Entity\Item $idItem
     */
    public function setIdItem(\Salud\ComprasBundle\Entity\Item $idItem)
    {
        $this->idItem = $idItem;
    }

    /**
     * Get idItem
     *
     * @return Salud\ComprasBundle\Entity\Item 
     */
    public function getIdItem()
    {
        return $this->idItem;
    }

    /**
     * Set idRequerimiento
     *
     * @param Salud\ComprasBundle\Entity\Requerimiento $idRequerimiento
     */
    public function setIdRequerimiento(\Salud\ComprasBundle\Entity\Requerimiento $idRequerimiento)
    {
        $this->idRequerimiento = $idRequerimiento;
    }

    /**
     * Get idRequerimiento
     *
     * @return Salud\ComprasBundle\Entity\Requerimiento 
     */
    public function getIdRequerimiento()
    {
        return $this->idRequerimiento;
    }

    /**
     * Set idUnidadMedida
     *
     * @param Salud\ComprasBundle\Entity\UnidadMedida $idUnidadMedida
     */
    public function setIdUnidadMedida(\Salud\ComprasBundle\Entity\UnidadMedida $idUnidadMedida)
    {
        $this->idUnidadMedida = $idUnidadMedida;
    }

    /**
     * Get idUnidadMedida
     *
     * @return Salud\ComprasBundle\Entity\UnidadMedida 
     */
    public function getIdUnidadMedida()
    {
        return $this->idUnidadMedida;
    }
}