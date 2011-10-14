<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\UnidadSolicitante
 */
class UnidadSolicitante {

    /**
     * @var string $codigounidad
     */
    private $codigounidad;

    /**
     * @var string $nombreunidad
     */
    private $nombreunidad;

    /**
     * @var boolean $realizaplan
     */
    private $realizaplan;

    /**
     * @var boolean $realizaacta
     */
    private $realizaacta;

    /**
     * @var boolean $realizaordencompra
     */
    private $realizaordencompra;

    /**
     * @var integer $idUnidadSuperior
     */
    private $idUnidadSuperior;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var Salud\ComprasBundle\Entity\Nivel
     */
    private $idNivel;

    /**
     * Set codigounidad
     *
     * @param string $codigounidad
     */
    public function setCodigounidad($codigounidad) {
        $this->codigounidad = $codigounidad;
    }

    /**
     * Get codigounidad
     *
     * @return string 
     */
    public function getCodigounidad() {
        return $this->codigounidad;
    }

    /**
     * Set nombreunidad
     *
     * @param string $nombreunidad
     */
    public function setNombreunidad($nombreunidad) {
        $this->nombreunidad = $nombreunidad;
    }

    /**
     * Get nombreunidad
     *
     * @return string 
     */
    public function getNombreunidad() {
        return $this->nombreunidad;
    }

    /**
     * Set realizaplan
     *
     * @param boolean $realizaplan
     */
    public function setRealizaplan($realizaplan) {
        $this->realizaplan = $realizaplan;
    }

    /**
     * Get realizaplan
     *
     * @return boolean 
     */
    public function getRealizaplan() {
        return $this->realizaplan;
    }

    /**
     * Set realizaacta
     *
     * @param boolean $realizaacta
     */
    public function setRealizaacta($realizaacta) {
        $this->realizaacta = $realizaacta;
    }

    /**
     * Get realizaacta
     *
     * @return boolean 
     */
    public function getRealizaacta() {
        return $this->realizaacta;
    }

    /**
     * Set realizaordencompra
     *
     * @param boolean $realizaordencompra
     */
    public function setRealizaordencompra($realizaordencompra) {
        $this->realizaordencompra = $realizaordencompra;
    }

    /**
     * Get realizaordencompra
     *
     * @return boolean 
     */
    public function getRealizaordencompra() {
        return $this->realizaordencompra;
    }

    /**
     * Set idUnidadSuperior
     *
     * @param integer $idUnidadSuperior
     */
    public function setIdUnidadSuperior($idUnidadSuperior) {
        $this->idUnidadSuperior = $idUnidadSuperior;
    }

    /**
     * Get idUnidadSuperior
     *
     * @return integer 
     */
    public function getIdUnidadSuperior() {
        return $this->idUnidadSuperior;
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
     * Set idNivel
     *
     * @param Salud\ComprasBundle\Entity\Nivel $idNivel
     */
    public function setIdNivel(\Salud\ComprasBundle\Entity\Nivel $idNivel) {
        $this->idNivel = $idNivel;
    }

    /**
     * Get idNivel
     *
     * @return Salud\ComprasBundle\Entity\Nivel 
     */
    public function getIdNivel() {
        return $this->idNivel;
    }

    public function __toString() {
        return $this->nombreunidad;
    }

}
