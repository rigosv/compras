<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\Rubro
 *
 * @ORM\Table(name="rubro")
 * @ORM\Entity
 */
class Rubro
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="rubro_id_seq", allocationSize="1", initialValue="1")
     */
    private $id;

    /**
     * @var string $codigorubro
     *
     * @ORM\Column(name="codigorubro", type="string", length=2, nullable=false)
     */
    private $codigorubro;

    /**
     * @var string $descripcionrubro
     *
     * @ORM\Column(name="descripcionrubro", type="string", length=25, nullable=false)
     */
    private $descripcionrubro;



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
}