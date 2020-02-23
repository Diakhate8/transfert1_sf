<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CompteRepository")
 */
class Compte
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank
     */
    private $numeroCompte;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $soldeInitial;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partenaire", inversedBy="compte")
     * @ORM\JoinColumn(nullable=false)
     */
    private $partenaire;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Depot", mappedBy="compte")
     */
    private $depot;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="compteCree")
     */
    private $usercreateur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transaction", mappedBy="compteDeDepot")
     */
    private $transacDepot;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transaction", mappedBy="compteDeRetrait")
     */
    private $transactRetrait;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Affectation", mappedBy="compte")
     */
    private $affectation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rapport", mappedBy="compteTransact")
     */
    private $rapports;

    // /**
    //  * @ORM\OneToMany(targetEntity="App\Entity\Transaction", mappedBy="compteEnv")
    //  */
    // private $transacEnv;

    public function __construct()
    {
        $this->depot = new ArrayCollection();
        $this->transacDepot = new ArrayCollection();
        $this->transacEnv = new ArrayCollection();
        $this->transactRetrait = new ArrayCollection();
        $this->affectation = new ArrayCollection();
        $this->rapports = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCompte(): ?string
    {
        return $this->numeroCompte;
    }

    public function setNumeroCompte(string $numeroCompte): self
    {
        $this->numeroCompte = $numeroCompte;

        return $this;
    }

    public function getSoldeInitial(): ?int
    {
        return $this->soldeInitial;
    }

    public function setSoldeInitial(int $soldeInitial): self
    {
        $this->soldeInitial = $soldeInitial;

        return $this;
    }

    public function getPartenaire(): ?Partenaire
    {
        return $this->partenaire;
    }

    public function setPartenaire(?Partenaire $partenaire): self
    {
        $this->partenaire = $partenaire;

        return $this;
    }

    /**
     * @return Collection|Depot[]
     */
    public function getDepot(): Collection
    {
        return $this->depot;
    }

    public function addDepot(Depot $depot): self
    {
        if (!$this->depot->contains($depot)) {
            $this->depot[] = $depot;
            $depot->setCompte($this);
        }

        return $this;
    }

    public function removeDepot(Depot $depot): self
    {
        if ($this->depot->contains($depot)) {
            $this->depot->removeElement($depot);
            // set the owning side to null (unless already changed)
            if ($depot->getCompte() === $this) {
                $depot->setCompte(null);
            }
        }

        return $this;
    }

    public function getUsercreateur(): ?User
    {
        return $this->usercreateur;
    }

    public function setUsercreateur(?User $usercreateur): self
    {
        $this->usercreateur = $usercreateur;

        return $this;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getTransacDepot(): Collection
    {
        return $this->transacDepot;
    }

    public function addTransacDepot(Transaction $transacDepot): self
    {
        if (!$this->transacDepot->contains($transacDepot)) {
            $this->transacDepot[] = $transacDepot;
            $transacDepot->setCompteDeDepot($this);
        }

        return $this;
    }

    public function removeTransacDepot(Transaction $transacDepot): self
    {
        if ($this->transacDepot->contains($transacDepot)) {
            $this->transacDepot->removeElement($transacDepot);
            // set the owning side to null (unless already changed)
            if ($transacDepot->getCompteDeDepot() === $this) {
                $transacDepot->setCompteDeDepot(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getTransactRetrait(): Collection
    {
        return $this->transactRetrait;
    }

    public function addTransactRetrait(Transaction $transactRetrait): self
    {
        if (!$this->transactRetrait->contains($transactRetrait)) {
            $this->transactRetrait[] = $transactRetrait;
            $transactRetrait->setCompteDeRetrait($this);
        }

        return $this;
    }

    public function removeTransactRetrait(Transaction $transactRetrait): self
    {
        if ($this->transactRetrait->contains($transactRetrait)) {
            $this->transactRetrait->removeElement($transactRetrait);
            // set the owning side to null (unless already changed)
            if ($transactRetrait->getCompteDeRetrait() === $this) {
                $transactRetrait->setCompteDeRetrait(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Affectation[]
     */
    public function getAffectation(): Collection
    {
        return $this->affectation;
    }

    public function addAffectation(Affectation $affectation): self
    {
        if (!$this->affectation->contains($affectation)) {
            $this->affectation[] = $affectation;
            $affectation->setCompte($this);
        }

        return $this;
    }

    public function removeAffectation(Affectation $affectation): self
    {
        if ($this->affectation->contains($affectation)) {
            $this->affectation->removeElement($affectation);
            // set the owning side to null (unless already changed)
            if ($affectation->getCompte() === $this) {
                $affectation->setCompte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Rapport[]
     */
    public function getRapports(): Collection
    {
        return $this->rapports;
    }

    public function addRapport(Rapport $rapport): self
    {
        if (!$this->rapports->contains($rapport)) {
            $this->rapports[] = $rapport;
            $rapport->setCompteTransact($this);
        }

        return $this;
    }

    public function removeRapport(Rapport $rapport): self
    {
        if ($this->rapports->contains($rapport)) {
            $this->rapports->removeElement($rapport);
            // set the owning side to null (unless already changed)
            if ($rapport->getCompteTransact() === $this) {
                $rapport->setCompteTransact(null);
            }
        }

        return $this;
    }

    
}
