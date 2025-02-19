<?php

namespace App\Entity;

use App\Repository\ScoreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScoreRepository::class)]
class Score
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $pointGain = null;

    #[ORM\Column(nullable: true)]
    private ?int $pointLoose = null;

    #[ORM\Column(nullable: true)]
    private ?int $score = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPointGain(): ?int
    {
        return $this->pointGain;
    }

    public function setPointGain(?int $pointGain): static
    {
        $this->pointGain = $pointGain;

        return $this;
    }

    public function getPointLoose(): ?int
    {
        return $this->pointLoose;
    }

    public function setPointLoose(?int $pointLoose): static
    {
        $this->pointLoose = $pointLoose;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): static
    {
        $this->score = $score;

        return $this;
    }
}
