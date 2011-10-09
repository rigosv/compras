<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\PedidoProducto
 *
 * @ORM\Table(name="pedido_producto")
 * @ORM\Entity
 */
class PedidoProducto
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="pedido_producto_id_seq", allocationSize="1", initialValue="1")
     */
    private $id;

    /**
     * @var string $numeropedido
     *
     * @ORM\Column(name="numeropedido", type="string", length=2, nullable=false)
     */
    private $numeropedido;

    /**
     * @var string $mespedido
     *
     * @ORM\Column(name="mespedido", type="string", length=2, nullable=true)
     */
    private $mespedido;

    /**
     * @var float $cantidad
     *
     * @ORM\Column(name="cantidad", type="float", nullable=false)
     */
    private $cantidad;

    /**
     * @var LineaPlan
     *
     * @ORM\ManyToOne(targetEntity="LineaPlan")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_linea_plan", referencedColumnName="id")
     * })
     */
    private $idLineaPlan;



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