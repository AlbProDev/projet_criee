<?php

namespace App\Entity;

use App\Repository\AcheteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcheteurRepository::class)]
class Acheteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $loginA = null;

    #[ORM\Column(length: 32)]
    private ?string $pwdA = null;

    #[ORM\Column(length: 50)]
    private ?string $raisonSocialeEntreprise = null;

    #[ORM\Column(length: 10)]
    private ?string $locRue = null;

    #[ORM\Column(length: 80)]
    private ?string $rue = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\Column(length: 5)]
    private ?string $cp = null;

    #[ORM\Column(length: 50)]
    private ?string $numHabilitation = null;

    /**
     * @var Collection<int, Panier>
     */
    #[ORM\OneToMany(targetEntity: Panier::class, mappedBy: 'Acheteur', orphanRemoval: true)]
    private Collection $paniers;

    public function __construct()
    {
        $this->paniers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLoginA(): ?string
    {
        return $this->loginA;
    }

    public function setLoginA(string $loginA): static
    {
        $this->loginA = $loginA;

        return $this;
    }

    public function getPwdA(): ?string
    {
        return $this->pwdA;
    }

    public function setPwdA(string $pwdA): static
    {
        $this->pwdA = $pwdA;

        return $this;
    }

    public function getRaisonSocialeEntreprise(): ?string
    {
        return $this->raisonSocialeEntreprise;
    }

    public function setRaisonSocialeEntreprise(string $raisonSocialeEntreprise): static
    {
        $this->raisonSocialeEntreprise = $raisonSocialeEntreprise;

        return $this;
    }

    public function getLocRue(): ?string
    {
        return $this->locRue;
    }

    public function setLocRue(string $locRue): static
    {
        $this->locRue = $locRue;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): static
    {
        $this->rue = $rue;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): static
    {
        $this->cp = $cp;

        return $this;
    }

    public function getNumHabilitation(): ?string
    {
        return $this->numHabilitation;
    }

    public function setNumHabilitation(string $numHabilitation): static
    {
        $this->numHabilitation = $numHabilitation;

        return $this;
    }

    /**
     * @return Collection<int, Panier>
     */
    public function getPaniers(): Collection
    {
        return $this->paniers;
    }

    public function addPanier(Panier $panier): static
    {
        if (!$this->paniers->contains($panier)) {
            $this->paniers->add($panier);
            $panier->setAcheteur($this);
        }

        return $this;
    }

    public function removePanier(Panier $panier): static
    {
        if ($this->paniers->removeElement($panier)) {
            // set the owning side to null (unless already changed)
            if ($panier->getAcheteur() === $this) {
                $panier->setAcheteur(null);
            }
        }

        return $this;
    }
}
