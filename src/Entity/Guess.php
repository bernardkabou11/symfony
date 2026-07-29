<?php

namespace App\Entity;

use App\Repository\GuessRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GuessRepository::class)]
class Guess
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\Column]
    private ?int $distanceKm = null;

    #[ORM\Column]
    private ?int $score = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?round $round = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getDistanceKm(): ?int
    {
        return $this->distanceKm;
    }

    public function setDistanceKm(int $distanceKm): static
    {
        $this->distanceKm = $distanceKm;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getRound(): ?round
    {
        return $this->round;
    }

    public function setRound(?round $round): static
    {
        $this->round = $round;

        return $this;
    }
}
