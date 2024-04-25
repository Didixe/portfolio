<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GeocodeController extends AbstractController
{
    #[Route('/geocode', name: 'app_geocode')]
    public function index(): Response
    {
        return $this->render('geocode/index.html.twig', [
            'controller_name' => 'GeocodeController',
        ]);
    }
}
