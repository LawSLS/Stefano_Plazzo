<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PropertyAdController extends AbstractController
{
    #[Route('/property/ad', name: 'app_property_ad')]
    public function index(): Response
    {
        $title = "Publier votre annonce";

        return $this->render('property_ad/index.html.twig', [
            'titlePage' => $title,
        ]);
    }
}
