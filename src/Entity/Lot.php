<?php

// src/Entity/Lot.php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\LotRepository;

#[ORM\Entity(repositoryClass: LotRepository::class)]
#[ORM\Table(name: "lot")]
class Lot
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: "integer")]
    private ?int $idLot = null;

    #[ORM\ManyToOne(targetEntity: Peche::class, inversedBy: 'lots')]
    #[ORM\JoinColumn(name: 'id_bateau', referencedColumnName: 'idBateau')]
    #[ORM\JoinColumn(name: 'date_peche', referencedColumnName: 'datePeche')]
    private ?Peche $Peche = null;

    #[ORM\Column(length: 50)]
    private ?string $poidsBrutLot = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prixPlancher = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prixDepart = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prixEnchereMax = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateEnchere = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE)]
    private ?\DateTimeImmutable $heureDebutEnchere = null;

    #[ORM\ManyToOne(targetEntity: Taille::class, inversedBy: 'lots')]
    #[ORM\JoinColumn(name: "idTaille", referencedColumnName: 'idTaille', nullable: false, onDelete: 'CASCADE')]
    private ?Taille $Taille = null;

    #[ORM\ManyToOne(targetEntity: Presentation::class, inversedBy: 'lots')]
    #[ORM\JoinColumn(name: "idPresentation", referencedColumnName: 'idPresentation', nullable: false, onDelete: 'CASCADE')]
    private ?Presentation $Presentation = null;

    #[ORM\ManyToOne(targetEntity: Bac::class, inversedBy: 'lots')]
    #[ORM\JoinColumn(name: "idBac", referencedColumnName: 'idBac', nullable: false, onDelete: 'CASCADE')]
    private ?Bac $Bac = null;

    #[ORM\ManyToOne(targetEntity: Qualite::class, inversedBy: 'lots')]
    #[ORM\JoinColumn(name: "idQualite", referencedColumnName: 'idQualite', nullable: false, onDelete: 'CASCADE')]
    private ?Qualite $Qualite = null;

    #[ORM\ManyToOne(targetEntity: Espece::class, inversedBy: 'lots')]
    #[ORM\JoinColumn(name: "idEspece", referencedColumnName: 'idEspece', nullable: false, onDelete: 'CASCADE')]
    private ?Espece $Espece = null;

    #[ORM\ManyToOne(targetEntity: Acheteur::class, inversedBy: 'lots')]
    #[ORM\JoinColumn(name: "idAcheteur", referencedColumnName: 'idAcheteur', nullable: false, onDelete: 'CASCADE')]
    private ?Acheteur $Acheteur = null;

    #[ORM\ManyToOne(targetEntity: Panier::class, inversedBy: 'lots')]
    #[ORM\JoinColumn(name: "idPanier", referencedColumnName: 'idPanier', nullable: false, onDelete: 'CASCADE')]
    private ?Panier $Panier = null;

    public function getIdLot(): ?int
    {
        return $this->idLot;
    }

    public function setIdLot(int $idLot): static
    {
        $this->idLot = $idLot;
        return $this;
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

    public function setPrixEnchereMax(string $prixEnchereMax): static
    {
        $this->prixEnchereMax = $prixEnchereMax;
        return $this;
    }

    public function getDateEnchere(): ?\DateTimeImmutable
    {
        return $this->dateEnchere;
    }

    public function setDateEnchere(\DateTimeImmutable $dateEnchere): static
    {
        $this->dateEnchere = $dateEnchere;
        return $this;
    }

    public function getHeureDebutEnchere(): ?\DateTimeImmutable
    {
        return $this->heureDebutEnchere;
    }

    public function setHeureDebutEnchere(\DateTimeImmutable $heureDebutEnchere): static
    {
        $this->heureDebutEnchere = $heureDebutEnchere;
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
