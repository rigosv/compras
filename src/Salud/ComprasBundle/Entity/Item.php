<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\Item
 *
 * @ORM\Table(name="item")
 * @ORM\Entity
 */
class Item
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="item_id_seq", allocationSize="1", initialValue="1")
     */
    private $id;

    /**
     * @var text $descripcionitem
     *
     * @ORM\Column(name="descripcionitem", type="text", nullable=false)
     */
    private $descripcionitem;

    /**
     * @var boolean $autorizado
     *
     * @ORM\Column(name="autorizado", type="boolean", nullable=false)
     */
    private $autorizado;

    /**
     * @var boolean $descontinuado
     *
     * @ORM\Column(name="descontinuado", type="boolean", nullable=false)
     */
    private $descontinuado;

    /**
     * @var decimal $preciounitario
     *
     * @ORM\Column(name="preciounitario", type="decimal", nullable=true)
     */
    private $preciounitario;

    /**
     * @var boolean $bloqueado
     *
     * @ORM\Column(name="bloqueado", type="boolean", nullable=true)
     */
    private $bloqueado;

    /**
     * @var text $observaciones
     *
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    private $observaciones;

    /**
     * @var Especifico
     *
     * @ORM\ManyToOne(targetEntity="Especifico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_especifico", referencedColumnName="id")
     * })
     */
    private $idEspecifico;

    /**
     * @var Especifico
     *
     * @ORM\ManyToOne(targetEntity="Especifico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_especifico_onu", referencedColumnName="id")
     * })
     */
    private $idEspecificoOnu;

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
     * Set descripcionitem
     *
     * @param text $descripcionitem
     */
    public function setDescripcionitem($descripcionitem)
    {
        $this->descripcionitem = $descripcionitem;
    }

    /**
     * Get descripcionitem
     *
     * @return text $descripcionitem
     */
    public function getDescripcionitem()
    {
        return $this->descripcionitem;
    }

    /**
     * Set autorizado
     *
     * @param boolean $autorizado
     */
    public function setAutorizado($autorizado)
    {
        $this->autorizado = $autorizado;
    }

    /**
     * Get autorizado
     *
     * @return boolean $autorizado
     */
    public function getAutorizado()
    {
        return $this->autorizado;
    }

    /**
     * Set descontinuado
     *
     * @param boolean $descontinuado
     */
    public function setDescontinuado($descontinuado)
    {
        $this->descontinuado = $descontinuado;
    }

    /**
     * Get descontinuado
     *
     * @return boolean $descontinuado
     */
    public function getDescontinuado()
    {
        return $this->descontinuado;
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
     * Set bloqueado
     *
     * @param boolean $bloqueado
     */
    public function setBloqueado($bloqueado)
    {
        $this->bloqueado = $bloqueado;
    }

    /**
     * Get bloqueado
     *
     * @return boolean $bloqueado
     */
    public function getBloqueado()
    {
        return $this->bloqueado;
    }

    /**
     * Set observaciones
     *
     * @param text $observaciones
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }

    /**
     * Get observaciones
     *
     * @return text $observaciones
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set idEspecifico
     *
     * @param Salud\ComprasBundle\Entity\Especifico $idEspecifico
     */
    public function setIdEspecifico(\Salud\ComprasBundle\Entity\Especifico $idEspecifico)
    {
        $this->idEspecifico = $idEspecifico;
    }

    /**
     * Get idEspecifico
     *
     * @return Salud\ComprasBundle\Entity\Especifico $idEspecifico
     */
    public function getIdEspecifico()
    {
        return $this->idEspecifico;
    }

    /**
     * Set idEspecificoOnu
     *
     * @param Salud\ComprasBundle\Entity\Especifico $idEspecificoOnu
     */
    public function setIdEspecificoOnu(\Salud\ComprasBundle\Entity\Especifico $idEspecificoOnu)
    {
        $this->idEspecificoOnu = $idEspecificoOnu;
    }

    /**
     * Get idEspecificoOnu
     *
     * @return Salud\ComprasBundle\Entity\Especifico $idEspecificoOnu
     */
    public function getIdEspecificoOnu()
    {
        return $this->idEspecificoOnu;
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