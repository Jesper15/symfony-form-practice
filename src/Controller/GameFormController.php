<?php

namespace App\Controller;

use App\Entity\Game;
use App\Form\GameFormControllerType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameFormController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function Homepage(Request $request, EntityManagerInterface $entityManager): Response
    {
        $game = new Game();

        $form = $this->createForm(GameFormControllerType::class, $game);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($game);
            $entityManager->flush();

            return new Response('Game nummer ' . $game->getId() . ' is succesvol verzonden.');
        }

        return new Response(
            $this->renderForm('Home/homepage.html.twig', [
                'form' => $form
            ])
        );
    }
}
