<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $texte;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateheure;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="messages_envoyes", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IDenvoi;

    /**
     * @ORM\ManyToOne(targetEntity=User::class,inversedBy="messages_envoyes", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IDrecoit;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDateheure(): ?\DateTimeInterface
    {
        return $this->dateheure;
    }

    public function setDateheure(\DateTimeInterface $dateheure): self
    {
        $this->dateheure = $dateheure;

        return $this;
    }

    public function getIDenvoi(): ?User
    {
        return $this->IDenvoi;
    }

    public function setIDenvoi(?User $IDenvoi): self
    {
        $this->IDenvoi = $IDenvoi;

        return $this;
    }

    public function getIDrecoit(): ?User
    {
        return $this->IDrecoit;
    }

    public function setIDrecoit(?User $IDrecoit): self
    {
        $this->IDrecoit = $IDrecoit;

        return $this;
    }
}
