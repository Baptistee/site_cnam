<?php

namespace App\Entity;

use App\Enum\NiveauMaitriseEnum;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompetenceRepository")
 */
class Competence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * @ORM\ManyToOne(targetEntity=Cv::class, inversedBy="competences")
    * @ORM\JoinColumn(name="cv", nullable=false)
    */
    private $cv;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $libelle;

    /**
     * @ORM\Column(type="integer")
     */
    private $niveau_maitrise;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCv(): ?Cv
    {
        return $this->cv;
    }

    public function setCv(Cv $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getNiveauMaitrise(): ?int
    {
        return $this->niveau_maitrise;
    }

    public function getNiveauMaitriseToString(): ?string
    {
        return NiveauMaitriseEnum::getName($this->niveau_maitrise);
    }

    public function setNiveauMaitrise(int $niveau_maitrise): self
    {
        $this->niveau_maitrise = $niveau_maitrise;

        return $this;
    }
}