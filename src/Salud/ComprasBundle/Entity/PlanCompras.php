<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\PlanCompras
 */
class PlanCompras
{
    /**
     * @var string $numeroconvenio
     */
    private $numeroconvenio;

    /**
     * @var decimal $montoplan
     */
    private $montoplan;

    /**
     * @var boolean $autorizado
     */
    private $autorizado;

    /**
     * @var date $fechaAutorizacion
     */
    private $fechaAutorizacion;

    /**
     * @var boolean $enviado
     */
    private $enviado;

    /**
     * @var date $fechaEnvio
     */
    private $fechaEnvio;

    /**
     * @var boolean $consolidado
     */
    private $consolidado;

    /**
     * @var date $modificacionesHasta
     */
    private $modificacionesHasta;

    /**
     * @var string $permisos
     */
    private $permisos;

    /**
     * @var string $numeroplan
     */
    private $numeroplan;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var Salud\ComprasBundle\Entity\FuenteFinanciamiento
     */
    private $idFuenteFinanciamiento;

    /**
     * @var Salud\ComprasBundle\Entity\PeriodoFiscal
     */
    private $idPeriodoFiscal;

    /**
     * @var Salud\ComprasBundle\Entity\SubfuenteFinanciamiento
     */
    private $idSubfuenteFinanciamiento;

    /**
     * @var Salud\ComprasBundle\Entity\UnidadSolicitante
     */
    private $idUnidadFinanciadora;

    /**
     * @var Salud\ComprasBundle\Entity\UnidadSolicitante
     */
    private $idUnidadSolicitante;


    /**
     * Set numeroconvenio
     *
     * @param string $numeroconvenio
     */
    public function setNumeroconvenio($numeroconvenio)
    {
        $this->numeroconvenio = $numeroconvenio;
    }

    /**
     * Get numeroconvenio
     *
     * @return string 
     */
    public function getNumeroconvenio()
    {
        return $this->numeroconvenio;
    }

    /**
     * Set montoplan
     *
     * @param decimal $montoplan
     */
    public function setMontoplan($montoplan)
    {
        $this->montoplan = $montoplan;
    }

    /**
     * Get montoplan
     *
     * @return decimal 
     */
    public function getMontoplan()
    {
        return $this->montoplan;
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
     * Set fechaAutorizacion
     *
     * @param date $fechaAutorizacion
     */
    public function setFechaAutorizacion($fechaAutorizacion)
    {
        $this->fechaAutorizacion = $fechaAutorizacion;
    }

    /**
     * Get fechaAutorizacion
     *
     * @return date 
     */
    public function getFechaAutorizacion()
    {
        return $this->fechaAutorizacion;
    }

    /**
     * Set enviado
     *
     * @param boolean $enviado
     */
    public function setEnviado($enviado)
    {
        $this->enviado = $enviado;
    }

    /**
     * Get enviado
     *
     * @return boolean 
     */
    public function getEnviado()
    {
        return $this->enviado;
    }

    /**
     * Set fechaEnvio
     *
     * @param date $fechaEnvio
     */
    public function setFechaEnvio($fechaEnvio)
    {
        $this->fechaEnvio = $fechaEnvio;
    }

    /**
     * Get fechaEnvio
     *
     * @return date 
     */
    public function getFechaEnvio()
    {
        return $this->fechaEnvio;
    }

    /**
     * Set consolidado
     *
     * @param boolean $consolidado
     */
    public function setConsolidado($consolidado)
    {
        $this->consolidado = $consolidado;
    }

    /**
     * Get consolidado
     *
     * @return boolean 
     */
    public function getConsolidado()
    {
        return $this->consolidado;
    }

    /**
     * Set modificacionesHasta
     *
     * @param date $modificacionesHasta
     */
    public function setModificacionesHasta($modificacionesHasta)
    {
        $this->modificacionesHasta = $modificacionesHasta;
    }

    /**
     * Get modificacionesHasta
     *
     * @return date 
     */
    public function getModificacionesHasta()
    {
        return $this->modificacionesHasta;
    }

    /**
     * Set permisos
     *
     * @param string $permisos
     */
    public function setPermisos($permisos)
    {
        $this->permisos = $permisos;
    }

    /**
     * Get permisos
     *
     * @return string 
     */
    public function getPermisos()
    {
        return $this->permisos;
    }

    /**
     * Set numeroplan
     *
     * @param string $numeroplan
     */
    public function setNumeroplan($numeroplan)
    {
        $this->numeroplan = $numeroplan;
    }

    /**
     * Get numeroplan
     *
     * @return string 
     */
    public function getNumeroplan()
    {
        return $this->numeroplan;
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
     * Set idFuenteFinanciamiento
     *
     * @param Salud\ComprasBundle\Entity\FuenteFinanciamiento $idFuenteFinanciamiento
     */
    public function setIdFuenteFinanciamiento(\Salud\ComprasBundle\Entity\FuenteFinanciamiento $idFuenteFinanciamiento)
    {
        $this->idFuenteFinanciamiento = $idFuenteFinanciamiento;
    }

    /**
     * Get idFuenteFinanciamiento
     *
     * @return Salud\ComprasBundle\Entity\FuenteFinanciamiento 
     */
    public function getIdFuenteFinanciamiento()
    {
        return $this->idFuenteFinanciamiento;
    }

    /**
     * Set idPeriodoFiscal
     *
     * @param Salud\ComprasBundle\Entity\PeriodoFiscal $idPeriodoFiscal
     */
    public function setIdPeriodoFiscal(\Salud\ComprasBundle\Entity\PeriodoFiscal $idPeriodoFiscal)
    {
        $this->idPeriodoFiscal = $idPeriodoFiscal;
    }

    /**
     * Get idPeriodoFiscal
     *
     * @return Salud\ComprasBundle\Entity\PeriodoFiscal 
     */
    public function getIdPeriodoFiscal()
    {
        return $this->idPeriodoFiscal;
    }

    /**
     * Set idSubfuenteFinanciamiento
     *
     * @param Salud\ComprasBundle\Entity\SubfuenteFinanciamiento $idSubfuenteFinanciamiento
     */
    public function setIdSubfuenteFinanciamiento(\Salud\ComprasBundle\Entity\SubfuenteFinanciamiento $idSubfuenteFinanciamiento)
    {
        $this->idSubfuenteFinanciamiento = $idSubfuenteFinanciamiento;
    }

    /**
     * Get idSubfuenteFinanciamiento
     *
     * @return Salud\ComprasBundle\Entity\SubfuenteFinanciamiento 
     */
    public function getIdSubfuenteFinanciamiento()
    {
        return $this->idSubfuenteFinanciamiento;
    }

    /**
     * Set idUnidadFinanciadora
     *
     * @param Salud\ComprasBundle\Entity\UnidadSolicitante $idUnidadFinanciadora
     */
    public function setIdUnidadFinanciadora(\Salud\ComprasBundle\Entity\UnidadSolicitante $idUnidadFinanciadora)
    {
        $this->idUnidadFinanciadora = $idUnidadFinanciadora;
    }

    /**
     * Get idUnidadFinanciadora
     *
     * @return Salud\ComprasBundle\Entity\UnidadSolicitante 
     */
    public function getIdUnidadFinanciadora()
    {
        return $this->idUnidadFinanciadora;
    }

    /**
     * Set idUnidadSolicitante
     *
     * @param Salud\ComprasBundle\Entity\UnidadSolicitante $idUnidadSolicitante
     */
    public function setIdUnidadSolicitante(\Salud\ComprasBundle\Entity\UnidadSolicitante $idUnidadSolicitante)
    {
        $this->idUnidadSolicitante = $idUnidadSolicitante;
    }

    /**
     * Get idUnidadSolicitante
     *
     * @return Salud\ComprasBundle\Entity\UnidadSolicitante 
     */
    public function getIdUnidadSolicitante()
    {
        return $this->idUnidadSolicitante;
    }
}