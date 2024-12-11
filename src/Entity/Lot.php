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

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $prixEnchereMax = null;

    #[ORM\ManyToOne(inversedBy: 'lots')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Taille $Taille = null;

    #[ORM\ManyToOne(inversedBy: 'lots')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Presentation $Presentation = null;

    #[ORM\ManyToOne(inversedBy: 'lots')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Bac $Bac = null;

    #[ORM\ManyToOne(inversedBy: 'lots')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Qualite $Qualite = null;

    #[ORM\ManyToOne(inversedBy: 'lots')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Espece $Espece = null;

    #[ORM\ManyToOne(inversedBy: 'lots')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Acheteur $Acheteur = null;

    #[ORM\ManyToOne(inversedBy: 'lots')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Panier $Panier = null;

    #[ORM\ManyToOne(inversedBy: 'lots')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Peche $Peche = null;

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

    public function getPrixEnchereMax(): ?string
    {
        return $this->prixEnchereMax;
    }

    public function setPrixEnchereMax(?string $prixEnchereMax): static
    {
        $this->prixEnchereMax = $prixEnchereMax;

        return $this;
    }

    public function getTaille(): ?Taille
    {
        return $this->Taille;
    }

    public function setTaille(?Taille $Taille): static
    {
        $this->Taille = $Taille;

        return $this;
    }

    public function getPresentation(): ?Presentation
    {
        return $this->Presentation;
    }

    public function setPresentation(?Presentation $Presentation): static
    {
        $this->Presentation = $Presentation;

        return $this;
    }

    public function getBac(): ?Bac
    {
        return $this->Bac;
    }

    public function setBac(?Bac $Bac): static
    {
        $this->Bac = $Bac;

        return $this;
    }

    public function getQualite(): ?Qualite
    {
        return $this->Qualite;
    }

    public function setQualite(?Qualite $Qualite): static
    {
        $this->Qualite = $Qualite;

        return $this;
    }

    public function getEspece(): ?Espece
    {
        return $this->Espece;
    }

    public function setEspece(?Espece $Espece): static
    {
        $this->Espece = $Espece;

        return $this;
    }

    public function getAcheteur(): ?Acheteur
    {
        return $this->Acheteur;
    }

    public function setAcheteur(?Acheteur $Acheteur): static
    {
        $this->Acheteur = $Acheteur;

        return $this;
    }

    public function getPanier(): ?Panier
    {
        return $this->Panier;
    }

    public function setPanier(?Panier $Panier): static
    {
        $this->Panier = $Panier;

        return $this;
    }

    public function getPeche(): ?Peche
    {
        return $this->Peche;
    }

    public function setPeche(?Peche $Peche): static
    {
        $this->Peche = $Peche;

        return $this;
    }
}
