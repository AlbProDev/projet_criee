<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="poster")
 */
class Poster
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="App\Entity\Acheteur")
     * @ORM\JoinColumn(name="idAcheteur", referencedColumnName="idAcheteur", nullable=false)
     */
    private $acheteur;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="App\Entity\Lot")
     * @ORM\JoinColumn(name="idLot", referencedColumnName="idLot", nullable=false)
     */
    private $lot;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $prixEnchere;

    /**
     * @ORM\Column(type="time")
     */
    private $heureEnchere;

    // Getters et setters

    public function getAcheteur(): ?Acheteur
    {
        return $this->acheteur;
    }

    public function setAcheteur(?Acheteur $acheteur): self
    {
        $this->acheteur = $acheteur;

        return $this;
    }

    public function getLot(): ?Lot
    {
        return $this->lot;
    }

    public function setLot(?Lot $lot): self
    {
        $this->lot = $lot;

        return $this;
    }

    public function getPrixEnchere(): ?string
    {
        return $this->prixEnchere;
    }

    public function setPrixEnchere(string $prixEnchere): self
    {
        $this->prixEnchere = $prixEnchere;

        return $this;
    }

    public function getHeureEnchere(): ?\DateTimeInterface
    {
        return $this->heureEnchere;
    }

    public function setHeureEnchere(\DateTimeInterface $heureEnchere): self
    {
        $this->heureEnchere = $heureEnchere;

        return $this;
    }
}
