<?php

namespace App\Controller;

use App\Entity\Game;
use App\Form\GameFormControllerType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameFormController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function Homepage(Request $request): Response
    {
        $game = new Game();

        $form = $this->createForm(GameFormControllerType::class, $game);

        return new Response(
            $this->renderForm('Home/homepage.html.twig', [
                'form' => $form
            ])
        );
    }
}
