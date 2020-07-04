<?php

namespace App\Entity;

use App\Repository\GradeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GradeRepository::class)
 */
class Grade
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Grade;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Vacataire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Contractuel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $MaitreConference;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $MaitreAssistant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGrade(): ?string
    {
        return $this->Grade;
    }

    public function setGrade(string $Grade): self
    {
        $this->Grade = $Grade;

        return $this;
    }

    public function getVacataire(): ?string
    {
        return $this->Vacataire;
    }

    public function setVacataire(string $Vacataire): self
    {
        $this->Vacataire = $Vacataire;

        return $this;
    }

    public function getContractuel(): ?string
    {
        return $this->Contractuel;
    }

    public function setContractuel(string $Contractuel): self
    {
        $this->Contractuel = $Contractuel;

        return $this;
    }

    public function getMaitreConference(): ?string
    {
        return $this->MaitreConference;
    }

    public function setMaitreConference(string $MaitreConference): self
    {
        $this->MaitreConference = $MaitreConference;

        return $this;
    }

    public function getMaitreAssistant(): ?string
    {
        return $this->MaitreAssistant;
    }

    public function setMaitreAssistant(string $MaitreAssistant): self
    {
        $this->MaitreAssistant = $MaitreAssistant;

        return $this;
    }
}
