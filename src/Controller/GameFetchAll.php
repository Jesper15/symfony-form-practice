<?php

namespace App\Controller;

use App\Entity\Game;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GameFetchAll extends AbstractController
{
    #[Route('/browse', name: 'app_game_browse_all')]
    public function browseAll(EntityManagerInterface $entityManager)
    {
        $repository = $entityManager->getRepository(Game::class)->findAll();

        return $this->render('browse.html.twig', [
            'games' => $repository,
        ]);
    }
}
