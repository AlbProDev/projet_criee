<?php

namespace App\Entity;

use App\Repository\PecheRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PecheRepository::class)]
class Peche
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $datePeche = null;

    #[ORM\ManyToOne(inversedBy: 'peches')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Bateau $Bateau = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePeche(): ?\DateTimeImmutable
    {
        return $this->datePeche;
    }

    public function setDatePeche(\DateTimeImmutable $datePeche): static
    {
        $this->datePeche = $datePeche;

        return $this;
    }

    public function getBateau(): ?Bateau
    {
        return $this->Bateau;
    }

    public function setBateau(?Bateau $Bateau): static
    {
        $this->Bateau = $Bateau;

        return $this;
    }
}
