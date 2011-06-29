<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="usuario_id_seq", allocationSize="1", initialValue="1")
     */
    private $id;

    /**
     * @var string $codigousuario
     *
     * @ORM\Column(name="codigousuario", type="string", length=25, nullable=false)
     */
    private $codigousuario;

    /**
     * @var string $nombreusuario
     *
     * @ORM\Column(name="nombreusuario", type="string", length=50, nullable=false)
     */
    private $nombreusuario;

    /**
     * @var string $claveusuario
     *
     * @ORM\Column(name="claveusuario", type="string", length=150, nullable=false)
     */
    private $claveusuario;

    /**
     * @var boolean $estaactivo
     *
     * @ORM\Column(name="estaactivo", type="boolean", nullable=false)
     */
    private $estaactivo;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=150, nullable=true)
     */
    private $email;

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
     * Set codigousuario
     *
     * @param string $codigousuario
     */
    public function setCodigousuario($codigousuario)
    {
        $this->codigousuario = $codigousuario;
    }

    /**
     * Get codigousuario
     *
     * @return string $codigousuario
     */
    public function getCodigousuario()
    {
        return $this->codigousuario;
    }

    /**
     * Set nombreusuario
     *
     * @param string $nombreusuario
     */
    public function setNombreusuario($nombreusuario)
    {
        $this->nombreusuario = $nombreusuario;
    }

    /**
     * Get nombreusuario
     *
     * @return string $nombreusuario
     */
    public function getNombreusuario()
    {
        return $this->nombreusuario;
    }

    /**
     * Set claveusuario
     *
     * @param string $claveusuario
     */
    public function setClaveusuario($claveusuario)
    {
        $this->claveusuario = $claveusuario;
    }

    /**
     * Get claveusuario
     *
     * @return string $claveusuario
     */
    public function getClaveusuario()
    {
        return $this->claveusuario;
    }

    /**
     * Set estaactivo
     *
     * @param boolean $estaactivo
     */
    public function setEstaactivo($estaactivo)
    {
        $this->estaactivo = $estaactivo;
    }

    /**
     * Get estaactivo
     *
     * @return boolean $estaactivo
     */
    public function getEstaactivo()
    {
        return $this->estaactivo;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
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