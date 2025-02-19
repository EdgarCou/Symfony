<?php

namespace App\Entity;

use App\Repository\BandRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BandRepository::class)]
class Band
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $members = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $habits = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getMembers(): ?string
    {
        return $this->members;
    }

    public function setMembers(string $members): static
    {
        $this->members = $members;

        return $this;
    }

    public function getHabits(): ?string
    {
        return $this->habits;
    }

    public function setHabits(?string $habits): static
    {
        $this->habits = $habits;

        return $this;
    }
}
