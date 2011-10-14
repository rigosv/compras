<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\Item
 */
class Item
{
    /**
     * @var text $descripcionitem
     */
    private $descripcionitem;

    /**
     * @var boolean $autorizado
     */
    private $autorizado;

    /**
     * @var boolean $descontinuado
     */
    private $descontinuado;

    /**
     * @var decimal $preciounitario
     */
    private $preciounitario;

    /**
     * @var boolean $bloqueado
     */
    private $bloqueado;

    /**
     * @var text $observaciones
     */
    private $observaciones;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var Salud\ComprasBundle\Entity\Especifico
     */
    private $idEspecifico;

    /**
     * @var Salud\ComprasBundle\Entity\Especifico
     */
    private $idEspecificoOnu;

    /**
     * @var Salud\ComprasBundle\Entity\UnidadMedida
     */
    private $idUnidadMedida;


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
     * @return text 
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
     * @return boolean 
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
     * @return boolean 
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
     * @return decimal 
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
     * @return boolean 
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
     * @return text 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
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
     * @return Salud\ComprasBundle\Entity\Especifico 
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
     * @return Salud\ComprasBundle\Entity\Especifico 
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
     * @return Salud\ComprasBundle\Entity\UnidadMedida 
     */
    public function getIdUnidadMedida()
    {
        return $this->idUnidadMedida;
    }
}