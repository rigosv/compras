<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\Especifico
 *
 * @ORM\Table(name="especifico")
 * @ORM\Entity
 */
class Especifico
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="especifico_id_seq", allocationSize="1", initialValue="1")
     */
    private $id;

    /**
     * @var string $codigoespecifico
     *
     * @ORM\Column(name="codigoespecifico", type="string", length=8, nullable=false)
     */
    private $codigoespecifico;

    /**
     * @var string $descripcionespecifico
     *
     * @ORM\Column(name="descripcionespecifico", type="string", length=500, nullable=false)
     */
    private $descripcionespecifico;

    /**
     * @var CatalogoProducto
     *
     * @ORM\ManyToOne(targetEntity="CatalogoProducto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_catalogo_producto", referencedColumnName="id")
     * })
     */
    private $idCatalogoProducto;

    /**
     * @var Rubro
     *
     * @ORM\ManyToOne(targetEntity="Rubro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_rubro", referencedColumnName="id")
     * })
     */
    private $idRubro;



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
     * Set codigoespecifico
     *
     * @param string $codigoespecifico
     */
    public function setCodigoespecifico($codigoespecifico)
    {
        $this->codigoespecifico = $codigoespecifico;
    }

    /**
     * Get codigoespecifico
     *
     * @return string $codigoespecifico
     */
    public function getCodigoespecifico()
    {
        return $this->codigoespecifico;
    }

    /**
     * Set descripcionespecifico
     *
     * @param string $descripcionespecifico
     */
    public function setDescripcionespecifico($descripcionespecifico)
    {
        $this->descripcionespecifico = $descripcionespecifico;
    }

    /**
     * Get descripcionespecifico
     *
     * @return string $descripcionespecifico
     */
    public function getDescripcionespecifico()
    {
        return $this->descripcionespecifico;
    }

    /**
     * Set idCatalogoProducto
     *
     * @param Salud\ComprasBundle\Entity\CatalogoProducto $idCatalogoProducto
     */
    public function setIdCatalogoProducto(\Salud\ComprasBundle\Entity\CatalogoProducto $idCatalogoProducto)
    {
        $this->idCatalogoProducto = $idCatalogoProducto;
    }

    /**
     * Get idCatalogoProducto
     *
     * @return Salud\ComprasBundle\Entity\CatalogoProducto $idCatalogoProducto
     */
    public function getIdCatalogoProducto()
    {
        return $this->idCatalogoProducto;
    }

    /**
     * Set idRubro
     *
     * @param Salud\ComprasBundle\Entity\Rubro $idRubro
     */
    public function setIdRubro(\Salud\ComprasBundle\Entity\Rubro $idRubro)
    {
        $this->idRubro = $idRubro;
    }

    /**
     * Get idRubro
     *
     * @return Salud\ComprasBundle\Entity\Rubro $idRubro
     */
    public function getIdRubro()
    {
        return $this->idRubro;
    }
}