<?php

namespace OCUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Moto
 *
 * @ORM\Table(name="moto")
 * @ORM\Entity(repositoryClass="OCUserBundle\Repository\MotoRepository")
 */
class Moto
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="numCadre", type="string", length=255, unique=true)
     */
    private $numCadre;

    /**
     * @var string
     *
     * @ORM\Column(name="numMoteur", type="string", length=255, unique=true)
     */
    private $numMoteur;

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=255)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="cylindre", type="string", length=255)
     */
    private $cylindre;

    /**
     * @ORM\ManyToOne(targetEntity="OCUserBundle\Entity\User", fetch="EAGER")
     */
    private $user;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numCadre
     *
     * @param string $numCadre
     *
     * @return Moto
     */
    public function setNumCadre($numCadre)
    {
        $this->numCadre = $numCadre;

        return $this;
    }

    /**
     * Get numCadre
     *
     * @return string
     */
    public function getNumCadre()
    {
        return $this->numCadre;
    }

    /**
     * Set numMoteur
     *
     * @param string $numMoteur
     *
     * @return Moto
     */
    public function setNumMoteur($numMoteur)
    {
        $this->numMoteur = $numMoteur;

        return $this;
    }

    /**
     * Get numMoteur
     *
     * @return string
     */
    public function getNumMoteur()
    {
        return $this->numMoteur;
    }

    /**
     * Set marque
     *
     * @param string $marque
     *
     * @return Moto
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set cylindre
     *
     * @param string $cylindre
     *
     * @return Moto
     */
    public function setCylindre($cylindre)
    {
        $this->cylindre = $cylindre;

        return $this;
    }

    /**
     * Get cylindre
     *
     * @return string
     */
    public function getCylindre()
    {
        return $this->cylindre;
    }

    /**
     * @return \OCUserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \OCUserBundle\Entity\User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}

