<?php

namespace Salud\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salud\ComprasBundle\Entity\Usuario
 */
class Usuario
{
    /**
     * @var boolean $estaactivo
     */
    private $estaactivo;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var string $username
     */
    private $username;

    /**
     * @var string $usernameCanonical
     */
    private $usernameCanonical;

    /**
     * @var string $emailCanonical
     */
    private $emailCanonical;

    /**
     * @var boolean $enabled
     */
    private $enabled;

    /**
     * @var string $algorithm
     */
    private $algorithm;

    /**
     * @var string $salt
     */
    private $salt;

    /**
     * @var string $password
     */
    private $password;

    /**
     * @var datetime $lastLogin
     */
    private $lastLogin;

    /**
     * @var boolean $locked
     */
    private $locked;

    /**
     * @var boolean $expired
     */
    private $expired;

    /**
     * @var datetime $expiresAt
     */
    private $expiresAt;

    /**
     * @var string $confirmationToken
     */
    private $confirmationToken;

    /**
     * @var datetime $passwordRequestedAt
     */
    private $passwordRequestedAt;

    /**
     * @var array $roles
     */
    private $roles;

    /**
     * @var boolean $credentialsExpired
     */
    private $credentialsExpired;

    /**
     * @var datetime $credentialsExpireAt
     */
    private $credentialsExpireAt;

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var Salud\ComprasBundle\Entity\PerfilUsuario
     */
    private $idPerfilUsuario;

    /**
     * @var Salud\ComprasBundle\Entity\UnidadSolicitante
     */
    private $idUnidadSolicitante;


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
     * @return boolean 
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
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set usernameCanonical
     *
     * @param string $usernameCanonical
     */
    public function setUsernameCanonical($usernameCanonical)
    {
        $this->usernameCanonical = $usernameCanonical;
    }

    /**
     * Get usernameCanonical
     *
     * @return string 
     */
    public function getUsernameCanonical()
    {
        return $this->usernameCanonical;
    }

    /**
     * Set emailCanonical
     *
     * @param string $emailCanonical
     */
    public function setEmailCanonical($emailCanonical)
    {
        $this->emailCanonical = $emailCanonical;
    }

    /**
     * Get emailCanonical
     *
     * @return string 
     */
    public function getEmailCanonical()
    {
        return $this->emailCanonical;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set algorithm
     *
     * @param string $algorithm
     */
    public function setAlgorithm($algorithm)
    {
        $this->algorithm = $algorithm;
    }

    /**
     * Get algorithm
     *
     * @return string 
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set lastLogin
     *
     * @param datetime $lastLogin
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
    }

    /**
     * Get lastLogin
     *
     * @return datetime 
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Set locked
     *
     * @param boolean $locked
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;
    }

    /**
     * Get locked
     *
     * @return boolean 
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * Set expired
     *
     * @param boolean $expired
     */
    public function setExpired($expired)
    {
        $this->expired = $expired;
    }

    /**
     * Get expired
     *
     * @return boolean 
     */
    public function getExpired()
    {
        return $this->expired;
    }

    /**
     * Set expiresAt
     *
     * @param datetime $expiresAt
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;
    }

    /**
     * Get expiresAt
     *
     * @return datetime 
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * Set confirmationToken
     *
     * @param string $confirmationToken
     */
    public function setConfirmationToken($confirmationToken)
    {
        $this->confirmationToken = $confirmationToken;
    }

    /**
     * Get confirmationToken
     *
     * @return string 
     */
    public function getConfirmationToken()
    {
        return $this->confirmationToken;
    }

    /**
     * Set passwordRequestedAt
     *
     * @param datetime $passwordRequestedAt
     */
    public function setPasswordRequestedAt($passwordRequestedAt)
    {
        $this->passwordRequestedAt = $passwordRequestedAt;
    }

    /**
     * Get passwordRequestedAt
     *
     * @return datetime 
     */
    public function getPasswordRequestedAt()
    {
        return $this->passwordRequestedAt;
    }

    /**
     * Set roles
     *
     * @param array $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    /**
     * Get roles
     *
     * @return array 
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set credentialsExpired
     *
     * @param boolean $credentialsExpired
     */
    public function setCredentialsExpired($credentialsExpired)
    {
        $this->credentialsExpired = $credentialsExpired;
    }

    /**
     * Get credentialsExpired
     *
     * @return boolean 
     */
    public function getCredentialsExpired()
    {
        return $this->credentialsExpired;
    }

    /**
     * Set credentialsExpireAt
     *
     * @param datetime $credentialsExpireAt
     */
    public function setCredentialsExpireAt($credentialsExpireAt)
    {
        $this->credentialsExpireAt = $credentialsExpireAt;
    }

    /**
     * Get credentialsExpireAt
     *
     * @return datetime 
     */
    public function getCredentialsExpireAt()
    {
        return $this->credentialsExpireAt;
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