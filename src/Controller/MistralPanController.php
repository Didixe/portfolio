<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MistralPanController extends AbstractController
{
    #[Route('/mistral/pan', name: 'app_mistral_pan')]
    public function index(): Response
    {
        return $this->render('mistral_pan/index.html.twig', [
            'controller_name' => 'MistralPanController',
        ]);
    }
}
