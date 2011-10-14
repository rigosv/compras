<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\FuenteFinanciamiento
 */
class FuenteFinanciamiento {

    /**
     * @var string $codigofuente
     */
    private $codigofuente;

    /**
     * @var string $descripcionfuente
     */
    private $descripcionfuente;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var Salud\ComprasBundle\Entity\OrigenFinanciamiento
     */
    private $idOrigenFinanciamiento;

    /**
     * Set codigofuente
     *
     * @param string $codigofuente
     */
    public function setCodigofuente($codigofuente) {
        $this->codigofuente = $codigofuente;
    }

    /**
     * Get codigofuente
     *
     * @return string 
     */
    public function getCodigofuente() {
        return $this->codigofuente;
    }

    /**
     * Set descripcionfuente
     *
     * @param string $descripcionfuente
     */
    public function setDescripcionfuente($descripcionfuente) {
        $this->descripcionfuente = $descripcionfuente;
    }

    /**
     * Get descripcionfuente
     *
     * @return string 
     */
    public function getDescripcionfuente() {
        return $this->descripcionfuente;
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
     * Set idOrigenFinanciamiento
     *
     * @param Salud\ComprasBundle\Entity\OrigenFinanciamiento $idOrigenFinanciamiento
     */
    public function setIdOrigenFinanciamiento(\Salud\ComprasBundle\Entity\OrigenFinanciamiento $idOrigenFinanciamiento) {
        $this->idOrigenFinanciamiento = $idOrigenFinanciamiento;
    }

    /**
     * Get idOrigenFinanciamiento
     *
     * @return Salud\ComprasBundle\Entity\OrigenFinanciamiento 
     */
    public function getIdOrigenFinanciamiento() {
        return $this->idOrigenFinanciamiento;
    }

    public function __toString() {
        return $this->descripcionfuente;
    }

}
