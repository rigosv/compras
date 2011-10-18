<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * Salud\ComprasBundle\Entity\Usuario
 */
class Usuario extends BaseUser
{
       /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var Salud\ComprasBundle\Entity\PerfilUsuario
     */
    private $idPerfilUsuario;

    /**
     * @var Salud\ComprasBundle\Entity\UnidadSolicitante
     */
    private $idUnidadSolicitante;

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
     * Set idPerfilUsuario
     *
     * @param Salud\ComprasBundle\Entity\PerfilUsuario $idPerfilUsuario
     */
    public function setIdPerfilUsuario(\Salud\ComprasBundle\Entity\PerfilUsuario $idPerfilUsuario)
    {
        $this->idPerfilUsuario = $idPerfilUsuario;
    }

    /**
     * Get idPerfilUsuario
     *
     * @return Salud\ComprasBundle\Entity\PerfilUsuario 
     */
    public function getIdPerfilUsuario()
    {
        return $this->idPerfilUsuario;
    }

    /**
     * Set idUnidadSolicitante
     *
     * @param Salud\ComprasBundle\Entity\UnidadSolicitante $idUnidadSolicitante
     */
    public function setIdUnidadSolicitante(\Salud\ComprasBundle\Entity\UnidadSolicitante $idUnidadSolicitante)
    {
        $this->idUnidadSolicitante = $idUnidadSolicitante;
    }

    /**
     * Get idUnidadSolicitante
     *
     * @return Salud\ComprasBundle\Entity\UnidadSolicitante 
     */
    public function getIdUnidadSolicitante()
    {
        return $this->idUnidadSolicitante;
    }
}