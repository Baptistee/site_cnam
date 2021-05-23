<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Id;
use Symfony\Component\Security\Core\User\User;

/**
 * @ORM\Entity(repositoryClass=CvRepository::class)
 */
class Cv
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateur::class, mappedBy="cv")
     * @ORM\JoinColumn(name="utilisateur", nullable=false)
     */
    private $utilisateur;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_anniversaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lien_site;

    /**
     * @ORM\Column(type="string", length=1028)
     */
    private $bio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getDateAnniversaire(): ?\DateTimeInterface
    {
        return $this->date_anniversaire;
    }

    public function setDateAnniversaire(?\DateTimeInterface $date_anniversaire): self
    {
        $this->date_anniversaire = $date_anniversaire;

        return $this;
    }

    public function getLienSite(): ?string
    {
        return $this->lien_site;
    }

    public function setLienSite(?string $lien_site): self
    {
        $this->lien_site = $lien_site;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    public function __toString()
    {
        $format = "Cv (id: %s, utilisateur.nom: %s, email: %s, bio: %s)";
        return sprintf($format,
            $this->id,
            $this->utilisateur->getNom(),
            $this->email,
            $this->bio
        );
    }
}
