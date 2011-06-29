<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\Requerimiento
 *
 * @ORM\Table(name="requerimiento")
 * @ORM\Entity
 */
class Requerimiento
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="requerimiento_id_seq", allocationSize="1", initialValue="1")
     */
    private $id;

    /**
     * @var string $numerorequerimiento
     *
     * @ORM\Column(name="numerorequerimiento", type="string", length=5, nullable=false)
     */
    private $numerorequerimiento;

    /**
     * @var string $numerorequerimientoXuni
     *
     * @ORM\Column(name="numerorequerimiento_xuni", type="string", length=3, nullable=false)
     */
    private $numerorequerimientoXuni;

    /**
     * @var string $numeroDictamentf
     *
     * @ORM\Column(name="numero_dictamentf", type="string", length=4, nullable=true)
     */
    private $numeroDictamentf;

    /**
     * @var date $fecharequerimiento
     *
     * @ORM\Column(name="fecharequerimiento", type="date", nullable=false)
     */
    private $fecharequerimiento;

    /**
     * @var decimal $montorequerimiento
     *
     * @ORM\Column(name="montorequerimiento", type="decimal", nullable=false)
     */
    private $montorequerimiento;

    /**
     * @var boolean $finalizado
     *
     * @ORM\Column(name="finalizado", type="boolean", nullable=false)
     */
    private $finalizado;

    /**
     * @var text $observaciones
     *
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    private $observaciones;

    /**
     * @var date $fechaEntregado
     *
     * @ORM\Column(name="fecha_entregado", type="date", nullable=true)
     */
    private $fechaEntregado;

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
     * Set numerorequerimiento
     *
     * @param string $numerorequerimiento
     */
    public function setNumerorequerimiento($numerorequerimiento)
    {
        $this->numerorequerimiento = $numerorequerimiento;
    }

    /**
     * Get numerorequerimiento
     *
     * @return string $numerorequerimiento
     */
    public function getNumerorequerimiento()
    {
        return $this->numerorequerimiento;
    }

    /**
     * Set numerorequerimientoXuni
     *
     * @param string $numerorequerimientoXuni
     */
    public function setNumerorequerimientoXuni($numerorequerimientoXuni)
    {
        $this->numerorequerimientoXuni = $numerorequerimientoXuni;
    }

    /**
     * Get numerorequerimientoXuni
     *
     * @return string $numerorequerimientoXuni
     */
    public function getNumerorequerimientoXuni()
    {
        return $this->numerorequerimientoXuni;
    }

    /**
     * Set numeroDictamentf
     *
     * @param string $numeroDictamentf
     */
    public function setNumeroDictamentf($numeroDictamentf)
    {
        $this->numeroDictamentf = $numeroDictamentf;
    }

    /**
     * Get numeroDictamentf
     *
     * @return string $numeroDictamentf
     */
    public function getNumeroDictamentf()
    {
        return $this->numeroDictamentf;
    }

    /**
     * Set fecharequerimiento
     *
     * @param date $fecharequerimiento
     */
    public function setFecharequerimiento($fecharequerimiento)
    {
        $this->fecharequerimiento = $fecharequerimiento;
    }

    /**
     * Get fecharequerimiento
     *
     * @return date $fecharequerimiento
     */
    public function getFecharequerimiento()
    {
        return $this->fecharequerimiento;
    }

    /**
     * Set montorequerimiento
     *
     * @param decimal $montorequerimiento
     */
    public function setMontorequerimiento($montorequerimiento)
    {
        $this->montorequerimiento = $montorequerimiento;
    }

    /**
     * Get montorequerimiento
     *
     * @return decimal $montorequerimiento
     */
    public function getMontorequerimiento()
    {
        return $this->montorequerimiento;
    }

    /**
     * Set finalizado
     *
     * @param boolean $finalizado
     */
    public function setFinalizado($finalizado)
    {
        $this->finalizado = $finalizado;
    }

    /**
     * Get finalizado
     *
     * @return boolean $finalizado
     */
    public function getFinalizado()
    {
        return $this->finalizado;
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
     * Set fechaEntregado
     *
     * @param date $fechaEntregado
     */
    public function setFechaEntregado($fechaEntregado)
    {
        $this->fechaEntregado = $fechaEntregado;
    }

    /**
     * Get fechaEntregado
     *
     * @return date $fechaEntregado
     */
    public function getFechaEntregado()
    {
        return $this->fechaEntregado;
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