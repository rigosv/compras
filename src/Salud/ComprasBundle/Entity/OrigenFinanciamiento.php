<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\OrigenFinanciamiento
 */
class OrigenFinanciamiento
{
    /**
     * @var string $codigoorigen
     */
    private $codigoorigen;

    /**
     * @var string $descripcionorigen
     */
    private $descripcionorigen;

    /**
     * @var integer $id
     */
    private $id;


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

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}