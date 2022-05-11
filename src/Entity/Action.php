<?php

namespace App\Entity;

use App\Entity\Traits\Timestampable;
use App\Repository\ActionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ActionRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "discr", type: "string")]
#[DiscriminatorMap(["maraude" => Maraude::class, "don" => Don::class])]
abstract class Action
{
    use Timestampable;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Personne::class, inversedBy: 'relation')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank(message: "Veuillez remplir ce champs")] // CONTROLE DE SAISIE NOT BLANK
    #[Assert\Length(min: 3)] // CONTROLE DE SAISIE TAILLE
    private $personne;

    #[ORM\ManyToMany(targetEntity: Benevole::class, mappedBy: 'actions')]
    private $benevoles;

    public function __construct()
    {
        $this->benevoles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }




    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(?Personne $personne): self
    {
        $this->personne = $personne;

        return $this;
    }

    /**
     * @return Collection<int, Benevole>
     */
    public function getBenevoles(): Collection
    {
        return $this->benevoles;
    }

    public function addBenevole(Benevole $benevole): self
    {
        if (!$this->benevoles->contains($benevole)) {
            $this->benevoles[] = $benevole;
            $benevole->addAction($this);
        }

        return $this;
    }

    public function removeBenevole(Benevole $benevole): self
    {
        if ($this->benevoles->removeElement($benevole)) {
            $benevole->removeAction($this);
        }

        return $this;
    }
}
