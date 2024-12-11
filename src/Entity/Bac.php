<?php

namespace App\Entity;

use App\Repository\BacRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BacRepository::class)]
class Bac
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $tare = null;

    #[ORM\Column(length: 10)]
    private ?string $typeBac = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTare(): ?string
    {
        return $this->tare;
    }

    public function setTare(string $tare): static
    {
        $this->tare = $tare;

        return $this;
    }

    public function getTypeBac(): ?string
    {
        return $this->typeBac;
    }

    public function setTypeBac(string $typeBac): static
    {
        $this->typeBac = $typeBac;

        return $this;
    }
}
