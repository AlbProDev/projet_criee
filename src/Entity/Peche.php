<?php

namespace App\Entity;

use App\Repository\PecheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, Lot>
     */
    #[ORM\OneToMany(targetEntity: Lot::class, mappedBy: 'Peche', orphanRemoval: true)]
    private Collection $lots;

    public function __construct()
    {
        $this->lots = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Lot>
     */
    public function getLots(): Collection
    {
        return $this->lots;
    }

    public function addLot(Lot $lot): static
    {
        if (!$this->lots->contains($lot)) {
            $this->lots->add($lot);
            $lot->setPeche($this);
        }

        return $this;
    }

    public function removeLot(Lot $lot): static
    {
        if ($this->lots->removeElement($lot)) {
            // set the owning side to null (unless already changed)
            if ($lot->getPeche() === $this) {
                $lot->setPeche(null);
            }
        }

        return $this;
    }
}
