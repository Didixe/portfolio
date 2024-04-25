<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EscapeController extends AbstractController
{
    #[Route('/escape', name: 'app_escape')]
    public function index(): Response
    {
        return $this->render('escape/index.html.twig', [
            'controller_name' => 'EscapeController',
        ]);
    }
}
