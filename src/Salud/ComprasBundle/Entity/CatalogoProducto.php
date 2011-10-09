<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\CatalogoProducto
 *
 * @ORM\Table(name="catalogo_producto")
 * @ORM\Entity
 */
class CatalogoProducto
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="catalogo_producto_id_seq", allocationSize="1", initialValue="1")
     */
    private $id;

    /**
     * @var string $codigocatalogo
     *
     * @ORM\Column(name="codigocatalogo", type="string", length=2, nullable=false)
     */
    private $codigocatalogo;

    /**
     * @var string $descripcioncatalogo
     *
     * @ORM\Column(name="descripcioncatalogo", type="string", length=60, nullable=false)
     */
    private $descripcioncatalogo;



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
     * Set codigocatalogo
     *
     * @param string $codigocatalogo
     */
    public function setCodigocatalogo($codigocatalogo)
    {
        $this->codigocatalogo = $codigocatalogo;
    }

    /**
     * Get codigocatalogo
     *
     * @return string 
     */
    public function getCodigocatalogo()
    {
        return $this->codigocatalogo;
    }

    /**
     * Set descripcioncatalogo
     *
     * @param string $descripcioncatalogo
     */
    public function setDescripcioncatalogo($descripcioncatalogo)
    {
        $this->descripcioncatalogo = $descripcioncatalogo;
    }

    /**
     * Get descripcioncatalogo
     *
     * @return string 
     */
    public function getDescripcioncatalogo()
    {
        return $this->descripcioncatalogo;
    }
}