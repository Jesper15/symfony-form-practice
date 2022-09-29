<?php

namespace App\Controller;

use App\Entity\Game;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameFetchOne extends AbstractController
{
    #[Route('/browse/{id}', name: 'app_game_browse_one')]
    public function browseOne(ManagerRegistry $doctrine, int $id): Response
    {
        $game = $doctrine->getRepository(Game::class)->find($id);

        return new Response('De naam van de game is: ' . $game->getName());
    }
}
