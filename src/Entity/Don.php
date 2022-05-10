<?php

namespace App\Entity;

use App\Repository\DonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DonRepository::class)]
class Don extends Action
{
    #[ORM\Column(type: 'string', length: 255)]
    private $dateDon;

    #[ORM\Column(type: 'string', length: 255)]
    private $heureDon;

    // #[ORM\ManyToOne(targetEntity: Association::class, inversedBy: 'dons')]
    // private $association;

    public function getDateDon(): ?string
    {
        return $this->dateDon;
    }

    public function setDateDon(string $dateDon): self
    {
        $this->dateDon = $dateDon;

        return $this;
    }

    public function getHeureDon(): ?string
    {
        return $this->heureDon;
    }

    public function setHeureDon(string $heureDon): self
    {
        $this->heureDon = $heureDon;

        return $this;
    }

    // public function getAssociation(): ?Association
    // {
    //     return $this->association;
    // }

    // public function setAssociation(?Association $association): self
    // {
    //     $this->association = $association;

    //     return $this;
    // }
}
