<?php

namespace App\Entity;

use App\Repository\RoundRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoundRepository::class)]
class Round
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $imageUrl = null;

    #[ORM\Column(length: 255)]
    private ?string $correctCountry = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $guessedCountry = null;

    #[ORM\Column]
    private ?bool $isCorrect = null;

    #[ORM\ManyToOne(inversedBy: 'rounds')]
    private ?Game $game = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?guess $guess = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): static
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getCorrectCountry(): ?string
    {
        return $this->correctCountry;
    }

    public function setCorrectCountry(string $correctCountry): static
    {
        $this->correctCountry = $correctCountry;

        return $this;
    }

    public function getGuessedCountry(): ?string
    {
        return $this->guessedCountry;
    }

    public function setGuessedCountry(?string $guessedCountry): static
    {
        $this->guessedCountry = $guessedCountry;

        return $this;
    }

    public function isCorrect(): ?bool
    {
        return $this->isCorrect;
    }

    public function setIsCorrect(bool $isCorrect): static
    {
        $this->isCorrect = $isCorrect;

        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): static
    {
        $this->game = $game;

        return $this;
    }

    public function getGuess(): ?guess
    {
        return $this->guess;
    }

    public function setGuess(?guess $guess): static
    {
        $this->guess = $guess;

        return $this;
    }
}
