<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\Rubro
 */
class Rubro
{
    /**
     * @var string $codigorubro
     */
    private $codigorubro;

    /**
     * @var string $descripcionrubro
     */
    private $descripcionrubro;

    /**
     * @var integer $id
     */
    private $id;


    /**
     * Set codigorubro
     *
     * @param string $codigorubro
     */
    public function setCodigorubro($codigorubro)
    {
        $this->codigorubro = $codigorubro;
    }

    /**
     * Get codigorubro
     *
     * @return string 
     */
    public function getCodigorubro()
    {
        return $this->codigorubro;
    }

    /**
     * Set descripcionrubro
     *
     * @param string $descripcionrubro
     */
    public function setDescripcionrubro($descripcionrubro)
    {
        $this->descripcionrubro = $descripcionrubro;
    }

    /**
     * Get descripcionrubro
     *
     * @return string 
     */
    public function getDescripcionrubro()
    {
        return $this->descripcionrubro;
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