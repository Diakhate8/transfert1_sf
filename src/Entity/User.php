<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ApiResource(
 *     itemOperations={
 *          "get"={ "access_control"="is_granted('CAN_POST', object)",

 *              "normalization_context"={"groups"={"user:read", "user:item:get"}},
 *          },
 *          "put"={
 *              "access_control"="is_granted('CAN_POST', object)",
 *              "access_control_message"="Accés non autorisé"
 *          },
 *          "delete"={"access_control"="is_granted('CAN_POST',object)"}
 *     },
 *     collectionOperations={
 *          "get"={"access_control"="is_granted('ROLE_ADMIN')"},
 *          "post"={"access_control"="is_granted('CAN_POST',object)"}
 *     }
 * )
 * @ApiResource(iri="http://schema.org/User")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"post:read", "post:write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:read", "post:write"})
     * @Assert\NotBlank
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:read", "post:write"})
     * @Assert\NotBlank
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"post:read", "post:write"})
     * @Assert\Regex("/^(78||77||76||70)[0-9]{7}$/")
     * @Assert\NotBlank
     * 
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Groups({"post:read", "post:write"})
     * @Assert\Email(
     *     message = "The email is not a valid email."
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Groups({"post:read", "post:write"})
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255 )
     * @Groups({"post:read", "post:write"})
     * @Assert\NotBlank
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Role", inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"post:read", "post:write"})
     * @Assert\NotBlank
     */
    private $role;

    private $roles = [];

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"post:read", "post:write"})
     */
    private $isActive;

    /**
     * @var MediaObject|null
     *
     * @ORM\ManyToOne(targetEntity=MediaObject::class)
     * @ORM\JoinColumn(nullable=true)
     * @ApiProperty(iri="http://schema.org/image")
     */
    public $image;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partenaire", inversedBy="user")
     */
    private $partenaire;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Compte", mappedBy="usercreateur")
     */
    private $compteCree;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Depot", mappedBy="userCreateur")
     */
    private $depotCree;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transaction", mappedBy="userCreateur")
     */
    private $transactions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Affectation", mappedBy="user")
     */
    private $affectation;
   
    public function __construct()
    {
        $this->isActive = true;
        $this->compteCree = new ArrayCollection();
        $this->depotCree = new ArrayCollection();
        $this->transactions = new ArrayCollection();
        $this->affectation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        // guarantee every user at least has ROLE_.... 
        return $this->roles = [strtoupper($this->getRole()->getLibelle())];
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

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
     * @return Collection|Compte[]
     */
    public function getCompteCree(): Collection
    {
        return $this->compteCree;
    }

    public function addCompteCree(Compte $compteCree): self
    {
        if (!$this->compteCree->contains($compteCree)) {
            $this->compteCree[] = $compteCree;
            $compteCree->setUsercreateur($this);
        }

        return $this;
    }

    public function removeCompteCree(Compte $compteCree): self
    {
        if ($this->compteCree->contains($compteCree)) {
            $this->compteCree->removeElement($compteCree);
            // set the owning side to null (unless already changed)
            if ($compteCree->getUsercreateur() === $this) {
                $compteCree->setUsercreateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Depot[]
     */
    public function getDepotCree(): Collection
    {
        return $this->depotCree;
    }

    public function addDepotCree(Depot $depotCree): self
    {
        if (!$this->depotCree->contains($depotCree)) {
            $this->depotCree[] = $depotCree;
            $depotCree->setUserCreateur($this);
        }

        return $this;
    }

    public function removeDepotCree(Depot $depotCree): self
    {
        if ($this->depotCree->contains($depotCree)) {
            $this->depotCree->removeElement($depotCree);
            // set the owning side to null (unless already changed)
            if ($depotCree->getUserCreateur() === $this) {
                $depotCree->setUserCreateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    public function addTransaction(Transaction $transaction): self
    {
        if (!$this->transactions->contains($transaction)) {
            $this->transactions[] = $transaction;
            $transaction->setUserCreateur($this);
        }

        return $this;
    }

    public function removeTransaction(Transaction $transaction): self
    {
        if ($this->transactions->contains($transaction)) {
            $this->transactions->removeElement($transaction);
            // set the owning side to null (unless already changed)
            if ($transaction->getUserCreateur() === $this) {
                $transaction->setUserCreateur(null);
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
            $affectation->setUser($this);
        }

        return $this;
    }

    public function removeAffectation(Affectation $affectation): self
    {
        if ($this->affectation->contains($affectation)) {
            $this->affectation->removeElement($affectation);
            // set the owning side to null (unless already changed)
            if ($affectation->getUser() === $this) {
                $affectation->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        return true;
    }


}
