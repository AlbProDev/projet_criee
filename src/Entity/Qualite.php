<?php

namespace App\Entity;

use App\Repository\QualiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QualiteRepository::class)]
class Qualite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "idQualite", type: "integer")]
    private ?int $idQualite = null;

    #[ORM\Column(length: 20)]
    private ?string $specificationQualite = null;

    /**
     * @var Collection<int, Lot>
     */
    #[ORM\OneToMany(targetEntity: Lot::class, mappedBy: 'Qualite', orphanRemoval: true)]
    private Collection $lots;

    public function __construct()
    {
        $this->lots = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->idQualite;
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
            $lot->setQualite($this);
        }

        return $this;
    }

    public function removeLot(Lot $lot): static
    {
        if ($this->lots->removeElement($lot)) {
            // set the owning side to null (unless already changed)
            if ($lot->getQualite() === $this) {
                $lot->setQualite(null);
            }
        }

        return $this;
    }
}
