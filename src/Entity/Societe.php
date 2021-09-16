<?php

namespace App\Entity;

use App\Repository\SocieteRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=SocieteRepository::class)
 * @Gedmo\Loggable
 */
class Societe
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroSiren;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $villeImmatriculation;

    /**
     * @ORM\Column(type="date")
     * @Gedmo\Versioned
     */
    private $dateImmatriculation;

    /**
     * @ORM\ManyToOne(targetEntity=FormeJuridique::class, inversedBy="societes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $formeJuridique;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNumeroSiren(): ?string
    {
        return $this->numeroSiren;
    }

    public function setNumeroSiren(string $numeroSiren): self
    {
        $this->numeroSiren = $numeroSiren;

        return $this;
    }

    public function getVilleImmatriculation(): ?string
    {
        return $this->villeImmatriculation;
    }

    public function setVilleImmatriculation(string $villeImmatriculation): self
    {
        $this->villeImmatriculation = $villeImmatriculation;

        return $this;
    }

    public function getDateImmatriculation(): ?\DateTimeInterface
    {
        return $this->dateImmatriculation;
    }

    public function setDateImmatriculation(\DateTimeInterface $dateImmatriculation): self
    {
        $this->dateImmatriculation = $dateImmatriculation;

        return $this;
    }

    public function getFormeJuridique(): ?FormeJuridique
    {
        return $this->formeJuridique;
    }

    public function setFormeJuridique(?FormeJuridique $formeJuridique): self
    {
        $this->formeJuridique = $formeJuridique;

        return $this;
    }
}
