<?php

namespace App\Entity;

use App\Repository\BacRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BacRepository::class)]
class Bac
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "idBac", type: "integer")]
    private ?int $idBac = null;

    #[ORM\Column(length: 50)]
    private ?string $tare = null;

    #[ORM\Column(length: 10)]
    private ?string $typeBac = null;

    /**
     * @var Collection<int, Lot>
     */
    #[ORM\OneToMany(targetEntity: Lot::class, mappedBy: 'Bac', orphanRemoval: true)]
    private Collection $lots;

    public function __construct()
    {
        $this->lots = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->idBac;
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
            $lot->setBac($this);
        }

        return $this;
    }

    public function removeLot(Lot $lot): static
    {
        if ($this->lots->removeElement($lot)) {
            // set the owning side to null (unless already changed)
            if ($lot->getBac() === $this) {
                $lot->setBac(null);
            }
        }

        return $this;
    }
}
