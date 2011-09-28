<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\PerfilUsuario
 *
 * @ORM\Table(name="perfil_usuario")
 * @ORM\Entity
 */
class PerfilUsuario
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="perfil_usuario_id_seq", allocationSize="1", initialValue="1")
     */
    private $id;

    /**
     * @var string $codigoperfil
     *
     * @ORM\Column(name="codigoperfil", type="string", length=2, nullable=false)
     */
    private $codigoperfil;

    /**
     * @var string $descripcionperfil
     *
     * @ORM\Column(name="descripcionperfil", type="string", length=50, nullable=false)
     */
    private $descripcionperfil;



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
}