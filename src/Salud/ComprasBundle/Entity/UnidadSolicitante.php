<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\UnidadSolicitante
 *
 * @ORM\Table(name="unidad_solicitante")
 * @ORM\Entity
 */
class UnidadSolicitante
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="unidad_solicitante_id_seq", allocationSize="1", initialValue="1")
     */
    private $id;

    /**
     * @var string $codigounidad
     *
     * @ORM\Column(name="codigounidad", type="string", length=10, nullable=false)
     */
    private $codigounidad;

    /**
     * @var string $nombreunidad
     *
     * @ORM\Column(name="nombreunidad", type="string", length=100, nullable=false)
     */
    private $nombreunidad;

    /**
     * @var boolean $realizaplan
     *
     * @ORM\Column(name="realizaplan", type="boolean", nullable=false)
     */
    private $realizaplan;

    /**
     * @var boolean $realizaacta
     *
     * @ORM\Column(name="realizaacta", type="boolean", nullable=false)
     */
    private $realizaacta;

    /**
     * @var boolean $realizaordencompra
     *
     * @ORM\Column(name="realizaordencompra", type="boolean", nullable=true)
     */
    private $realizaordencompra;

    /**
     * @var integer $idUnidadSuperior
     *
     * @ORM\Column(name="id_unidad_superior", type="integer", nullable=true)
     */
    private $idUnidadSuperior;

    /**
     * @var Nivel
     *
     * @ORM\ManyToOne(targetEntity="Nivel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_nivel", referencedColumnName="id")
     * })
     */
    private $idNivel;



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
     * Set codigounidad
     *
     * @param string $codigounidad
     */
    public function setCodigounidad($codigounidad)
    {
        $this->codigounidad = $codigounidad;
    }

    /**
     * Get codigounidad
     *
     * @return string $codigounidad
     */
    public function getCodigounidad()
    {
        return $this->codigounidad;
    }

    /**
     * Set nombreunidad
     *
     * @param string $nombreunidad
     */
    public function setNombreunidad($nombreunidad)
    {
        $this->nombreunidad = $nombreunidad;
    }

    /**
     * Get nombreunidad
     *
     * @return string $nombreunidad
     */
    public function getNombreunidad()
    {
        return $this->nombreunidad;
    }

    /**
     * Set realizaplan
     *
     * @param boolean $realizaplan
     */
    public function setRealizaplan($realizaplan)
    {
        $this->realizaplan = $realizaplan;
    }

    /**
     * Get realizaplan
     *
     * @return boolean $realizaplan
     */
    public function getRealizaplan()
    {
        return $this->realizaplan;
    }

    /**
     * Set realizaacta
     *
     * @param boolean $realizaacta
     */
    public function setRealizaacta($realizaacta)
    {
        $this->realizaacta = $realizaacta;
    }

    /**
     * Get realizaacta
     *
     * @return boolean $realizaacta
     */
    public function getRealizaacta()
    {
        return $this->realizaacta;
    }

    /**
     * Set realizaordencompra
     *
     * @param boolean $realizaordencompra
     */
    public function setRealizaordencompra($realizaordencompra)
    {
        $this->realizaordencompra = $realizaordencompra;
    }

    /**
     * Get realizaordencompra
     *
     * @return boolean $realizaordencompra
     */
    public function getRealizaordencompra()
    {
        return $this->realizaordencompra;
    }

    /**
     * Set idUnidadSuperior
     *
     * @param integer $idUnidadSuperior
     */
    public function setIdUnidadSuperior($idUnidadSuperior)
    {
        $this->idUnidadSuperior = $idUnidadSuperior;
    }

    /**
     * Get idUnidadSuperior
     *
     * @return integer $idUnidadSuperior
     */
    public function getIdUnidadSuperior()
    {
        return $this->idUnidadSuperior;
    }

    /**
     * Set idNivel
     *
     * @param Salud\ComprasBundle\Entity\Nivel $idNivel
     */
    public function setIdNivel(\Salud\ComprasBundle\Entity\Nivel $idNivel)
    {
        $this->idNivel = $idNivel;
    }

    /**
     * Get idNivel
     *
     * @return Salud\ComprasBundle\Entity\Nivel $idNivel
     */
    public function getIdNivel()
    {
        return $this->idNivel;
    }
    
    public function __toString() {
        return $this->nombreunidad;
    }
}