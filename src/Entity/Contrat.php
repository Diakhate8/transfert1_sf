<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ContratRepository")
 */
class Contrat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $intitule;

    /**
     * @ORM\Column(type="text")
     */
    private $articleA;

    /**
     * @ORM\Column(type="text")
     */
    private $articleB;

    /**
     * @ORM\Column(type="text")
     */
    private $articleC;

    /**
     * @ORM\Column(type="text")
     */
    private $articleD;

    /**
     * @ORM\Column(type="text")
     */
    private $articleE;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getArticleA(): ?string
    {
        return $this->articleA;
    }

    public function setArticleA(string $articleA): self
    {
        $this->articleA = $articleA;

        return $this;
    }

    public function getArticleB(): ?string
    {
        return $this->articleB;
    }

    public function setArticleB(string $articleB): self
    {
        $this->articleB = $articleB;

        return $this;
    }

    public function getArticleC(): ?string
    {
        return $this->articleC;
    }

    public function setArticleC(string $articleC): self
    {
        $this->articleC = $articleC;

        return $this;
    }

    public function getArticleD(): ?string
    {
        return $this->articleD;
    }

    public function setArticleD(string $articleD): self
    {
        $this->articleD = $articleD;

        return $this;
    }

    public function getArticleE(): ?string
    {
        return $this->articleE;
    }

    public function setArticleE(string $articleE): self
    {
        $this->articleE = $articleE;

        return $this;
    }
}
