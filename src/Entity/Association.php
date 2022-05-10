<?php

namespace App\Entity;

use App\Repository\AssociationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

#[ORM\Entity(repositoryClass: AssociationRepository::class)]
class Association extends Personne
{

    #[ORM\Column(type: 'string', length: 255)]
    private $nomasso;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomprenomreplegal;

    #[ORM\Column(type: 'string', length: 255)]
    private $adresse;

    // #[ORM\ManyToMany(targetEntity: Benevole::class, mappedBy: 'associations')]
    // private $benevoles;

    // #[ORM\OneToMany(mappedBy: 'association', targetEntity: Don::class)]
    // private $dons;

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->benevoles = new ArrayCollection();
    //     $this->dons = new ArrayCollection();
    // }

    public function getNomasso(): ?string
    {
        return $this->nomasso;
    }

    public function setNomasso(string $nomasso): self
    {
        $this->nomasso = $nomasso;

        return $this;
    }

    public function getNomprenomreplegal(): ?string
    {
        return $this->nomprenomreplegal;
    }

    public function setNomprenomreplegal(string $nomprenomreplegal): self
    {
        $this->nomprenomreplegal = $nomprenomreplegal;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

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
            $benevole->addAssociation($this);
        }

        return $this;
    }

    public function removeBenevole(Benevole $benevole): self
    {
        if ($this->benevoles->removeElement($benevole)) {
            $benevole->removeAssociation($this);
        }

        return $this;
    }

    // /**
    //  * @return Collection<int, Don>
    //  */
    // public function getDons(): Collection
    // {
    //     return $this->dons;
    // }

    // public function addDon(Don $don): self
    // {
    //     if (!$this->dons->contains($don)) {
    //         $this->dons[] = $don;
    //         $don->setAssociation($this);
    //     }

    //     return $this;
    // }

    // public function removeDon(Don $don): self
    // {
    //     if ($this->dons->removeElement($don)) {
    //         // set the owning side to null (unless already changed)
    //         if ($don->getAssociation() === $this) {
    //             $don->setAssociation(null);
    //         }
    //     }

    //     return $this;
    // }
}
