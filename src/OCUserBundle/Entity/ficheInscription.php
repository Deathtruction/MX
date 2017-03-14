<?php

namespace OCUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ficheInscription
 *
 * @ORM\Table(name="fiche_inscription")
 * @ORM\Entity(repositoryClass="OCUserBundle\Repository\ficheInscriptionRepository")
 */
class ficheInscription
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var int
     *
     * @ORM\Column(name="dateNaissance", type="integer")
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="cp", type="integer")
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone", type="integer")
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=255)
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="text")
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=255)
     */
    private $mdp;

    /**
     * @var string
     *
     * @ORM\Column(name="confirmerMdp", type="string", length=255)
     */
    private $confirmerMdp;

    /**
     * @var string
     *
     * @ORM\Column(name="club", type="string", length=255)
     */
    private $club;

    /**
     * @var int
     *
     * @ORM\Column(name="licenceUfolep", type="integer")
     */
    private $licenceUfolep;

    /**
     * @var string
     *
     * @ORM\Column(name="casm", type="string", length=255)
     */
    private $casm;

    /**
     * @var string
     *
     * @ORM\Column(name="permisMoto", type="string", length=255)
     */
    private $permisMoto;

    /**
     * @var int
     *
     * @ORM\Column(name="numDossard", type="integer")
     */
    private $numDossard;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return ficheInscription
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return ficheInscription
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param integer $dateNaissance
     *
     * @return ficheInscription
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return int
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return ficheInscription
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     *
     * @return ficheInscription
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return int
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return ficheInscription
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return ficheInscription
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return int
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set pseudo
     *
     * @param string $pseudo
     *
     * @return ficheInscription
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return ficheInscription
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set mdp
     *
     * @param string $mdp
     *
     * @return ficheInscription
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get mdp
     *
     * @return string
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set confirmerMdp
     *
     * @param string $confirmerMdp
     *
     * @return ficheInscription
     */
    public function setConfirmerMdp($confirmerMdp)
    {
        $this->confirmerMdp = $confirmerMdp;

        return $this;
    }

    /**
     * Get confirmerMdp
     *
     * @return string
     */
    public function getConfirmerMdp()
    {
        return $this->confirmerMdp;
    }

    /**
     * Set club
     *
     * @param string $club
     *
     * @return ficheInscription
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
     * Set licenceUfolep
     *
     * @param integer $licenceUfolep
     *
     * @return ficheInscription
     */
    public function setLicenceUfolep($licenceUfolep)
    {
        $this->licenceUfolep = $licenceUfolep;

        return $this;
    }

    /**
     * Get licenceUfolep
     *
     * @return int
     */
    public function getLicenceUfolep()
    {
        return $this->licenceUfolep;
    }

    /**
     * Set casm
     *
     * @param string $casm
     *
     * @return ficheInscription
     */
    public function setCasm($casm)
    {
        $this->casm = $casm;

        return $this;
    }

    /**
     * Get casm
     *
     * @return string
     */
    public function getCasm()
    {
        return $this->casm;
    }

    /**
     * Set permisMoto
     *
     * @param string $permisMoto
     *
     * @return ficheInscription
     */
    public function setPermisMoto($permisMoto)
    {
        $this->permisMoto = $permisMoto;

        return $this;
    }

    /**
     * Get permisMoto
     *
     * @return string
     */
    public function getPermisMoto()
    {
        return $this->permisMoto;
    }

    /**
     * Set numDossard
     *
     * @param integer $numDossard
     *
     * @return ficheInscription
     */
    public function setNumDossard($numDossard)
    {
        $this->numDossard = $numDossard;

        return $this;
    }

    /**
     * Get numDossard
     *
     * @return int
     */
    public function getNumDossard()
    {
        return $this->numDossard;
    }
}

