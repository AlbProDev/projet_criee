<?php

namespace App\Entity;

use App\Repository\BateauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BateauRepository::class)]
class Bateau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "idBateau", type: "integer")]
    private ?int $idBateau = null;

    #[ORM\Column(length: 50)]
    private ?string $nomBateau = null;

    /**
     * @var Collection<int, Peche>
     */
    #[ORM\OneToMany(targetEntity: Peche::class, mappedBy: 'Bateau', orphanRemoval: true)]
    private Collection $peches;

    /**
     * @var Collection<int, Lot>
     */
    #[ORM\OneToMany(targetEntity: Lot::class, mappedBy: 'Bateau', orphanRemoval: true)]
    private Collection $lots;

    public function __construct()
    {
        $this->peches = new ArrayCollection();
        $this->lots = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->idBateau;
    }

    public function getNomBateau(): ?string
    {
        return $this->nomBateau;
    }

    public function setNomBateau(string $nomBateau): static
    {
        $this->nomBateau = $nomBateau;

        return $this;
    }

    /**
     * @return Collection<int, Peche>
     */
    public function getPeches(): Collection
    {
        return $this->peches;
    }

    public function addPech(Peche $pech): static
    {
        if (!$this->peches->contains($pech)) {
            $this->peches->add($pech);
            $pech->setBateau($this);
        }

        return $this;
    }

    public function removePech(Peche $pech): static
    {
        if ($this->peches->removeElement($pech)) {
            // set the owning side to null (unless already changed)
            if ($pech->getBateau() === $this) {
                $pech->setBateau(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Lot>
     */
    public function getLots(): Collection
    {
        return $this->lots;
    }

    
}
