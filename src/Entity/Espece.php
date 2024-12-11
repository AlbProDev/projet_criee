<?php

namespace App\Entity;

use App\Repository\EspeceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EspeceRepository::class)]
class Espece
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nomEspece = null;

    #[ORM\Column(length: 100)]
    private ?string $nomScientifiqueEspece = null;

    #[ORM\Column(length: 50)]
    private ?string $nomCommunEspece = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEspece(): ?string
    {
        return $this->nomEspece;
    }

    public function setNomEspece(string $nomEspece): static
    {
        $this->nomEspece = $nomEspece;

        return $this;
    }

    public function getNomScientifiqueEspece(): ?string
    {
        return $this->nomScientifiqueEspece;
    }

    public function setNomScientifiqueEspece(string $nomScientifiqueEspece): static
    {
        $this->nomScientifiqueEspece = $nomScientifiqueEspece;

        return $this;
    }

    public function getNomCommunEspece(): ?string
    {
        return $this->nomCommunEspece;
    }

    public function setNomCommunEspece(string $nomCommunEspece): static
    {
        $this->nomCommunEspece = $nomCommunEspece;

        return $this;
    }
}
