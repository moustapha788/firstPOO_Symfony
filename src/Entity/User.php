<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Personne;

#[ORM\Entity(repositoryClass: UserRepository::class)]


#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "role", type: "string")]
#[ORM\DiscriminatorMap(["responsable" => "Responsable", "attache" => "Attache", "etudiant" => "Etudiant"])]

abstract class User extends Personne
{
  

    #[ORM\Column(type: 'string', length: 100)]
    protected $login;

    #[ORM\Column(type: 'string', length: 255)]
    protected $password;

    
    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
