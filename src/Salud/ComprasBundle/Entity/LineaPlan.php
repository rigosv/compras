<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\LineaPlan
 *
 * @ORM\Table(name="linea_plan")
 * @ORM\Entity(repositoryClass="Salud\ComprasBundle\Repository\LineaPlanRepository")
 */
class LineaPlan
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="linea_plan_id_seq", allocationSize="1", initialValue="1")
     */
    private $id;

    /**
     * @var decimal $preciounitario
     *
     * @ORM\Column(name="preciounitario", type="decimal", nullable=false)
     */
    private $preciounitario;

    /**
     * @var integer $cantidadPedido
     *
     * @ORM\Column(name="cantidad_pedido", type="integer", nullable=true)
     */
    private $cantidadPedido;

    /**
     * @var Item
     *
     * @ORM\ManyToOne(targetEntity="Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_item", referencedColumnName="id")
     * })
     */
    private $idItem;

    /**
     * @var PlanCompras
     *
     * @ORM\ManyToOne(targetEntity="PlanCompras")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_plan_compras", referencedColumnName="id")
     * })
     */
    private $idPlanCompras;

    /**
     * @var UnidadMedida
     *
     * @ORM\ManyToOne(targetEntity="UnidadMedida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_unidad_medida", referencedColumnName="id")
     * })
     */
    private $idUnidadMedida;



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
     * @return decimal $preciounitario
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
     * @return integer $cantidadPedido
     */
    public function getCantidadPedido()
    {
        return $this->cantidadPedido;
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
     * @return Salud\ComprasBundle\Entity\Item $idItem
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
     * @return Salud\ComprasBundle\Entity\PlanCompras $idPlanCompras
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
     * @return Salud\ComprasBundle\Entity\UnidadMedida $idUnidadMedida
     */
    public function getIdUnidadMedida()
    {
        return $this->idUnidadMedida;
    }
}