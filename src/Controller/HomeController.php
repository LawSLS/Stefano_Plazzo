<?php

namespace App\Controller;

use App\Entity\ParisValeurFonciere;
use Doctrine\ORM\EntityManagerInterface;
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

    #[Route('/home', name: 'app_home')]
    public function filterByArea(EntityManagerInterface $em) : Response
    {
        $propertyAssets = $em->getRepository(ParisValeurFonciere::class)->findAll();
        $min_area = 5;
        $max_area = 9;
        $result = [];

        foreach ($propertyAssets as $property) {
            
            if($property->getSurfaceReelleBati()>= $min_area && $property->getSurfaceReelleBati()<= $max_area)
            {
                $result[] = $property;
            }
        }
        dd($result);
     
        return $this->render('home/index.html.twig', [
            'min_area' => $min_area,
            'max_area' => $max_area,
            'filterArea' => $result,
        ]);
    }
}
