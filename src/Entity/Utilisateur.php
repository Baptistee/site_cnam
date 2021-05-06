<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 * @UniqueEntity(
 * fields = {"login"},
 * message = "le login que vous avez indiqué est déjà utilisé !"
 * )
 */
class Utilisateur implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=64)
     * @Assert\Length(min="8", minMessage = "Votre mot de passe doit faire minimum 8 caractères")
     */
    private $pwd;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $role;

    private $roles = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function getUsername(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPwd(): ?string
    {
        return $this->pwd;
    }

    public function getPassword(): ?string
    {
        return $this->pwd;
    }

    public function setPwd(string $pwd): self
    {
        $this->pwd = $pwd;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function eraseCredentials() {}

    public function getSalt() {}

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';
        $role = $this->role;

        for ($i = 0 ; $i < strlen($role) ; $i++)
        {
            if ($role[$i] == 'a')
            {
                array_push($roles,'ROLE_ADMIN');
            }
            if ($role[$i] == 'b')
            {
                array_push($roles,'ROLE_INTERVENANT');
            }
            if ($role[$i] == 'c')
            {
                array_push($roles,'ROLE_BDE');
            }
            if ($role[$i] == 'd')
            {
                array_push($roles,'ROLE_USER');
            }
        }
        return array_unique($roles);
    }
}
