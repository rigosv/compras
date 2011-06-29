<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\UnidadMedida
 *
 * @ORM\Table(name="unidad_medida")
 * @ORM\Entity
 */
class UnidadMedida
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="unidad_medida_id_seq", allocationSize="1", initialValue="1")
     */
    private $id;

    /**
     * @var string $codigounidadmedida
     *
     * @ORM\Column(name="codigounidadmedida", type="string", length=3, nullable=false)
     */
    private $codigounidadmedida;

    /**
     * @var string $descripcionunidadmedida
     *
     * @ORM\Column(name="descripcionunidadmedida", type="string", length=50, nullable=false)
     */
    private $descripcionunidadmedida;



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
     * Set codigounidadmedida
     *
     * @param string $codigounidadmedida
     */
    public function setCodigounidadmedida($codigounidadmedida)
    {
        $this->codigounidadmedida = $codigounidadmedida;
    }

    /**
     * Get codigounidadmedida
     *
     * @return string $codigounidadmedida
     */
    public function getCodigounidadmedida()
    {
        return $this->codigounidadmedida;
    }

    /**
     * Set descripcionunidadmedida
     *
     * @param string $descripcionunidadmedida
     */
    public function setDescripcionunidadmedida($descripcionunidadmedida)
    {
        $this->descripcionunidadmedida = $descripcionunidadmedida;
    }

    /**
     * Get descripcionunidadmedida
     *
     * @return string $descripcionunidadmedida
     */
    public function getDescripcionunidadmedida()
    {
        return $this->descripcionunidadmedida;
    }
}