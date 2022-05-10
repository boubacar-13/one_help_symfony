<?php

namespace App\Entity;

use App\Repository\MaraudeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaraudeRepository::class)]
class Maraude extends Action
{
    #[ORM\Column(type: 'string', length: 255)]
    private $adresseMaraude;

    #[ORM\Column(type: 'string', length: 128)]
    private $codePostalMaraude;

    #[ORM\Column(type: 'string', length: 255)]
    private $dateMaraude;

    #[ORM\Column(type: 'string', length: 255)]
    private $heureMaraude;

    #[ORM\Column(type: 'string', length: 255)]
    private $villeMaraude;

    public function getAdresseMaraude(): ?string
    {
        return $this->adresseMaraude;
    }

    public function setAdresseMaraude(string $adresseMaraude): self
    {
        $this->adresseMaraude = $adresseMaraude;

        return $this;
    }

    public function getCodePostalMaraude(): ?string
    {
        return $this->codePostalMaraude;
    }

    public function setCodePostalMaraude(string $codePostalMaraude): self
    {
        $this->codePostalMaraude = $codePostalMaraude;

        return $this;
    }

    public function getDateMaraude(): ?string
    {
        return $this->dateMaraude;
    }

    public function setDateMaraude(string $dateMaraude): self
    {
        $this->dateMaraude = $dateMaraude;

        return $this;
    }

    public function getHeureMaraude(): ?string
    {
        return $this->heureMaraude;
    }

    public function setHeureMaraude(string $heureMaraude): self
    {
        $this->heureMaraude = $heureMaraude;

        return $this;
    }

    public function getVilleMaraude(): ?string
    {
        return $this->villeMaraude;
    }

    public function setVilleMaraude(string $villeMaraude): self
    {
        $this->villeMaraude = $villeMaraude;

        return $this;
    }
}
