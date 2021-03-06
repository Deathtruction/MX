<?php

namespace OCUserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Competition
 *
 * @ORM\Table(name="competition")
 * @ORM\Entity(repositoryClass="OCUserBundle\Repository\CompetitionRepository")
 */
class Competition
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
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="departement", type="integer")
     */
    private $departement;

    /**
     * @var string
     *
     * @ORM\Column(name="club", type="string", length=255)
     */
    private $club;

    /**
     * @var string
     *
     * @ORM\Column(name="correspondants", type="text")
     */
    private $correspondants;

    /**
     * @var string
     *
     * @ORM\Column(name="cylindreAccepter", type="string", length=255)
     */
    private $cylindreAccepter;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="dateLimiteInscription", type="date")
     */
    private $dateLimiteInscription;

    /**
     * @var string
     *
     * @ORM\Column(name="inscriptionOuverte", type="string")
     */
    private $inscriptionOuverte;

    /**
     * @var string
     *
     * @ORM\Column(name="nbParticipants", type="integer")
     */
    private $nbParticipants;

    /**
     * @ORM\OneToMany(targetEntity="OCUserBundle\Entity\User", mappedBy="competition")
     */
    private $users;

    public function _construct()
    {
        $this->users = new ArrayCollection();
    }

    /**
     * @ORM\OneToMany(targetEntity="OCUserBundle\Entity\Inscrit", mappedBy="competition")
     */
    private $inscrits;

    public function _constructs()
    {
        $this->inscrits = new ArrayCollection();
    }

    /**
     * @ORM\OneToMany(targetEntity="OCUserBundle\Entity\Categorie", mappedBy="competition")
     */
    private $categories;

    public function _constructe()
    {
        $this->categories = new ArrayCollection();
    }

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
     * Set date
     *
     * @param string $date
     *
     * @return Competition
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Competition
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set departement
     *
     * @param string $departement
     *
     * @return Competition
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return string
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set club
     *
     * @param string $club
     *
     * @return Competition
     */
    public function setClub($club)
    {
        $this->club = $club;

        return $this;
    }

    /**
     * Get club
     *
     * @return string
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * Set correspondants
     *
     * @param string $correspondants
     *
     * @return Competition
     */
    public function setCorrespondants($correspondants)
    {
        $this->correspondants = $correspondants;

        return $this;
    }

    /**
     * Get correspondants
     *
     * @return string
     */
    public function getCorrespondants()
    {
        return $this->correspondants;
    }

    /**
     * Set cylindreAccepter
     *
     * @param string $cylindreAccepter
     *
     * @return Competition
     */
    public function setCylindreAccepter($cylindreAccepter)
    {
        $this->cylindreAccepter = $cylindreAccepter;

        return $this;
    }

    /**
     * Get cylindreAccepter
     *
     * @return string
     */
    public function getCylindreAccepter()
    {
        return $this->cylindreAccepter;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Competition
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set dateLimiteInscription
     *
     * @param string $dateLimiteInscription
     *
     * @return Competition
     */
    public function setDateLimiteInscription($dateLimiteInscription)
    {
        $this->dateLimiteInscription = $dateLimiteInscription;

        return $this;
    }

    /**
     * Get dateLimiteInscription
     *
     * @return string
     */
    public function getDateLimiteInscription()
    {
        return $this->dateLimiteInscription;
    }

    /**
     * Set inscriptionOuverte
     *
     * @param string $inscriptionOuverte
     *
     * @return Competition
     */
    public function setInscriptionOuverte($inscriptionOuverte)
    {
        $this->inscriptionOuverte = $inscriptionOuverte;

        return $this;
    }

    /**
     * Get inscriptionOuverte
     *
     * @return string
     */
    public function getInscriptionOuverte()
    {
        return $this->inscriptionOuverte;
    }

    /**
     * Set nbParticipants
     *
     * @param string $nbParticipants
     *
     * @return Competition
     */
    public function setNbParticipants($nbParticipants)
    {
        $this->nbParticipants = $nbParticipants;

        return $this;
    }

    /**
     * Get nbParticipants
     *
     * @return string
     */
    public function getNbParticipants()
    {
        return $this->nbParticipants;
    }

    /**
     * @return \OCUserBundle\Entity\User
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param \OCUserBundle\Entity\User $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }

    /**
     * @return \OCUserBundle\Entity\Inscrit
     */
    public function getInscrits()
    {
        return $this->inscrits;
    }

    /**
     * @param \OCUserBundle\Entity\Inscrit $inscrits
     */
    public function setInscrits($inscrits)
    {
        $this->inscrits = $inscrits;
    }

    /**
     * @return \OCUserBundle\Entity\Categorie
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param \OCUserBundle\Entity\Categorie $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

}

