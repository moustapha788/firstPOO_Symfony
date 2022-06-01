<?php

namespace App\Entity;

use App\Repository\ProfesseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Personne;
use App\Entity\Classe;
use App\Entity\Module;
use App\Entity\Responsable;

#[ORM\Entity(repositoryClass: ProfesseurRepository::class)]
class Professeur  extends Personne
{
    
   

    #[ORM\Column(type: 'string', length: 100)]
    private $grade;

    #[ORM\ManyToOne(targetEntity: Responsable::class, inversedBy: 'professeurs')]
    #[ORM\JoinColumn(nullable: false)]
    private $responsable;

    #[ORM\ManyToMany(targetEntity: Classe::class, inversedBy: 'professeurs')]
    private $classes;

    #[ORM\ManyToMany(targetEntity: Module::class, inversedBy: 'professeurs')]
    private $modules;

    public function __construct()
    {
        $this->classes = new ArrayCollection();
        $this->modules = new ArrayCollection();
    }

   

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getResponsable(): ?Responsable
    {
        return $this->responsable;
    }

    public function setResponsable(?Responsable $responsable): self
    {
        $this->responsable = $responsable;

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
        }

        return $this;
    }

    public function removeClass(Classe $class): self
    {
        $this->classes->removeElement($class);

        return $this;
    }

    /**
     * @return Collection<int, Module>
     */
    public function getModules(): Collection
    {
        return $this->modules;
    }

    public function addModule(Module $module): self
    {
        if (!$this->modules->contains($module)) {
            $this->modules[] = $module;
        }

        return $this;
    }

    public function removeModule(Module $module): self
    {
        $this->modules->removeElement($module);

        return $this;
    }
}
