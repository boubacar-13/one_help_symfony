<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonneRepository::class)]
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "type", type: "string")]
#[DiscriminatorMap(["association" => Association::class, "benevole" => Benevole::class])]
class Personne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $codepostal;

    #[ORM\Column(type: 'string', length: 255)]
    private $numerotel;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\Column(type: 'string', length: 255)]
    private $mdp;

    #[ORM\Column(type: 'string', length: 255)]
    private $statut;

    #[ORM\OneToMany(mappedBy: 'personne', targetEntity: Action::class)]
    private $relation;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodepostal(): ?string
    {
        return $this->codepostal;
    }

    public function setCodepostal(string $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getNumerotel(): ?string
    {
        return $this->numerotel;
    }

    public function setNumerotel(string $numerotel): self
    {
        $this->numerotel = $numerotel;

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

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection<int, Action>
     */
    public function getActions(): Collection
    {
        return $this->actions;
    }

    // public function addAction(Action $action): self
    // {
    //     if (!$this->actions->contains($action)) {
    //         $this->actions[] = $action;
    //         $action->setEffectuer($this);
    //     }

    //     return $this;
    // }

    // public function removeAction(Action $action): self
    // {
    //     if ($this->actions->removeElement($action)) {
    //         // set the owning side to null (unless already changed)
    //         if ($action->getEffectuer() === $this) {
    //             $action->setEffectuer(null);
    //         }
    //     }

    //     return $this;
    // }

    /**
     * @return Collection<int, Action>
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(Action $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation[] = $relation;
            $relation->setPersonne($this);
        }

        return $this;
    }

    public function removeRelation(Action $relation): self
    {
        if ($this->relation->removeElement($relation)) {
            // set the owning side to null (unless already changed)
            if ($relation->getPersonne() === $this) {
                $relation->setPersonne(null);
            }
        }

        return $this;
    }
}
