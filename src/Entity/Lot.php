<?php

namespace App\Entity;

use App\Repository\LotRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LotRepository::class)]
class Lot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $poidsBrutLot = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prixPlancher = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prixDepart = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoidsBrutLot(): ?string
    {
        return $this->poidsBrutLot;
    }

    public function setPoidsBrutLot(string $poidsBrutLot): static
    {
        $this->poidsBrutLot = $poidsBrutLot;

        return $this;
    }

    public function getPrixPlancher(): ?string
    {
        return $this->prixPlancher;
    }

    public function setPrixPlancher(string $prixPlancher): static
    {
        $this->prixPlancher = $prixPlancher;

        return $this;
    }

    public function getPrixDepart(): ?string
    {
        return $this->prixDepart;
    }

    public function setPrixDepart(string $prixDepart): static
    {
        $this->prixDepart = $prixDepart;

        return $this;
    }
}
