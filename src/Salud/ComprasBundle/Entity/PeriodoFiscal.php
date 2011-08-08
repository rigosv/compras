<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\PeriodoFiscal
 *
 * @ORM\Table(name="periodo_fiscal")
 * @ORM\Entity
 */
class PeriodoFiscal
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="periodo_fiscal_id_seq", allocationSize="1", initialValue="1")
     */
    private $id;

    /**
     * @var smallint $aniofiscal
     *
     * @ORM\Column(name="aniofiscal", type="smallint", nullable=false)
     */
    private $aniofiscal;

    /**
     * @var boolean $estaactivo
     *
     * @ORM\Column(name="estaactivo", type="boolean", nullable=false)
     */
    private $estaactivo;



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
     * Set aniofiscal
     *
     * @param smallint $aniofiscal
     */
    public function setAniofiscal($aniofiscal)
    {
        $this->aniofiscal = $aniofiscal;
    }

    /**
     * Get aniofiscal
     *
     * @return smallint $aniofiscal
     */
    public function getAniofiscal()
    {
        return $this->aniofiscal;
    }

    /**
     * Set estaactivo
     *
     * @param boolean $estaactivo
     */
    public function setEstaactivo($estaactivo)
    {
        $this->estaactivo = $estaactivo;
    }

    /**
     * Get estaactivo
     *
     * @return boolean $estaactivo
     */
    public function getEstaactivo()
    {
        return $this->estaactivo;
    }
    
    public function __toString() {
        return (string)$this->aniofiscal;
    }
}