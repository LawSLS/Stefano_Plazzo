<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use PDO;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        $titlePage = "Stefano Plazzo";

        return $this->render('home/index.html.twig', [
            'titlePage' => $titlePage,
        ]);
    }
}
