<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\PedidoProducto
 */
class PedidoProducto
{
    /**
     * @var string $numeropedido
     */
    private $numeropedido;

    /**
     * @var string $mespedido
     */
    private $mespedido;

    /**
     * @var float $cantidad
     */
    private $cantidad;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var Salud\ComprasBundle\Entity\LineaPlan
     */
    private $idLineaPlan;


    /**
     * Set numeropedido
     *
     * @param string $numeropedido
     */
    public function setNumeropedido($numeropedido)
    {
        $this->numeropedido = $numeropedido;
    }

    /**
     * Get numeropedido
     *
     * @return string 
     */
    public function getNumeropedido()
    {
        return $this->numeropedido;
    }

    /**
     * Set mespedido
     *
     * @param string $mespedido
     */
    public function setMespedido($mespedido)
    {
        $this->mespedido = $mespedido;
    }

    /**
     * Get mespedido
     *
     * @return string 
     */
    public function getMespedido()
    {
        return $this->mespedido;
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
     * Set idLineaPlan
     *
     * @param Salud\ComprasBundle\Entity\LineaPlan $idLineaPlan
     */
    public function setIdLineaPlan(\Salud\ComprasBundle\Entity\LineaPlan $idLineaPlan)
    {
        $this->idLineaPlan = $idLineaPlan;
    }

    /**
     * Get idLineaPlan
     *
     * @return Salud\ComprasBundle\Entity\LineaPlan 
     */
    public function getIdLineaPlan()
    {
        return $this->idLineaPlan;
    }
}