<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\OrigenFinanciamiento
 *
 * @ORM\Table(name="origen_financiamiento")
 * @ORM\Entity
 */
class OrigenFinanciamiento
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="origen_financiamiento_id_seq", allocationSize="1", initialValue="1")
     */
    private $id;

    /**
     * @var string $codigoorigen
     *
     * @ORM\Column(name="codigoorigen", type="string", length=2, nullable=false)
     */
    private $codigoorigen;

    /**
     * @var string $descripcionorigen
     *
     * @ORM\Column(name="descripcionorigen", type="string", length=15, nullable=false)
     */
    private $descripcionorigen;



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
     * Set codigoorigen
     *
     * @param string $codigoorigen
     */
    public function setCodigoorigen($codigoorigen)
    {
        $this->codigoorigen = $codigoorigen;
    }

    /**
     * Get codigoorigen
     *
     * @return string 
     */
    public function getCodigoorigen()
    {
        return $this->codigoorigen;
    }

    /**
     * Set descripcionorigen
     *
     * @param string $descripcionorigen
     */
    public function setDescripcionorigen($descripcionorigen)
    {
        $this->descripcionorigen = $descripcionorigen;
    }

    /**
     * Get descripcionorigen
     *
     * @return string 
     */
    public function getDescripcionorigen()
    {
        return $this->descripcionorigen;
    }
}