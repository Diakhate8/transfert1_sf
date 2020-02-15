<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TransactionRepository")
 */
class Transaction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenomEnv;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomEnv;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ninCorrespondant;

    /**
     * @ORM\Column(type="integer")
     */
    private $solde;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenomCorrespondant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomCorrespondant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Compte", inversedBy="transacDepot")
     */
    private $compteDeDepot;

    /**
     * @ORM\Column(type="integer")
     */
    private $code;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userCreateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Compte", inversedBy="transactRetrait")
     */
    private $compteDeRetrait;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephoneEnv;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephoneCorrespondant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenomEnv(): ?string
    {
        return $this->prenomEnv;
    }

    public function setPrenomEnv(?string $prenomEnv): self
    {
        $this->prenomEnv = $prenomEnv;

        return $this;
    }

    public function getNomEnv(): ?string
    {
        return $this->nomEnv;
    }

    public function setNomEnv(?string $nomEnv): self
    {
        $this->nomEnv = $nomEnv;

        return $this;
    }

    public function getNinCorrespondant(): ?int
    {
        return $this->ninCorrespondant;
    }

    public function setNinCorrespondant(?int $ninCorrespondant): self
    {
        $this->ninCorrespondant = $ninCorrespondant;

        return $this;
    }

    public function getSolde(): ?int
    {
        return $this->solde;
    }

    public function setSolde(int $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getPrenomCorrespondant(): ?string
    {
        return $this->prenomCorrespondant;
    }

    public function setPrenomCorrespondant(?string $prenomCorrespondant): self
    {
        $this->prenomCorrespondant = $prenomCorrespondant;

        return $this;
    }

    public function getNomCorrespondant(): ?string
    {
        return $this->nomCorrespondant;
    }

    public function setNomCorrespondant(?string $nomCorrespondant): self
    {
        $this->nomCorrespondant = $nomCorrespondant;

        return $this;
    }

    public function getCompteDeDepot(): ?Compte
    {
        return $this->compteDeDepot;
    }

    public function setCompteDeDepot(?Compte $compteDeDepot): self
    {
        $this->compteDeDepot = $compteDeDepot;

        return $this;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
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

    public function getUserCreateur(): ?User
    {
        return $this->userCreateur;
    }

    public function setUserCreateur(?User $userCreateur): self
    {
        $this->userCreateur = $userCreateur;

        return $this;
    }

    public function getCompteDeRetrait(): ?Compte
    {
        return $this->compteDeRetrait;
    }

    public function setCompteDeRetrait(?Compte $compteDeRetrait): self
    {
        $this->compteDeRetrait = $compteDeRetrait;

        return $this;
    }

    public function getTelephoneEnv(): ?int
    {
        return $this->telephoneEnv;
    }

    public function setTelephoneEnv(int $telephoneEnv): self
    {
        $this->telephoneEnv = $telephoneEnv;

        return $this;
    }

    public function getTelephoneCorrespondant(): ?int
    {
        return $this->telephoneCorrespondant;
    }

    public function setTelephoneCorrespondant(int $telephoneCorrespondant): self
    {
        $this->telephoneCorrespondant = $telephoneCorrespondant;

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
}