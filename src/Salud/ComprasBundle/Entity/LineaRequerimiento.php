<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\LineaRequerimiento
 *
 * @ORM\Table(name="linea_requerimiento")
 * @ORM\Entity
 */
class LineaRequerimiento
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="linea_requerimiento_id_seq", allocationSize="1", initialValue="1")
     */
    private $id;

    /**
     * @var decimal $preciounitario
     *
     * @ORM\Column(name="preciounitario", type="decimal", nullable=false)
     */
    private $preciounitario;

    /**
     * @var text $especificaciones
     *
     * @ORM\Column(name="especificaciones", type="text", nullable=true)
     */
    private $especificaciones;

    /**
     * @var float $cantidad
     *
     * @ORM\Column(name="cantidad", type="float", nullable=false)
     */
    private $cantidad;

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
     * @var Requerimiento
     *
     * @ORM\ManyToOne(targetEntity="Requerimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_requerimiento", referencedColumnName="id")
     * })
     */
    private $idRequerimiento;

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
     * @return integer 
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