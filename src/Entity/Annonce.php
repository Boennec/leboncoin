<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 */
class Annonce
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $texte;

    /**
     * @ORM\Column(type="datetime")
     */
    private $debut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fin;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixdepart;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $priximmediat;

    /**
     * @ORM\Column(type="text")
     */
    private $photos;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IDcategorie;

    /**
     * @ORM\OneToMany(targetEntity=Enchere::class, mappedBy="IDannonce")
     */
    private $encheres;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IDuser;

    public function __construct()
    {
        $this->encheres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    public function getDebut(): ?\DateTimeInterface
    {
        return $this->debut;
    }

    public function setDebut(\DateTimeInterface $debut): self
    {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(\DateTimeInterface $fin): self
    {
        $this->fin = $fin;

        return $this;
    }

    public function getPrixdepart(): ?float
    {
        return $this->prixdepart;
    }

    public function setPrixdepart(?float $prixdepart): self
    {
        $this->prixdepart = $prixdepart;

        return $this;
    }

    public function getPriximmediat(): ?float
    {
        return $this->priximmediat;
    }

    public function setPriximmediat(?float $priximmediat): self
    {
        $this->priximmediat = $priximmediat;

        return $this;
    }

    public function getPhotos(): ?string
    {
        return $this->photos;
    }

    public function setPhotos(string $photos): self
    {
        $this->photos = $photos;

        return $this;
    }

    public function getIDcategorie(): ?Categorie
    {
        return $this->IDcategorie;
    }

    public function setIDcategorie(?Categorie $IDcategorie): self
    {
        $this->IDcategorie = $IDcategorie;

        return $this;
    }

    /**
     * @return Collection|Enchere[]
     */
    public function getEncheres(): Collection
    {
        return $this->encheres;
    }

    public function addEnchere(Enchere $enchere): self
    {
        if (!$this->encheres->contains($enchere)) {
            $this->encheres[] = $enchere;
            $enchere->setIDannonce($this);
        }

        return $this;
    }

    public function removeEnchere(Enchere $enchere): self
    {
        if ($this->encheres->removeElement($enchere)) {
            // set the owning side to null (unless already changed)
            if ($enchere->getIDannonce() === $this) {
                $enchere->setIDannonce(null);
            }
        }

        return $this;
    }

    public function getIDuser(): ?User
    {
        return $this->IDuser;
    }

    public function setIDuser(?User $IDuser): self
    {
        $this->IDuser = $IDuser;

        return $this;
    }
}
