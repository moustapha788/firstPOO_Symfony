<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Attache;
use App\Entity\Etudiant;
use App\Entity\AnneeScolaire;
use App\Entity\Classe;

#[ORM\Entity(repositoryClass: InscriptionRepository::class)]
class Inscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Attache::class, inversedBy: 'inscriptions')]
    #[ORM\JoinColumn(nullable: false)]
    private $attache;

    #[ORM\ManyToOne(targetEntity: Etudiant::class, inversedBy: 'inscriptions')]
    #[ORM\JoinColumn(nullable: false)]
    private $etudiant;

    #[ORM\ManyToOne(targetEntity: AnneeScolaire::class, inversedBy: 'inscriptions')]
    #[ORM\JoinColumn(nullable: false)]
    private $anneeScolaire;

    #[ORM\ManyToOne(targetEntity: Classe::class, inversedBy: 'inscriptions')]
    #[ORM\JoinColumn(nullable: false)]
    private $classe;

    #[ORM\Column(type: 'smallint')]
    private $etat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAttache(): ?Attache
    {
        return $this->attache;
    }

    public function setAttache(?Attache $attache): self
    {
        $this->attache = $attache;

        return $this;
    }

    public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    public function getAnneeScolaire(): ?AnneeScolaire
    {
        return $this->anneeScolaire;
    }

    public function setAnneeScolaire(?AnneeScolaire $anneeScolaire): self
    {
        $this->anneeScolaire = $anneeScolaire;

        return $this;
    }

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getEtat(): ?int
    {
        return $this->etat;
    }

    public function setEtat(int $etat): self
    {
        $this->etat = $etat;

        return $this;
    }
}
