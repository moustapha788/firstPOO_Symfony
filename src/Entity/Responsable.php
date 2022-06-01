<?php

namespace App\Entity;

use App\Repository\ResponsableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Demande;
use App\Entity\Professeur;
use App\Entity\Classe;
use App\Entity\User;

#[ORM\Entity(repositoryClass: ResponsableRepository::class)]
class Responsable extends User
{
   

    #[ORM\OneToMany(mappedBy: 'responsable', targetEntity: Demande::class)]
    private $demandes;

    #[ORM\OneToMany(mappedBy: 'responsable', targetEntity: Professeur::class)]
    private $professeurs;

    #[ORM\OneToMany(mappedBy: 'responsable', targetEntity: Classe::class)]
    private $classes;

    public function __construct()
    {
        $this->demandes = new ArrayCollection();
        $this->professeurs = new ArrayCollection();
        $this->classes = new ArrayCollection();
    }

   

    /**
     * @return Collection<int, Demande>
     */
    public function getDemandes(): Collection
    {
        return $this->demandes;
    }

    public function addDemande(Demande $demande): self
    {
        if (!$this->demandes->contains($demande)) {
            $this->demandes[] = $demande;
            $demande->setResponsable($this);
        }

        return $this;
    }

    public function removeDemande(Demande $demande): self
    {
        if ($this->demandes->removeElement($demande)) {
            // set the owning side to null (unless already changed)
            if ($demande->getResponsable() === $this) {
                $demande->setResponsable(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Professeur>
     */
    public function getProfesseurs(): Collection
    {
        return $this->professeurs;
    }

    public function addProfesseur(Professeur $professeur): self
    {
        if (!$this->professeurs->contains($professeur)) {
            $this->professeurs[] = $professeur;
            $professeur->setResponsable($this);
        }

        return $this;
    }

    public function removeProfesseur(Professeur $professeur): self
    {
        if ($this->professeurs->removeElement($professeur)) {
            // set the owning side to null (unless already changed)
            if ($professeur->getResponsable() === $this) {
                $professeur->setResponsable(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Classe>
     */
    public function getClasses(): Collection
    {
        return $this->classes;
    }

    public function addClass(Classe $class): self
    {
        if (!$this->classes->contains($class)) {
            $this->classes[] = $class;
            $class->setResponsable($this);
        }

        return $this;
    }

    public function removeClass(Classe $class): self
    {
        if ($this->classes->removeElement($class)) {
            // set the owning side to null (unless already changed)
            if ($class->getResponsable() === $this) {
                $class->setResponsable(null);
            }
        }

        return $this;
    }
}
