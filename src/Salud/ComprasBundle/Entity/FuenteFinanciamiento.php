<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\FuenteFinanciamiento
 *
 * @ORM\Table(name="fuente_financiamiento")
 * @ORM\Entity
 */
class FuenteFinanciamiento
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="fuente_financiamiento_id_seq", allocationSize="1", initialValue="1")
     */
    private $id;

    /**
     * @var string $codigofuente
     *
     * @ORM\Column(name="codigofuente", type="string", length=3, nullable=false)
     */
    private $codigofuente;

    /**
     * @var string $descripcionfuente
     *
     * @ORM\Column(name="descripcionfuente", type="string", length=100, nullable=false)
     */
    private $descripcionfuente;

    /**
     * @var integer $idOrigenFinanciamiento
     *
     * @ORM\Column(name="id_origen_financiamiento", type="integer", nullable=true)
     */
    private $idOrigenFinanciamiento;



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
     * Set codigofuente
     *
     * @param string $codigofuente
     */
    public function setCodigofuente($codigofuente)
    {
        $this->codigofuente = $codigofuente;
    }

    /**
     * Get codigofuente
     *
     * @return string 
     */
    public function getCodigofuente()
    {
        return $this->codigofuente;
    }

    /**
     * Set descripcionfuente
     *
     * @param string $descripcionfuente
     */
    public function setDescripcionfuente($descripcionfuente)
    {
        $this->descripcionfuente = $descripcionfuente;
    }

    /**
     * Get descripcionfuente
     *
     * @return string 
     */
    public function getDescripcionfuente()
    {
        return $this->descripcionfuente;
    }

    /**
     * Set idOrigenFinanciamiento
     *
     * @param integer $idOrigenFinanciamiento
     */
    public function setIdOrigenFinanciamiento($idOrigenFinanciamiento)
    {
        $this->idOrigenFinanciamiento = $idOrigenFinanciamiento;
    }

    /**
     * Get idOrigenFinanciamiento
     *
     * @return integer 
     */
    public function getIdOrigenFinanciamiento()
    {
        return $this->idOrigenFinanciamiento;
    }
}