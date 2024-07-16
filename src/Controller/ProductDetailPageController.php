<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductDetailPageController extends AbstractController
{
    #[Route('/pdp', name: 'app_pdp')]
    public function index(): Response
    {
        $picturePath = "https://img.freepik.com/photos-gratuite/vue-du-batiment-architecture-style-dessin-anime_23-2151154913.jpg?size=626&ext=jpg&ga=GA1.1.2008272138.1720742400&semt=ais_user";
       
        return $this->render('product_detail_page/pdp.html.twig', [
            'controller_name' => 'ProductDetailPageController',
            'photo' => $picturePath,
        ]);
    }
}
