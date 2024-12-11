<?php

namespace App\Entity;

use App\Repository\QualiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QualiteRepository::class)]
class Qualite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $specificationQualite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpecificationQualite(): ?string
    {
        return $this->specificationQualite;
    }

    public function setSpecificationQualite(string $specificationQualite): static
    {
        $this->specificationQualite = $specificationQualite;

        return $this;
    }
}
