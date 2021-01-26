<?php

namespace App\Entity;

use App\Repository\EnchereRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnchereRepository::class)
 */
class Enchere
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateheure;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="encheres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IDuser;

    /**
     * @ORM\ManyToOne(targetEntity=Annonce::class, inversedBy="encheres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IDannonce;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDateheure(): ?\DateTimeInterface
    {
        return $this->dateheure;
    }

    public function setDateheure(\DateTimeInterface $dateheure): self
    {
        $this->dateheure = $dateheure;

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

    public function getIDannonce(): ?Annonce
    {
        return $this->IDannonce;
    }

    public function setIDannonce(?Annonce $IDannonce): self
    {
        $this->IDannonce = $IDannonce;

        return $this;
    }
}
