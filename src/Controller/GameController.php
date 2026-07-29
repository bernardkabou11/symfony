<?php

namespace App\Controller;

use App\Service\PlayerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    public function __construct(
        private PlayerService $playerService
    ) {}

    /**
     * Page d’accueil : création du joueur
     */
    #[Route('/', name: 'home')]
    public function home(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $name = $request->request->get('name');

            if ($name) {
                $player = $this->playerService->createPlayer($name);
                return $this->redirectToRoute('play', ['id' => $player->getId()]);
            }
        }

        return $this->render('home.html.twig');
    }

    /**
     * Page de jeu : le joueur doit deviner un nombre
     */
    #[Route('/play/{id}', name: 'play')]
    public function play($id, Request $request): Response
    {
        $player = $this->playerService->getPlayer((int)$id);

        if (!$player) {
            throw $this->createNotFoundException("Joueur introuvable");
        }

        // Génère un nombre aléatoire entre 1 et 10
        $target = random_int(1, 10);

        if ($request->isMethod('POST')) {
            $guess = (int) $request->request->get('guess');

            $correct = ($guess === $target);

            if ($correct) {
                $this->playerService->addScore($player, 10);
            }

            return $this->redirectToRoute('result', [
                'id' => $player->getId(),
                'guess' => $guess,
                'target' => $target,
                'correct' => $correct ? 1 : 0
            ]);
        }

        return $this->render('play.html.twig', [
            'player' => $player
        ]);
    }

    /**
     * Page résultat
     */
    #[Route('/result/{id}', name: 'result')]
    public function result($id, Request $request): Response
    {
        $player = $this->playerService->getPlayer((int)$id);

        return $this->render('result.html.twig', [
            'player' => $player,
            'guess' => $request->query->get('guess'),
            'target' => $request->query->get('target'),
            'correct' => $request->query->get('correct'),
        ]);
    }

    /**
     * Classement
     */
    #[Route('/leaderboard', name: 'leaderboard')]
    public function leaderboard(): Response
    {
        $players = $this->playerService->getLeaderboard();

        return $this->render('leaderboard.html.twig', [
            'players' => $players
        ]);
    }
}
