<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
class Habit
{
    #[ORM\Column(type: "boolean")]
    private bool $completed = false;

    #[ORM\Column(type: "string", length: 50)]
    #[Assert\Choice(choices: ['chores', 'fitness', 'school_work'], message: "Choose a valid category.")]
    private string $category;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    #[Assert\NotBlank]
    private string $text;

    #[ORM\Column(type: "string", length: 50)]
    #[Assert\Choice(choices: ['easy', 'medium', 'hard'], message: "Choose a valid difficulty.")]
    private string $difficulty;

    #[ORM\Column(type: "string", length: 7)]
    #[Assert\Regex(pattern: "/^#[a-f0-9]{6}$/i", message: "Invalid color format (e.g., #FF5733).")]
    private string $color;

    #[ORM\Column(type: "string", length: 20)]
    #[Assert\Choice(choices: ['daily', 'weekly'], message: "Periodicity must be either daily or weekly.")]
    private string $periodicity;

    #[ORM\Column(type: "datetime", nullable: false)]
    private \DateTimeInterface $createdAt;

    public function __construct()
    {
    $this->createdAt = new \DateTime(); 
    $this->completed = false;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getDifficulty(): string
    {
        return $this->difficulty;
    }

    public function setDifficulty(string $difficulty): self
    {
        $this->difficulty = $difficulty;
        return $this;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }

    public function getPeriodicity(): string
    {
        return $this->periodicity;
    }

    public function setPeriodicity(string $periodicity): self
    {
        $this->periodicity = $periodicity;
        return $this;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getCompleted(): bool
{
    return $this->completed;
}

public function setCompleted(bool $completed): self
{
    $this->completed = $completed;
    return $this;
}

public function getCategory(): string
{
    return $this->category;
}

public function setCategory(string $category): self
{
    $this->category = $category;
    return $this;
}

}
