<?php

namespace OCUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscrit
 *
 * @ORM\Table(name="inscrit")
 * @ORM\Entity(repositoryClass="OCUserBundle\Repository\InscritRepository")
 */
class Inscrit
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
     * @ORM\ManyToOne(targetEntity="OCUserBundle\Entity\User", fetch="EAGER")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="OCUserBundle\Entity\Competition", fetch="EAGER")
     */
    private $competition;

    /**
     * @ORM\ManyToOne(targetEntity="OCUserBundle\Entity\Moto", fetch="EAGER")
     */
    private $moto;

    /**
     * @ORM\ManyToOne(targetEntity="OCUserBundle\Entity\Categorie", fetch="EAGER")
     */
    private $categorie;

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

    /**
     * @return \OCUserBundle\Entity\Competition
     */
    public function getCompetition()
    {
        return $this->competition;
    }

    /**
     * @param \OCUserBundle\Entity\Competition $competition
     */
    public function setCompetition($competition)
    {
        $this->competition = $competition;
    }

    /**
     * @return \OCUserBundle\Entity\Moto
     */
    public function getMoto()
    {
        return $this->moto;
    }

    /**
     * @param \OCUserBundle\Entity\Moto $moto
     */
    public function setMoto($moto)
    {
        $this->moto = $moto;
    }

    /**
     * @return \OCUserBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param \OCUserBundle\Entity\Categorie $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }
}

