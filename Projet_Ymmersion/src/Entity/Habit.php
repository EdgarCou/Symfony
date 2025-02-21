<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
class Habit
{
    #[ORM\Column(type: "string", length: 10)]
    #[Assert\Choice(choices: ['personal', 'group'], message: "Choose a valid type.")]
    private string $type;

    #[ORM\Column(type: "string", length: 20, nullable: false, options: ["default" => "color1"])]
    #[Assert\Choice(choices: ['color1', 'color2', 'color3', 'color4', 'color5'], message: "Choose a valid color.")]
    private string $color = 'color1';

    #[ORM\Column(type: "boolean")]
    private bool $completed = false;

    #[ORM\Column(type: "string", length: 50)]
    #[Assert\Choice(choices: ['chores', 'fitness', 'school', 'work'], message: "Choose a valid category.")]
    private string $category;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    #[Assert\NotBlank]
    private string $text;

    #[ORM\Column(type: "string", length: 50)]
    #[Assert\Choice(choices: ['very easy', 'easy', 'medium', 'hard'], message: "Choose a valid difficulty.")]
    private string $difficulty;

    #[ORM\Column(type: "string", length: 20)]
    #[Assert\Choice(choices: ['daily', 'weekly', 'once'], message: "Periodicity must be either daily, weekly, or once.")]
    private string $periodicity;

    #[ORM\Column(type: "datetime", nullable: false)]
    private \DateTimeInterface $createdAt;

    #[ORM\ManyToOne(targetEntity: Group::class, inversedBy: 'habits')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Group $group = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;
    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }

    public function __construct()
    {
    $this->createdAt = new \DateTime(); 
    $this->completed = false;
    $this->type = 'personal';
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

    public function getGroup(): ?Group
    {
        return $this->group;
    }

    public function setGroup(?Group $group): self
    {
        $this->group = $group;
        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }


}