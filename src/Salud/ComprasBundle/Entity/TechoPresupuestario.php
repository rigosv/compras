<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\TechoPresupuestario
 */
class TechoPresupuestario
{
    /**
     * @var decimal $montoasignado
     */
    private $montoasignado;

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
     * @var Salud\ComprasBundle\Entity\UnidadSolicitante
     */
    private $idUnidadFinanciadora;

    /**
     * @var Salud\ComprasBundle\Entity\UnidadSolicitante
     */
    private $idUnidadSolicitante;


    /**
     * Set montoasignado
     *
     * @param decimal $montoasignado
     */
    public function setMontoasignado($montoasignado)
    {
        $this->montoasignado = $montoasignado;
    }

    /**
     * Get montoasignado
     *
     * @return decimal 
     */
    public function getMontoasignado()
    {
        return $this->montoasignado;
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