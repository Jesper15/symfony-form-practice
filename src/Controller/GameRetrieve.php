<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Game;

class GameRetrieve extends AbstractController
{
    #[Route('/browse', name: 'app_game_browse_all')]
    public function browseAll(EntityManagerInterface $entityManager)
    {
        $repository = $entityManager->getRepository(Game::class)->findAll();

        return $this->render('browse.html.twig', [
            'games' => $repository,
        ]);


    }



    #[Route('/browse/{id}', name: 'app_game_browse_one')]
    public function browseOne(ManagerRegistry $doctrine, int $id): Response
    {
        $game = $doctrine->getRepository(Game::class)->find($id);

        return new Response('De game is: ' . $game->getName());
    }
}