<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BaratieController extends AbstractController
{
    #[Route('/baratie', name: 'app_baratie')]
    public function index(): Response
    {
        return $this->render('baratie/index.html.twig', [
            'controller_name' => 'BaratieController',
        ]);
    }
}
