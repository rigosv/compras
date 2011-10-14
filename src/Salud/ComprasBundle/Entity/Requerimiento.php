<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\Requerimiento
 */
class Requerimiento
{
    /**
     * @var string $numerorequerimiento
     */
    private $numerorequerimiento;

    /**
     * @var string $numerorequerimientoXuni
     */
    private $numerorequerimientoXuni;

    /**
     * @var string $numeroDictamentf
     */
    private $numeroDictamentf;

    /**
     * @var date $fecharequerimiento
     */
    private $fecharequerimiento;

    /**
     * @var decimal $montorequerimiento
     */
    private $montorequerimiento;

    /**
     * @var boolean $finalizado
     */
    private $finalizado;

    /**
     * @var text $observaciones
     */
    private $observaciones;

    /**
     * @var date $fechaEntregado
     */
    private $fechaEntregado;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var Salud\ComprasBundle\Entity\PeriodoFiscal
     */
    private $idPeriodoFiscal;

    /**
     * @var Salud\ComprasBundle\Entity\UnidadSolicitante
     */
    private $idUnidadSolicitante;


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
     * @return string 
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
     * @return string 
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
     * @return string 
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
     * @return date 
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
     * @return decimal 
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
     * @return boolean 
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
     * @return text 
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
     * @return date 
     */
    public function getFechaEntregado()
    {
        return $this->fechaEntregado;
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