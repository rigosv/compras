<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\SubfuenteFinanciamiento
 */
class SubfuenteFinanciamiento {

    /**
     * @var string $codigosubfuente
     */
    private $codigosubfuente;

    /**
     * @var string $descripcionsubfuente
     */
    private $descripcionsubfuente;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var Salud\ComprasBundle\Entity\FuenteFinanciamiento
     */
    private $idFuenteFinanciamiento;

    /**
     * Set codigosubfuente
     *
     * @param string $codigosubfuente
     */
    public function setCodigosubfuente($codigosubfuente) {
        $this->codigosubfuente = $codigosubfuente;
    }

    /**
     * Get codigosubfuente
     *
     * @return string 
     */
    public function getCodigosubfuente() {
        return $this->codigosubfuente;
    }

    /**
     * Set descripcionsubfuente
     *
     * @param string $descripcionsubfuente
     */
    public function setDescripcionsubfuente($descripcionsubfuente) {
        $this->descripcionsubfuente = $descripcionsubfuente;
    }

    /**
     * Get descripcionsubfuente
     *
     * @return string 
     */
    public function getDescripcionsubfuente() {
        return $this->descripcionsubfuente;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set idFuenteFinanciamiento
     *
     * @param Salud\ComprasBundle\Entity\FuenteFinanciamiento $idFuenteFinanciamiento
     */
    public function setIdFuenteFinanciamiento(\Salud\ComprasBundle\Entity\FuenteFinanciamiento $idFuenteFinanciamiento) {
        $this->idFuenteFinanciamiento = $idFuenteFinanciamiento;
    }

    /**
     * Get idFuenteFinanciamiento
     *
     * @return Salud\ComprasBundle\Entity\FuenteFinanciamiento 
     */
    public function getIdFuenteFinanciamiento() {
        return $this->idFuenteFinanciamiento;
    }

    public function __toString() {
        return $this->descripcionsubfuente;
    }

}
