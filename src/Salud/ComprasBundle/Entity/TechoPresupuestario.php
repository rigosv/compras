<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\TechoPresupuestario
 *
 * @ORM\Table(name="techo_presupuestario")
 * @ORM\Entity
 */
class TechoPresupuestario
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="techo_presupuestario_id_seq", allocationSize="1", initialValue="1")
     */
    private $id;

    /**
     * @var decimal $montoasignado
     *
     * @ORM\Column(name="montoasignado", type="decimal", nullable=false)
     */
    private $montoasignado;

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
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

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