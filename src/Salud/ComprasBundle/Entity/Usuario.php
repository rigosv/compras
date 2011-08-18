<?php

namespace Salud\ComprasBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario extends BaseUser
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="usuario_id_seq", allocationSize="1", initialValue="1")
     */
    protected $id;

       
    /**
     * @var PerfilUsuario
     *
     * @ORM\ManyToOne(targetEntity="PerfilUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_perfil_usuario", referencedColumnName="id")
     * })
     */
    private $idPerfilUsuario;

    /**
     * @var UnidadSolicitante
     *
     * @ORM\ManyToOne(targetEntity="UnidadSolicitante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_unidad_solicitante", referencedColumnName="id")
     * })
     */
    private $idUnidadSolicitante;



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
     * @return Salud\ComprasBundle\Entity\PerfilUsuario $idPerfilUsuario
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
     * @return Salud\ComprasBundle\Entity\UnidadSolicitante $idUnidadSolicitante
     */
    public function getIdUnidadSolicitante()
    {
        return $this->idUnidadSolicitante;
    }
}