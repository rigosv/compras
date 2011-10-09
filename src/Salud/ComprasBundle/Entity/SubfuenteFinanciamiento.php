<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\SubfuenteFinanciamiento
 *
 * @ORM\Table(name="subfuente_financiamiento")
 * @ORM\Entity
 */
class SubfuenteFinanciamiento
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="subfuente_financiamiento_id_seq", allocationSize="1", initialValue="1")
     */
    private $id;

    /**
     * @var string $codigosubfuente
     *
     * @ORM\Column(name="codigosubfuente", type="string", length=3, nullable=false)
     */
    private $codigosubfuente;

    /**
     * @var string $descripcionsubfuente
     *
     * @ORM\Column(name="descripcionsubfuente", type="string", length=50, nullable=false)
     */
    private $descripcionsubfuente;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codigosubfuente
     *
     * @param string $codigosubfuente
     */
    public function setCodigosubfuente($codigosubfuente)
    {
        $this->codigosubfuente = $codigosubfuente;
    }

    /**
     * Get codigosubfuente
     *
     * @return string 
     */
    public function getCodigosubfuente()
    {
        return $this->codigosubfuente;
    }

    /**
     * Set descripcionsubfuente
     *
     * @param string $descripcionsubfuente
     */
    public function setDescripcionsubfuente($descripcionsubfuente)
    {
        $this->descripcionsubfuente = $descripcionsubfuente;
    }

    /**
     * Get descripcionsubfuente
     *
     * @return string 
     */
    public function getDescripcionsubfuente()
    {
        return $this->descripcionsubfuente;
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
    
    public function __toString() {
        return $this->descripcionsubfuente;
    }
}