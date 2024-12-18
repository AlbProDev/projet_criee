<?php

namespace App\Entity;

use App\Repository\EspeceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EspeceRepository::class)]
class Espece
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "idEspece", type: "integer")]
    private ?int $idEspece = null;

    #[ORM\Column(length: 50)]
    private ?string $nomEspece = null;

    #[ORM\Column(length: 80)]
    private ?string $nomScientifiqueEspece = null;

    #[ORM\Column(length: 50)]
    private ?string $nomCommunEspece = null;

    /**
     * @var Collection<int, Lot>
     */
    #[ORM\OneToMany(targetEntity: Lot::class, mappedBy: 'Espece', orphanRemoval: true)]
    private Collection $lots;

    public function __construct()
    {
        $this->lots = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->idEspece;
    }

    public function getNomEspece(): ?string
    {
        return $this->nomEspece;
    }

    public function setNomEspece(string $nomEspece): static
    {
        $this->nomEspece = $nomEspece;

        return $this;
    }

    public function getNomScientifiqueEspece(): ?string
    {
        return $this->nomScientifiqueEspece;
    }

    public function setNomScientifiqueEspece(string $nomScientifiqueEspece): static
    {
        $this->nomScientifiqueEspece = $nomScientifiqueEspece;

        return $this;
    }

    public function getNomCommunEspece(): ?string
    {
        return $this->nomCommunEspece;
    }

    public function setNomCommunEspece(string $nomCommunEspece): static
    {
        $this->nomCommunEspece = $nomCommunEspece;

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
            $lot->setEspece($this);
        }

        return $this;
    }

    public function removeLot(Lot $lot): static
    {
        if ($this->lots->removeElement($lot)) {
            // set the owning side to null (unless already changed)
            if ($lot->getEspece() === $this) {
                $lot->setEspece(null);
            }
        }

        return $this;
    }
}
