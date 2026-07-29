<?php

namespace App\Service;

use App\Entity\Player;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManagerInterface;

class PlayerService
{
    public function __construct(
        private PlayerRepository $playerRepository,
        private EntityManagerInterface $em
    ) {}

    /**
     * Créer un joueur
     */
    public function createPlayer(string $name): Player
    {
        $player = new Player();
        $player->setName($name);

        $this->em->persist($player);
        $this->em->flush();

        return $player;
    }

    /**
     * Récupérer un joueur par son ID
     */
    public function getPlayer(int $id): ?Player
    {
        return $this->playerRepository->find($id);
    }

    /**
     * Ajouter des points à un joueur
     */
    public function addScore(Player $player, int $points): Player
    {
        $player->addScore($points);
        $this->em->flush();

        return $player;
    }

    /**
     * Réinitialiser le score
     */
    public function resetScore(Player $player): Player
    {
        $player->resetScore();
        $this->em->flush();

        return $player;
    }

    /**
     * Récupérer le classement
     */
    public function getLeaderboard(): array
    {
        return $this->playerRepository->findBy([], ['score' => 'DESC']);
    }
}
