<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\PeriodoFiscal
 */
class PeriodoFiscal {

    /**
     * @var smallint $aniofiscal
     */
    private $aniofiscal;

    /**
     * @var boolean $estaactivo
     */
    private $estaactivo;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * Set aniofiscal
     *
     * @param smallint $aniofiscal
     */
    public function setAniofiscal($aniofiscal) {
        $this->aniofiscal = $aniofiscal;
    }

    /**
     * Get aniofiscal
     *
     * @return smallint 
     */
    public function getAniofiscal() {
        return $this->aniofiscal;
    }

    /**
     * Set estaactivo
     *
     * @param boolean $estaactivo
     */
    public function setEstaactivo($estaactivo) {
        $this->estaactivo = $estaactivo;
    }

    /**
     * Get estaactivo
     *
     * @return boolean 
     */
    public function getEstaactivo() {
        return $this->estaactivo;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    public function __toString() {
        return (string) $this->aniofiscal;
    }

}