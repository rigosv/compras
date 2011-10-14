<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\LineaPlan
 */
class LineaPlan
{
    /**
     * @var decimal $preciounitario
     */
    private $preciounitario;

    /**
     * @var integer $cantidadPedido
     */
    private $cantidadPedido;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var Salud\ComprasBundle\Entity\Item
     */
    private $idItem;

    /**
     * @var Salud\ComprasBundle\Entity\PlanCompras
     */
    private $idPlanCompras;

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
     * Set cantidadPedido
     *
     * @param integer $cantidadPedido
     */
    public function setCantidadPedido($cantidadPedido)
    {
        $this->cantidadPedido = $cantidadPedido;
    }

    /**
     * Get cantidadPedido
     *
     * @return integer 
     */
    public function getCantidadPedido()
    {
        return $this->cantidadPedido;
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
     * Set idPlanCompras
     *
     * @param Salud\ComprasBundle\Entity\PlanCompras $idPlanCompras
     */
    public function setIdPlanCompras(\Salud\ComprasBundle\Entity\PlanCompras $idPlanCompras)
    {
        $this->idPlanCompras = $idPlanCompras;
    }

    /**
     * Get idPlanCompras
     *
     * @return Salud\ComprasBundle\Entity\PlanCompras 
     */
    public function getIdPlanCompras()
    {
        return $this->idPlanCompras;
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