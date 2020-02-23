<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\RapportRepository")
 */
class Rapport
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $partAgence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mode;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Compte", inversedBy="rapports")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compteTransact;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPartAgence(): ?int
    {
        return $this->partAgence;
    }

    public function setPartAgence(int $partAgence): self
    {
        $this->partAgence = $partAgence;

        return $this;
    }

    public function getMode(): ?string
    {
        return $this->mode;
    }

    public function setMode(string $mode): self
    {
        $this->mode = $mode;

        return $this;
    }

    public function getCompteTransact(): ?Compte
    {
        return $this->compteTransact;
    }

    public function setCompteTransact(?Compte $compteTransact): self
    {
        $this->compteTransact = $compteTransact;

        return $this;
    }
}
