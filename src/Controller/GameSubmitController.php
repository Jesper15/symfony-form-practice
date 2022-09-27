<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GameSubmitController extends AbstractController
{
    #[Route('/game/submit')]
    public function GameSubmit(GameFormController $homepageController)
    {
        return $this->renderForm('Home/homepage.html.twig');
    }
}