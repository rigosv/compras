<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\PerfilUsuario
 */
class PerfilUsuario
{
    /**
     * @var string $codigoperfil
     */
    private $codigoperfil;

    /**
     * @var string $descripcionperfil
     */
    private $descripcionperfil;

    /**
     * @var integer $id
     */
    private $id;


    /**
     * Set codigoperfil
     *
     * @param string $codigoperfil
     */
    public function setCodigoperfil($codigoperfil)
    {
        $this->codigoperfil = $codigoperfil;
    }

    /**
     * Get codigoperfil
     *
     * @return string 
     */
    public function getCodigoperfil()
    {
        return $this->codigoperfil;
    }

    /**
     * Set descripcionperfil
     *
     * @param string $descripcionperfil
     */
    public function setDescripcionperfil($descripcionperfil)
    {
        $this->descripcionperfil = $descripcionperfil;
    }

    /**
     * Get descripcionperfil
     *
     * @return string 
     */
    public function getDescripcionperfil()
    {
        return $this->descripcionperfil;
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