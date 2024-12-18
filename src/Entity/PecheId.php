<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class PecheId
{
    #[ORM\Column(name: "idBateau", type: "integer")]
    private ?int $idBateau;

    #[ORM\Column(name: "datePeche", type: "datetime_immutable")]
    private ?\DateTimeImmutable $datePeche;

    public function __construct(int $idBateau, \DateTimeImmutable $datePeche)
    {
        $this->idBateau = $idBateau;
        $this->datePeche = $datePeche;
    }

    public function getIdBateau(): ?int
    {
        return $this->idBateau;
    }

    public function setIdBateau(int $idBateau): void
    {
        $this->idBateau = $idBateau;
    }

    public function getDatePeche(): ?\DateTimeImmutable
    {
        return $this->datePeche;
    }

    public function setDatePeche(\DateTimeImmutable $datePeche): void
    {
        $this->datePeche = $datePeche;
    }
}
