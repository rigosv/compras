<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\PlanCompras
 *
 * @ORM\Table(name="plan_compras")
 * @ORM\Entity
 */
class PlanCompras
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="plan_compras_id_seq", allocationSize="1", initialValue="1")
     */
    private $id;

    /**
     * @var string $numeroconvenio
     *
     * @ORM\Column(name="numeroconvenio", type="string", length=20, nullable=true)
     */
    private $numeroconvenio;

    /**
     * @var decimal $montoplan
     *
     * @ORM\Column(name="montoplan", type="decimal", nullable=false)
     */
    private $montoplan;

    /**
     * @var boolean $autorizado
     *
     * @ORM\Column(name="autorizado", type="boolean", nullable=false)
     */
    private $autorizado;

    /**
     * @var date $fechaAutorizacion
     *
     * @ORM\Column(name="fecha_autorizacion", type="date", nullable=true)
     */
    private $fechaAutorizacion;

    /**
     * @var boolean $enviado
     *
     * @ORM\Column(name="enviado", type="boolean", nullable=false)
     */
    private $enviado;

    /**
     * @var date $fechaEnvio
     *
     * @ORM\Column(name="fecha_envio", type="date", nullable=true)
     */
    private $fechaEnvio;

    /**
     * @var boolean $consolidado
     *
     * @ORM\Column(name="consolidado", type="boolean", nullable=false)
     */
    private $consolidado;

    /**
     * @var date $modificacionesHasta
     *
     * @ORM\Column(name="modificaciones_hasta", type="date", nullable=true)
     */
    private $modificacionesHasta;

    /**
     * @var string $permisos
     *
     * @ORM\Column(name="permisos", type="string", length=5, nullable=true)
     */
    private $permisos;

    /**
     * @var string $numeroplan
     *
     * @ORM\Column(name="numeroplan", type="string", length=4, nullable=false)
     */
    private $numeroplan;

    /**
     * @var FuenteFinanciamiento
     *
     * @ORM\ManyToOne(targetEntity="FuenteFinanciamiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_fuente_financiamiento", referencedColumnName="id")
     * })
     */
    private $idFuenteFinanciamiento;

    /**
     * @var PeriodoFiscal
     *
     * @ORM\ManyToOne(targetEntity="PeriodoFiscal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_periodo_fiscal", referencedColumnName="id")
     * })
     */
    private $idPeriodoFiscal;

    /**
     * @var SubfuenteFinanciamiento
     *
     * @ORM\ManyToOne(targetEntity="SubfuenteFinanciamiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_subfuente_financiamiento", referencedColumnName="id")
     * })
     */
    private $idSubfuenteFinanciamiento;

    /**
     * @var UnidadSolicitante
     *
     * @ORM\ManyToOne(targetEntity="UnidadSolicitante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_unidad_financiadora", referencedColumnName="id")
     * })
     */
    private $idUnidadFinanciadora;

    /**
     * @var UnidadSolicitante
     *
     * @ORM\ManyToOne(targetEntity="UnidadSolicitante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_unidad_solicitante", referencedColumnName="id")
     * })
     */
    private $idUnidadSolicitante;



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
     * @return string $numeroconvenio
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
     * @return decimal $montoplan
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
     * @return boolean $autorizado
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
     * @return date $fechaAutorizacion
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
     * @return boolean $enviado
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
     * @return date $fechaEnvio
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
     * @return boolean $consolidado
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
     * @return date $modificacionesHasta
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
     * @return string $permisos
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
     * @return string $numeroplan
     */
    public function getNumeroplan()
    {
        return $this->numeroplan;
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
     * @return Salud\ComprasBundle\Entity\FuenteFinanciamiento $idFuenteFinanciamiento
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
     * @return Salud\ComprasBundle\Entity\PeriodoFiscal $idPeriodoFiscal
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
     * @return Salud\ComprasBundle\Entity\SubfuenteFinanciamiento $idSubfuenteFinanciamiento
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
     * @return Salud\ComprasBundle\Entity\UnidadSolicitante $idUnidadFinanciadora
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
     * @return Salud\ComprasBundle\Entity\UnidadSolicitante $idUnidadSolicitante
     */
    public function getIdUnidadSolicitante()
    {
        return $this->idUnidadSolicitante;
    }
}