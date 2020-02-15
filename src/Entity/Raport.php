<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\RaportRepository")
 */
class Raport
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mouvement;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $debit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $credit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $commission;

    /**
     * @ORM\Column(type="integer")
     */
    private $partEtat;

    /**
     * @ORM\Column(type="integer")
     */
    private $partService;

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

    public function getMouvement(): ?string
    {
        return $this->mouvement;
    }

    public function setMouvement(string $mouvement): self
    {
        $this->mouvement = $mouvement;

        return $this;
    }

    public function getDebit(): ?int
    {
        return $this->debit;
    }

    public function setDebit(?int $debit): self
    {
        $this->debit = $debit;

        return $this;
    }

    public function getCredit(): ?int
    {
        return $this->credit;
    }

    public function setCredit(?int $credit): self
    {
        $this->credit = $credit;

        return $this;
    }

    public function getCommission(): ?int
    {
        return $this->commission;
    }

    public function setCommission(?int $commission): self
    {
        $this->commission = $commission;

        return $this;
    }

    public function getPartEtat(): ?int
    {
        return $this->partEtat;
    }

    public function setPartEtat(int $partEtat): self
    {
        $this->partEtat = $partEtat;

        return $this;
    }

    public function getPartService(): ?int
    {
        return $this->partService;
    }

    public function setPartService(int $partService): self
    {
        $this->partService = $partService;

        return $this;
    }
}
